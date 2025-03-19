<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Orphan;
use App\Models\Report;
use App\Models\Sponsorship;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request , string $donor_id)
    {


        $reports = Report::where('donor_id' , $donor_id)
        ->when($request->search, function ($builder, $value) { //from search input
            $builder->whereHas('orphan', function ($query) use ($value){
                $query->where('name', 'LIKE', "%{$value}%");
            });
        })->with('orphan')->get();
        $count = $reports->count();
        $donor = Donor::where('id' , $donor_id)->value('name');
        return view('pages.reports.' . $donor . '.index' , compact('reports' , 'count' , 'donor_id'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $donor_id)
    {
        $donor = Donor::where('id' , $donor_id)->value('name');
        // dd($donor);
        $orphans = Sponsorship::
        where('donor_id' , $donor_id)
        ->where('status' , 'sponsored')
        ->with('orphan')
        ->with('orphan.image')
        ->with('orphan.profile')
        ->with('orphan.donorFieldValues')
        ->with('orphan.guardian')
        ->with('orphan.family')
        ->get();

        // dd($orphans);


        return view('pages.reports.' . $donor . '.create' , compact('orphans' , 'donor_id'));


        // return view('pages.reports.sharjah.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function AlbarStore(Request $request)
    {
        $validated = $request->validate([
            'donor_id' => ['required' ,'exists:donors,id'],
            'orphan_id' => ['required' , 'exists:orphans,id'],

            // sponsor
            'supervising_authority' => ['required' , 'string'],
            'supervising_authority_country' => ['required' , 'string'],
            'sponsor_name' => ['required' , 'string'],
            'sponsor_number' => ['required' , 'string'],
            'academic_level' => ['required' , 'string'],
            'orphan_obligations_islam' => ['required' , 'string'],
            'save_orphan_quran' => ['required' , 'string'],
            'changes_orphan_year' => ['required' , 'string'],
            'authority_comment_guarantee' => ['required' , 'string'],
            'orphan_message' => ['required' , 'string'],

        ]);

        $jsonData = [
            'supervising_authority' => $validated['supervising_authority'],
            'supervising_authority_country' => $validated['supervising_authority_country'],
            'sponsor_name' => $validated['sponsor_name'],
            'sponsor_number' => $validated['sponsor_number'],
            'academic_level' => $validated['academic_level'],
            'orphan_obligations_islam' => $validated['orphan_obligations_islam'],
            'save_orphan_quran' =>$validated['save_orphan_quran'],
            'changes_orphan_year' => $validated['changes_orphan_year'],
            'authority_comment_guarantee' => $validated['authority_comment_guarantee'],
            'orphan_message' => $validated['orphan_message'],

        ];

        DB::beginTransaction();

        try {

            $orphan = Orphan::findOrFail($validated['orphan_id']);


            if($orphan->report){
                $orphan->report()->delete();
            }



            Report::create([
                'donor_id' => $validated['donor_id'],
                'orphan_id' => $validated['orphan_id'],
                'fields' => json_encode($jsonData),
            ]);

            DB::commit();

            return redirect()->route('report.index' , $validated['donor_id'])->with('success', __('تمت اضافة التقرير بنجاح'));


        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('danger', __(' فشل في حفظ التقرير. يرجى المحاولة مرة أخرى. '));

        }
    }


    public function SharjahStore(Request $request)
    {

        $validated = $request->validate([
            'donor_id' => ['required' ,'exists:donors,id'],
            'orphan_id' => ['required' , 'exists:orphans,id'],

            'month_number' => ['required' , 'integer' , 'min:1'],

            // sponsor
            'sponsor_code' => ['required' , 'string'],
            'sponsor_name' => ['required' , 'string'],
            'sponsor_phone' => ['required' , 'string'],
            'sponsor_email' => ['required' , 'email'],
            'sponsor_mailbox' => ['required' , 'string'],
            'sponsor_address' => ['required' , 'string'],
            'live_mother' => ['required' , 'string' , 'in:نعم,لا'],
            'reason_live' => ['required' , 'string'],
            'conditions_orphan' => ['required' , 'string'],
            'chronic_disease' => ['nullable' , 'string'],
            'Type_disease' => ['nullable' , 'string'],
            'academic_level' => ['required' , 'string'],
            'reason_notStudying' => ['nullable' , 'string'],
            'alternative_approach' => ['required' , 'string'],
            'actions_supervisor' => ['nullable' , 'string'],
            'regular_praying' => ['required' , 'string' , 'in:نعم,لا'],
            'actions_supervisor_praying' => ['nullable' , 'string'],
            'ramadan_fasting' => ['required' , 'string' , 'in:نعم,لا'],
            'actions_supervisor_ramadan' => ['required' , 'string'],
            'quran_memorized' => ['required' , 'string'],
            'orphan_supervisor' => ['required' , 'string'],
            'date' => ['required' , 'date'],


            // image
            'signature' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                        'dimensions:min_width=100,min_height=100','max:1048576',],

            'donor_seal' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                        'dimensions:min_width=100,min_height=100','max:1048576',],

            'group_photo' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                        'dimensions:min_width=100,min_height=100','max:1048576',],

            'thanks_letter' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                        'dimensions:min_width=100,min_height=100','max:1048576',],


            'academic_certificate' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                        'dimensions:min_width=100,min_height=100','max:1048576',],

            'sponsorship_transfer_receipt' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                        'dimensions:min_width=100,min_height=100','max:1048576',],

        ]);

        $jsonData = [
            'month_number' => $validated['month_number'],
            'sponsor_code' => $validated['sponsor_code'],
            'sponsor_name' => $validated['sponsor_name'],
            'sponsor_phone' => $validated['sponsor_phone'],
            'sponsor_email' => $validated['sponsor_email'],
            'sponsor_mailbox' => $validated['sponsor_mailbox'],
            'sponsor_address' =>$validated['sponsor_address'],
            'live_mother' => $validated['live_mother'],
            'reason_live' => $validated['reason_live'],
            'conditions_orphan' => $validated['conditions_orphan'],
            'chronic_disease' => $validated['chronic_disease'],
            'Type_disease' => $validated['Type_disease'],
            'academic_level' => $validated['academic_level'],
            'reason_notStudying' => $validated['reason_notStudying'],
            'alternative_approach' => $validated['alternative_approach'],
            'actions_supervisor' => $validated['actions_supervisor'],
            'regular_praying' => $validated['regular_praying'],
            'actions_supervisor_praying' => $validated['actions_supervisor_praying'],
            'ramadan_fasting' => $validated['ramadan_fasting'],
            'actions_supervisor_ramadan' => $validated['actions_supervisor_ramadan'],
            'quran_memorized' => $validated['quran_memorized'],
            'orphan_supervisor' => $validated['orphan_supervisor'],
            'date' => $validated['date'],
        ];

        DB::beginTransaction();

        try {

            $orphan = Orphan::findOrFail($validated['orphan_id']);

            $report =  $orphan->report;

            $imageData = Arr::only($validated ,[
                'signature' , 'donor_seal' , 'group_photo' , 'thanks_letter' ,
                'academic_certificate' , 'sponsorship_transfer_receipt'
            ]);


            foreach ($imageData as $field) {
                if (!empty($field)) {
                    Storage::disk('public')->delete($field);
                }
            }

            if($orphan->report){
                $orphan->report()->delete();
            }



            // to rename image as 1.png , 2.jpg
            $counter = 1;

            foreach ($imageData as $key => $image) {
                if ($request->hasFile($key)) { //to check if image file is exit
                    $file = $request->file($key);
                    // تحديد اسم الصورة
                    $fileName = $counter . '.' . $file->getClientOriginalExtension();
                    // تخزين الصورة في المجلد المحدد
                    $path = $file->storeAs('reports/' . $orphan->name, $fileName, 'public');
                    // إضافة المسار إلى البيانات المعتمدة
                    $imageData[$key] = $path;

                    $counter++;
                }
            }


            Report::create([
                'donor_id' => $validated['donor_id'],
                'orphan_id' => $validated['orphan_id'],
                'fields' => json_encode($jsonData),
                'signature' =>$imageData['signature'],
                'donor_seal' =>$imageData['donor_seal'],
                'group_photo' =>$imageData['group_photo'],
                'thanks_letter' =>$imageData['thanks_letter'],
                'academic_certificate' =>$imageData['academic_certificate'],
                'sponsorship_transfer_receipt' =>$imageData['sponsorship_transfer_receipt'],
            ]);

            DB::commit();
            return redirect()->route('report.index' , $validated['donor_id'])->with('success', __('تمت اضافة التقرير بنجاح'));


        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('danger', __(' فشل في حفظ التقرير. يرجى المحاولة مرة أخرى. '));

        }

    }

    public function MaryamStore(Request $request)
    {
        $validated = $request->validate([
            'donor_id' => ['required' ,'exists:donors,id'],
            'orphan_id' => ['required' , 'exists:orphans,id'],
            'supervising_authority' => ['required' , 'string'],
            'country' => ['required' , 'string'],
            'supervising_authority_place' => ['required' , 'string'],
            'sponsor_name' => ['required' , 'string'],
            'sponsor_number' => ['required' , 'string'],
            'religious_behavior' => ['required' , 'string'],
            'memorize_quran' => ['required' , 'string'],
            'academic_level' => ['required' , 'string'],
            'letter_thanks' => ['required' , 'string'],

            // image
            'academic_certificate' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                        'dimensions:min_width=100,min_height=100','max:1048576',],

        ]);

        $jsonData = [
            'supervising_authority' => $validated['supervising_authority'],
            'country' => $validated['country'],
            'supervising_authority_place' => $validated['supervising_authority_place'],
            'sponsor_name' => $validated['sponsor_name'],
            'sponsor_number' => $validated['sponsor_number'],
            'religious_behavior' => $validated['religious_behavior'],
            'memorize_quran' =>$validated['memorize_quran'],
            'academic_level' => $validated['academic_level'],
            'letter_thanks' => $validated['letter_thanks'],
        ];

        DB::beginTransaction();

        try {

            $orphan = Orphan::findOrFail($validated['orphan_id']);

            if (!empty($validated['academic_certificate'])) {
                Storage::disk('public')->delete($validated['academic_certificate']);
            }

            if($orphan->report){
                $orphan->report()->delete();
            }



            if ($request->hasFile('academic_certificate')) { //to check if image file is exit
                $file = $request->file('academic_certificate');
                // تحديد اسم الصورة
                $fileName = 'academic_certificate' . '.' . $file->getClientOriginalExtension();
                // تخزين الصورة في المجلد المحدد
                $path = $file->storeAs('reports/' . $orphan->name, $fileName, 'public');
                // إضافة المسار إلى البيانات المعتمدة
                $validated['academic_certificate'] = $path;
            }


            Report::create([
                'donor_id' => $validated['donor_id'],
                'orphan_id' => $validated['orphan_id'],
                'fields' => json_encode($jsonData),
                'academic_certificate' =>$validated['academic_certificate'],
            ]);

            DB::commit();
            return redirect()->route('report.index' ,$validated['donor_id'])->with('success', __('تمت اضافة التقرير بنجاح'));


        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('danger', __(' فشل في حفظ التقرير. يرجى المحاولة مرة أخرى. '));

        }
    }

    public function DubaiStore(Request $request)
    {
        $validated = $request->validate([
            'donor_id' => ['required' ,'exists:donors,id'],
            'orphan_id' => ['required' , 'exists:orphans,id'],


            // sponsor
            'report_date' => ['required' , 'date'],
            'health_notes' => ['required' , 'string'],
            'orphan_management_notes' => ['required' , 'string'],
            'address_supervising_authority' => ['required' , 'string'],



            // image

            'donor_seal' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                        'dimensions:min_width=100,min_height=100','max:1048576',],

            'group_photo' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                        'dimensions:min_width=100,min_height=100','max:1048576',],

            'thanks_letter' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                        'dimensions:min_width=100,min_height=100','max:1048576',],


            'academic_certificate' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                        'dimensions:min_width=100,min_height=100','max:1048576',],

            'donor_accreditation' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                        'dimensions:min_width=100,min_height=100','max:1048576',],

        ]);

        $jsonData = [
            'report_date' => $validated['report_date'],
            'health_notes' => $validated['health_notes'],
            'orphan_management_notes' => $validated['orphan_management_notes'],
            'address_supervising_authority' => $validated['address_supervising_authority'],

        ];

        DB::beginTransaction();

        try {

            $orphan = Orphan::findOrFail($validated['orphan_id']);

            $report =  $orphan->report;

            $imageData = Arr::only($validated ,[
                'donor_seal' , 'group_photo' , 'thanks_letter' ,
                'academic_certificate' , 'donor_accreditation'
            ]);



            foreach ($imageData as $field) {
                if (!empty($field)) {
                    Storage::disk('public')->delete($field);
                }
            }


            if($orphan->report){
                $orphan->report()->delete();
            }



            // to rename image as 1.png , 2.jpg
            $counter = 1;

            foreach ($imageData as $key => $image) {
                if ($request->hasFile($key)) { //to check if image file is exit
                    $file = $request->file($key);
                    // تحديد اسم الصورة
                    $fileName = $counter . '.' . $file->getClientOriginalExtension();
                    // تخزين الصورة في المجلد المحدد
                    $path = $file->storeAs('reports/' . $orphan->name, $fileName, 'public');
                    // إضافة المسار إلى البيانات المعتمدة
                    $imageData[$key] = $path;

                    $counter++;
                }
            }


            Report::create([
                'donor_id' => $validated['donor_id'],
                'orphan_id' => $validated['orphan_id'],
                'fields' => json_encode($jsonData),
                'donor_seal' =>$imageData['donor_seal'],
                'group_photo' =>$imageData['group_photo'],
                'thanks_letter' =>$imageData['thanks_letter'],
                'academic_certificate' =>$imageData['academic_certificate'],
                'donor_accreditation' =>$imageData['donor_accreditation'],
            ]);

            DB::commit();
            return redirect()->route('report.index' , $validated['donor_id'])->with('success', __('تمت اضافة التقرير بنجاح'));


        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('danger', __(' فشل في حفظ التقرير. يرجى المحاولة مرة أخرى. '));

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $report = Report::where('id', $id)
            ->with('orphan')
            ->with('orphan.image')
            ->with(['orphan.profile' => function ($query) {
                    $query->select('orphan_id', 'father_death_date' , 'mother_name' ,'mother_death_date' , 'phone' ,'academic_stage');
            }])
            ->with('orphan.donorFieldValues')
            ->with(['orphan.guardian' => function ($query) {
                $query->select('orphan_id', 'guardian_name' ,'guardian_relationship');
            }])
            ->with(['orphan.family' => function ($query) {
                $query->select('orphan_id', 'family_number','housing_type');
            }])
        ->firstOrFail();



        $donor = Donor::where('id' , $report->donor_id)->value('name');

        $report->fields = json_decode($report->fields, true); // تحويل JSON إلى مصفوفة
        // dd($report->fields['report_date']);

        return view('pages.reports.' . $donor . '.edit' , compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $donor_id)
    {
        $report = Report::findOrFail($id);
        $donor_name = Donor::where('id', $donor_id)->value('name');

        switch ($donor_name) {
            case 'جمعية دار البر':
                $fieldsValidated = $request->validate([
                    'supervising_authority' => ['sometimes', 'string'],
                    'supervising_authority_country' => ['sometimes', 'string'],
                    'sponsor_name' => ['sometimes', 'string'],
                    'sponsor_number' => ['sometimes', 'string'],
                    'academic_level' => ['sometimes', 'string'],
                    'orphan_obligations_islam' => ['sometimes', 'string'],
                    'save_orphan_quran' => ['sometimes', 'string'],
                    'changes_orphan_year' => ['sometimes', 'string'],
                    'authority_comment_guarantee' => ['sometimes', 'string'],
                    'orphan_message' => ['sometimes', 'string'],
                ]);
                break;

            case 'جمعية الشارقة':
                $fieldsValidated = $request->validate([
                    'month_number' => ['sometimes', 'string'],
                    'sponsor_code' => ['sometimes', 'string'],
                    'sponsor_name' => ['sometimes', 'string'],
                    'sponsor_phone' => ['sometimes', 'string'],
                    'sponsor_email' => ['sometimes', 'string'],
                    'sponsor_mailbox' => ['sometimes', 'string'],
                    'sponsor_address' => ['sometimes', 'string'],
                    'live_mother' => ['sometimes', 'string'],
                    'reason_live' => ['sometimes', 'string'],
                    'conditions_orphan' => ['sometimes', 'string'],
                    'chronic_disease' => ['sometimes', 'string'],
                    'Type_disease' => ['sometimes', 'string'],
                    'academic_level' => ['sometimes', 'string'],
                    'reason_notStudying' => ['sometimes', 'string'],
                    'alternative_approach' => ['sometimes', 'string'],
                    'actions_supervisor' => ['sometimes', 'string'],
                    'regular_praying' => ['sometimes', 'string'],
                    'actions_supervisor_praying' => ['sometimes', 'string'],
                    'ramadan_fasting' => ['sometimes', 'string'],
                    'actions_supervisor_ramadan' => ['sometimes', 'string'],
                    'quran_memorized' => ['sometimes', 'string'],
                    'orphan_supervisor' => ['sometimes', 'string'],
                    'date' => ['sometimes', 'string'],
                ]);
                break;

            case 'جمعية السيدة مريم':
                $fieldsValidated = $request->validate([
                    'supervising_authority' => ['sometimes', 'string'],
                    'country' => ['sometimes', 'string'],
                    'supervising_authority_place' => ['sometimes', 'string'],
                    'sponsor_name' => ['sometimes', 'string'],
                    'sponsor_number' => ['sometimes', 'string'],
                    'religious_behavior' => ['sometimes', 'string'],
                    'memorize_quran' => ['sometimes', 'string'],
                    'academic_level' => ['sometimes', 'string'],
                    'letter_thanks' => ['sometimes', 'string'],
                ]);
                break;

            case 'جمعية دبي الخيرية':
                $fieldsValidated = $request->validate([
                    'report_date' => ['sometimes', 'string'],
                    'health_notes' => ['sometimes', 'string'],
                    'orphan_management_notes' => ['sometimes', 'string'],
                    'address_supervising_authority' => ['sometimes', 'string'],
                ]);
                break;
        }

        // قائمة الصور المتاحة للتحديث
        $imageFields = [
            'signature', 'donor_seal', 'group_photo', 'thanks_letter',
            'academic_certificate', 'sponsorship_transfer_receipt', 'donor_accreditation'
        ];

        // جلب الصور القديمة
        $old_images = [];
        foreach ($imageFields as $imageField) {
            $old_images[$imageField] = $report->$imageField;
        }

        DB::beginTransaction();
        try {
            $validated = $fieldsValidated;
            $new_images = [];
            $counter = 1;

            // تخزين الصور الجديدة أولاً
            foreach ($imageFields as $imageField) {
                if ($request->hasFile($imageField)) {
                    $file = $request->file($imageField);

                    // الاحتفاظ بنفس اسم الصورة القديمة إن وجد، أو استخدام اسم جديد
                    $filename = $old_images[$imageField]
                    ? pathinfo($old_images[$imageField], PATHINFO_FILENAME) . '_' . uniqid() . '.' . $file->getClientOriginalExtension()
                    : uniqid() . '_' . $file->hashName();
                                    $newPath = $file->storeAs('reports/' . $report->orphan->name, $filename, 'public');
                    // تخزين المسار الجديد
                    $new_images[$imageField] = $newPath;
                }
            }

            // تحديث البيانات في قاعدة البيانات
            $report->update([
                'fields' => json_encode($fieldsValidated),
                'signature' => $new_images['signature'] ?? $old_images['signature'],
                'donor_seal' => $new_images['donor_seal'] ?? $old_images['donor_seal'],
                'group_photo' => $new_images['group_photo'] ?? $old_images['group_photo'],
                'thanks_letter' => $new_images['thanks_letter'] ?? $old_images['thanks_letter'],
                'academic_certificate' => $new_images['academic_certificate'] ?? $old_images['academic_certificate'],
                'sponsorship_transfer_receipt' => $new_images['sponsorship_transfer_receipt'] ?? $old_images['sponsorship_transfer_receipt'],
                'donor_accreditation' => $new_images['donor_accreditation'] ?? $old_images['donor_accreditation'],
            ]);

            // بعد تحديث قاعدة البيانات، حذف الصور القديمة
            foreach ($new_images as $imageField => $newPath) {
                if ($old_images[$imageField] && Storage::disk('public')->exists($old_images[$imageField])) {
                    Storage::disk('public')->delete($old_images[$imageField]);
                }
            }

            DB::commit();
            return redirect()->route('report.index', $donor_id)->with('success', __('تم تعديل البيانات بنجاح'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('danger', __('فشل في تعديل البيانات. يرجى المحاولة مرة أخرى.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $report = Report::findOrFail($id);
        $report->delete();

        $images = ['signature', 'donor_seal', 'group_photo', 'thanks_letter', 'academic_certificate', 'sponsorship_transfer_receipt' , 'donor_accreditation'];

        foreach ($images as $image) {
            if ($report->$image && Storage::disk('public')->exists($report->$image)) {
                Storage::disk('public')->delete($report->$image);
            }
        }


        // if ($report->image || Storage::disk('public')->exists($report->image)) {
        //     Storage::disk('public')->delete($report->image);
        // }

        return redirect()->back()->with('success', 'تم حذف التقرير بنجاح');

    }

    public function DownloadReport(string $report_id){

    }
}
