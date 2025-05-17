<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use App\Models\Supporter;
use App\Models\SupporterField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;





class MarketingOrphanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orphans = Orphan::where('status', 'marketing_provider')

            ->when($request->search, function ($builder, $value) {  //search input
                $builder->where('name', 'LIKE', "%{$value}%");
            })
            // إضافة الفلاتر بناءً على الـ checkboxes
            ->when($request->filter, function ($builder, $filters) { //filter input
                if (in_array('جمعية دار البر', $filters)) {
                    $builder->whereHas('marketing.supporter', function ($query) {
                        $query->where('name', 'جمعية دار البر');
                    });
                }
                elseif (in_array('جمعية الشارقة', $filters)) {
                    $builder->whereHas('marketing.supporter', function ($query) {
                        $query->where('name', 'جمعية الشارقة');
                    });
                }
                elseif (in_array('جمعية السيدة مريم', $filters)) {
                    $builder->whereHas('marketing.supporter', function ($query) {
                        $query->where('name', 'جمعية السيدة مريم');
                    });
                }
                elseif (in_array('جمعية دبي الخيرية', $filters)) {
                    $builder->whereHas('marketing.supporter', function ($query) {
                        $query->where('name', 'جمعية دبي الخيرية');
                    });
                }
            })
        ->select('id', 'internal_code', 'name')
        ->with(['profile' => function ($query) {  // to get phone from profile table
            $query->select('phone', 'orphan_id');
        }])
        ->with(['family' => function ($query) {  // to get phone from profile table
            $query->select('address', 'orphan_id');
        }])
        ->with(['marketing' => function ($query) {  // to get only supporter data through marketing table
            $query->select('orphan_id', 'supporter_id') // اختر الحقول المطلوبة من جدول marketing
                  ->with(['supporter' => function ($query) {  // to get supporter data
                      $query->select('id', 'name'); // اختر الحقول التي تريدها من جدول supporters
            }]);
        }])
        ->paginate(8);


        $count = $orphans->total();

            // get the doner
            // $supporters = Supporter::all('id' , 'name');


            return view('pages.orphans.marketing-orphans.index' , compact('orphans' , 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $supporterId , string $orphanId)
    {
        $supporter = Supporter::findOrFail($supporterId);
        // $name = $supporter->name;

        $orphan = Orphan::where('id' , $orphanId)
        ->where('status', 'marketing_provider')
        ->with(['profile' , 'guardian' , 'family' , 'phones' , 'certified_orphan_extras'])
        ->firstOrFail();


        $fields = SupporterField::where('supporter_id' , $supporterId)->get();

        return view('pages.orphans.marketing-orphans.supporter_' .  $supporterId , compact(['orphan' , 'supporterId' ,'fields']));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $orphan = Orphan::where('id', $id)
        ->where('status', 'marketing_provider') // إضافة شرط status بعد id
        ->select('id', 'internal_code', 'name', 'application_form')
        ->with(['profile' => function ($query) {  // to get phone from profile table
            $query->select('phone', 'orphan_id');
        }])
        ->with(['image' => function ($query) {
            $query->select('orphan_id' ,'birth_certificate' , 'mother_card' ,
            'father_death_certificate' , 'mother_death_certificate');
        }])
        ->with(['certified_orphan_extras'])
        ->firstOrFail(); //

        // التحقق إذا كانت جميع الحقول قد تم ملؤها
        if (!Gate::allows('has-filled-fields', $orphan)) {
            return redirect()->route('orphan.marketing.index')->with('danger', __('لمشاهدة تفاصيل البيانات كاملة يجب اكمال البيانات. .'));
        }

        return view('pages.orphans.marketing-orphans.view' , compact('orphan'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orphan = Orphan::where('id', $id)
        ->where('status', 'marketing_provider') // إضافة شرط status بعد id
        ->firstOrFail(); // إذا لم يكن موجودًا سيرمي استثناء

        $orphan->delete();
        return redirect()->route('orphan.marketing.index')->with('success' , __(' تم حذف اليتيم بنجاح '));
    }



    public function generatePDF(Request $request)
    {
        $orphanIds = explode(',', $request->orphan_ids);

        $orphans = Orphan::with([
            'guardian' => function ($query) {
                $query->select('orphan_id', 'guardian_name', 'guardian_relationship');
            },
            'image' => function ($query) {
                $query->select('orphan_id', 'orphan_image_4_6');
            },
            'family',
            'marketing' => function ($query) {
                $query->select('id', 'orphan_id', 'supporter_id');
            },
            'supporterFieldValues.field'
        ])
        ->whereIn('id', $orphanIds)
        ->get();


        if ($orphans->isEmpty()) {
            return back()->with('danger', 'لا يوجد أيتام متاحين');
        }


        $pdfFiles = [];
        $orphansToUpdate = [];



        foreach ($orphans as $orphan) {

            $supporterId = $orphan->marketing->supporter_id ?? null;

            if (!$supporterId) {
                return redirect()->route('orphan.marketing.index')->with('danger', "اليتيم {$orphan->name} غير مرتبط بأي متبرع");
            }

            $requiredFields = SupporterField::where('supporter_id', $supporterId)->pluck('id')->toArray();
            $filledFields = $orphan->supporterFieldValues
                                ->whereNotNull('value')
                                ->pluck('supporter_field_id')
                                ->toArray();

            $missingFields = array_diff($requiredFields, $filledFields);

            if (!empty($missingFields)) {
                return redirect()->route('orphan.marketing.index')->with('danger', "اليتيم {$orphan->name} لا يحتوي على جميع بيانات المتبرع المطلوبة");
            }

            if ($orphan->status !== 'marketing_provider') {
                return redirect()->route('orphan.marketing.index')->with('danger', "اليتيم {$orphan->name} ليس في حالة المتبرع");
            }

            $pdfContent = PDF::loadView('pdf.donor_' . $supporterId, ['orphan' => $orphan]);


            $tempFile = storage_path('app/public/temp_orphan_' . $orphan->id . '.pdf');
            $pdfContent->save($tempFile);
            $pdfFiles[] = $tempFile;

            $orphansToUpdate[] = $orphan->id; // اجمع الـ IDs للتحديث لاحقاً


            // try {
                // $orphan->update(['status' => 'waiting']);
            // } catch (\Exception $e) {
            //     ("تحديث الحالة فشل: " . $e->getMessage());
            // }





        }

        $pdf = new \Mpdf\Mpdf();

        foreach ($pdfFiles as $file) {
            // استيراد الصفحة من الملف المؤقت
            $pageCount = $pdf->setSourceFile($file); // عدد الصفحات في الملف

            for ($i = 1; $i <= $pageCount; $i++) {
                // استيراد الصفحة الحالية
                $templateId = $pdf->importPage($i);

                // إضافة الصفحة إلى المستند الجديد
                $pdf->AddPage();
                $pdf->useTemplate($templateId);
            }
        }

        // حذف الملفات المؤقتة بعد دمجها
        foreach ($pdfFiles as $file) {
            unlink($file);
        }



        Orphan::whereIn('id', $orphansToUpdate)->update(['status' => 'waiting']);


        // عرض الملف المدمج
        // return $pdf->Output('donors.pdf', 'I');
        $orphanNames = $orphans->pluck('name')->implode('_'); // جمع أسماء الأيتام مع Underscore
        $filename = $orphanNames . '_' . now()->format('Ymd') . '.pdf';
        // return $pdf->Output($filename, 'I');
        return response($pdf->Output('', 'S'), 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename="' . $filename . '"') // تغيير هنا
        ->header('Content-Transfer-Encoding', 'binary')
        ->header('Accept-Ranges', 'bytes')
        ->header('Cache-Control', 'public, must-revalidate, max-age=0');

    }

}






