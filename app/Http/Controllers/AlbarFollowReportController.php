<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use App\Models\Sponsor;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use App\Models\AlbarFollowReport;
use App\Models\FollowReportData;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;

use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;


class AlbarFollowReportController extends Controller
{
    public function index(){
        

        $reports = AlbarFollowReport::latest()->with('data')->with('data.orphan')->get();

        return view('pages.reports.ber-association.follow-report-index',compact('reports'));

    }


    public function create(){

        $orphans = Sponsorship::
        where('supporter_id' , 1)
        ->where('status' , 'sponsored')
        ->with('orphan')
        // ->with('orphan.image')
        ->with('orphan.profile')
        // ->with('orphan.supporterFieldValues')
        ->with('orphan.guardian')
        // ->with('orphan.family')
        ->with('orphan.sponsor')
        ->with('orphan.data')
        ->get();


        return view('pages.reports.ber-association.follow-report',compact('orphans'));

    }

    public function store(Request $request){
        
    
        $orphanIds = Sponsorship:: where('supporter_id' , 1)
        ->where('status' , 'sponsored')
        ->pluck('orphan_id')
        ->toArray();

        if (!in_array($request->orphan_id, $orphanIds)) {
            abort(403, 'غير مسموح لك بالوصول لهذا اليتيم.');
        }
        
        

        $validated  = $request->validate([

            'orphan_id' => ['required' , 'exists:orphans,id'],
            'sponsor_name' => ['nullable' , 'string' , 'exists:sponsors,sponsor_name'],
            'sponsor_number' => ['nullable', 'exists:sponsors,sponsor_number'],
            'age' => ['nullable'],
            'academic_stage' => ['nullable' , 'string'],
            'class' => ['nullable' , 'string'],
            'guardian_relationship' => ['nullable' , 'string'],
            'save_orphan_quran' => ['required' , 'numeric'],
            'academic_level' => ['required' , 'in:ضعيف,جيد,متوسط,ممتاز'],
            'orphan_obligations_islam' => ['required' , 'in:ضعيفة,جيدة,متوسطة,ممتازة'],
            'changes_orphan_year' => ['required' , 'in:أخرى,بدأ المرحلة الثانوية,دخل دورة تدريبية لتعلم الحاسوب'],
            'other_changes_orphan_year' => ['nullable','required_if:changes_orphan_year,أخرى'],
            'authority_comment_guarantee' => ['required' , 'in:تغيير إيجابي حيث حفظ ٣ أجزاء من القرأن,تغيير ممتاز حيث قام بالتفوق في دراسته,أخرى'],
            'other_authority_comment_guarantee' => ['nullable','required_if:authority_comment_guarantee,أخرى'],
            'health_status' => ['nullable' , 'string'],
            'orphan_message' => ['nullable', 'required_without:orphan_image_message'],
            'orphan_image_message' => ['nullable', 'required_without:orphan_message'],
            'gender' => ['nullable' , 'string'],
        ]);
        


        $orphan = Orphan::findOrFail($validated['orphan_id'])->name;

        if(!$orphan){
            return redirect()->route('report.follow.albar.index')->with('danger' , __('هذا اليتيم غير موجود أو غير مكفول'));

        }

        if ($request->hasFile('orphan_image_message')) {
            $file = $request->file('orphan_image_message');
            $uniqueId = uniqid();
            $fileName = 'orphan_image_message_' . $uniqueId . '.' . $file->getClientOriginalExtension();            // تخزين الصورة في المجلد المحدد
            $path = $file->storeAs('reports/follow-report' . $orphan, $fileName, 'public');
            $validated['orphan_image_message'] = $path;
        }


        DB::beginTransaction();

        try{
            
            $followReportData = FollowReportData::updateOrCreate(
                ['orphan_id' => $validated['orphan_id']], // الشرط
                $validated // البيانات للتحديث أو الإنشاء
            );
            
            
            $follow_report_data_id = $followReportData->id;


            $request->merge([
                'follow_report_data_id' => $follow_report_data_id,
            ]);

            $validated1 = $request->validate([
                'orphan_image' => ['required' , 'file' , 'mimes:png,jpg,pdf'],
                'follow_report_data_id' => ['required' , 'exists:follow_report_datas,id']
            ]);
            

            if ($request->hasFile('orphan_image')) {
                $file = $request->file('orphan_image');
                $uniqueId = uniqid();
                $fileName = 'orphan_image' . $uniqueId . '.' . $file->getClientOriginalExtension();            // تخزين الصورة في المجلد المحدد
                $path = $file->storeAs('reports/follow-report' . $orphan, $fileName, 'public');
                $validated1['orphan_image'] = $path;
            }
            
                 
            AlbarFollowReport::create($validated1);

            DB::commit();

            return redirect()->route('report.follow.albar.index')->with('success' , __('تم إنشاء التقرير بنجاح'));


        }catch(Exception $e){
            dd($e);
            DB::rollBack();
            return redirect()->back()->with('danger', __(' فشل في إنشاء تقرير اليتيم. يرجى المحاولة مرة أخرى. '));

        }



        // 'orphan_image' => ['required' , 'file' , 'mimes:png,jpg,pdf'],

        // if ($request->hasFile('orphan_image')) {
        //     $file = $request->file('orphan_image');
        //     $uniqueId = uniqid();
        //     $fileName = 'orphan_image' . $uniqueId . '.' . $file->getClientOriginalExtension();            // تخزين الصورة في المجلد المحدد
        //     $path = $file->storeAs('reports/follow-report' . $orphan, $fileName, 'public');
        //     $validated['orphan_image'] = $path;
        // }



    }

    public function createReport(string $id){
        // $report = AlbarFollowReport::where('id', $id)
        // ->with('orphan')
        // ->with(['orphan.profile' => function ($query) {
        //         $query->select('orphan_id' ,'academic_stage' , 'class' );
        // }])
        // ->with(['orphan.guardian' => function ($query) {
        //     $query->select('orphan_id', 'guardian_name' ,'guardian_relationship');
        // }])
        // ->with('orphan.sponsor')
        // ->with('data.orphan.data')
        // ->firstOrFail();
        
        $report = AlbarFollowReport::where('id', $id)->with([
            'data.orphan.guardian' => function ($query) {
                $query->select('orphan_id', 'guardian_name', 'guardian_relationship');
            },
            'data.orphan.profile' => function ($query) {
                $query->select('orphan_id' ,'academic_stage' , 'class');
            },
            'data.orphan.sponsor',
            'data.orphan',
            'data.orphan.data'
        ])->firstOrFail();


        // $report->fields = json_decode($report->fields, true); // تحويل JSON إلى Array

        $viewName = 'pdf.follow-reports.supporter_1';

        // if(view()->exists($viewName)){
        //     $pdf = PDF::loadView($viewName, ['report' => $report]);
        //     return $pdf->stream( $report->orphan->name . '.pdf');
        // }

        if (view()->exists($viewName)) {
            $pdf = PDF::loadView($viewName, ['report' => $report], [], [
                'format' => 'A4',
                'orientation' => 'P' // أو 'L' لو أردت Landscape
            ]);

            return $pdf->download($report->data->orphan->name . '.pdf');
        }

        abort(404, 'لا يوجد قالب PDF مخصص لهذه الجمعية');
    }

    public function destroy(string $id){
        $report = AlbarFollowReport::findOrFail($id);
        $report->delete();
        return redirect()->back()->with('success' , __('تم حذف تقرير المراجعة بنجاح'));

    }


    // public function uploadeFile(){
    //     $filePath = storage_path('app/ayesh.xlsx');

    //     if (!file_exists($filePath)) {
    //         return 'الملف غير موجود!';
    //     }

    //     $data = Excel::toCollection([], $filePath, null);

    //     if (!empty($data[0])) {
    //         $rows = $data[0]->toArray();

    //         // افترض الصف الثاني يحتوي رؤوس الأعمدة
    //         $headers = $rows[1] ?? [];
    //         $dataRows = array_slice($rows, 2);

    //         foreach ($dataRows as $index => $row) {
    //             $rowAssoc = array_combine($headers, $row);

    //             if (!$rowAssoc) {
    //                 dump("فشل الدمج في الصف: " . ($index + 3), $headers, $row);
    //                 continue;
    //             }

    //             // التحقق من وجود البيانات
    //             if (!empty($rowAssoc['اسم اليتيم'])) {
    //                 Sponsor::create([
    //                     'internal_code' => $rowAssoc['رقم اليتيم'] ?? '',
    //                     'orphan_name' => $rowAssoc['اسم اليتيم'] ?? '',
    //                     'sponsor_name' => $rowAssoc['اسم الكافل'] ?? '',
    //                     'sponsor_number' => $rowAssoc['رقم الكافل'] ?? '',
    //                 ]);
    //             }
    //         }

    //         return '✅ تم الإدخال بنجاح';
    //     }

    //     return '⚠️ الملف فارغ أو غير صالح';
    // }
}
