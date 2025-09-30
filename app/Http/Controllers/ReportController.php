<?php

namespace App\Http\Controllers;

use Exception;
use ZipArchive;
use App\Models\Orphan;
use App\Models\Report;
use App\Models\Supporter;
use App\Models\Governorate;
use App\Models\Sponsorship;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Tcpdf\Fpdi;
use TCPDF;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;





class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request , string $supporter_id)
    {


        $reports = Report::where('supporter_id' , $supporter_id)
        ->when($request->search, function ($builder, $value) { //from search input
            $builder->whereHas('orphan', function ($query) use ($value){
                $query->where('name', 'LIKE', "%{$value}%");
            });
        })->with('orphan')->get();
        $count = $reports->count();
        $supporter = Supporter::where('id' , $supporter_id)->value('name');


        // return view('pages.reports.' . $supporter . '.index' , compact('reports' , 'count' , 'supporter_id'));


        if($supporter == 'جمعية دار البر'){
            return view('pages.reports.ber-association.index' , compact('reports' , 'count' , 'supporter_id'));

        }elseif($supporter == 'جمعية الشارقة'){
            return view('pages.reports.sharjah-association.index' , compact('reports' , 'count' , 'supporter_id'));

        }elseif($supporter == 'جمعية السيدة مريم'){
            return view('pages.reports.mary-association.index' , compact('reports' , 'count' , 'supporter_id'));

        }elseif($supporter == 'جمعية دبي الخيرية'){
            return view('pages.reports.dubai-association.index' , compact('reports' , 'count' , 'supporter_id'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $supporter_id)
    {
        $supporter = Supporter::where('id' , $supporter_id)->value('name');
        // dd($supporter);
        $orphans = Sponsorship::
        where('supporter_id' , $supporter_id)
        ->where('status' , 'sponsored')
        ->with('orphan')
        ->with('orphan.image')
        ->with('orphan.profile')
        ->with('orphan.supporterFieldValues')
        ->with('orphan.guardian')
        ->with('orphan.family')
        ->with('orphan.phones')
        ->get();

        // dd($orphans);

        $governorates = Governorate::with('cities')->get();

        if($supporter == 'جمعية دار البر'){
            return view('pages.reports.ber-association.create' , compact('orphans'  , 'supporter_id'));

        }elseif($supporter == 'جمعية الشارقة'){
            return view('pages.reports.sharjah-association.create' , compact('orphans' , 'supporter_id'));

        }elseif($supporter == 'جمعية السيدة مريم'){
            return view('pages.reports.mary-association.create' , compact('orphans' , 'supporter_id'));

        }elseif($supporter == 'جمعية دبي الخيرية'){
            return view('pages.reports.dubai-association.create' , compact('orphans' , 'supporter_id' , 'governorates'));
        }

        // return view('pages.reports.sharjah.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function AlbarStore(Request $request)
    {

        $validated = $request->validate([
            'supporter_id' => ['required' ,'exists:supporters,id'],
            'orphan_id' => ['required' , 'exists:orphans,id'],

            // sponsor
            // 'supervising_authority' => ['required' , 'string'],
            // 'supervising_authority_country' => ['required' , 'string'],
            'sponsor_name' => ['required' , 'string'],
            'sponsor_number' => ['required' , 'string'],
            'academic_level' => ['required' , 'string'],
            'orphan_obligations_islam' => ['required' , 'string'],
            'save_orphan_quran' => ['required' , 'string'],
            'changes_orphan_year' => ['required' , 'string'],
            'authority_comment_guarantee' => ['required' , 'string'],
            'orphan_message' => ['required' , 'string'],
            'academic_stage_detailes' => ['required' , 'string'],
            'profile_image' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                        'max:1048576',],

            'gender'=> ['nullable' , 'string'],
            'age'=> ['nullable' , 'string'],
            'health_status' => ['nullable' , 'string'],
            'academic_stage' => ['nullable' , 'string'],
            'class' => ['nullable' , 'string'],
            'guardian_name' => ['nullable' , 'string'],
            'guardian_relationship' => ['nullable' , 'string'],
            'disease_description' => ['nullable' , 'string'],


        ]);







        $jsonData = [
            // 'supervising_authority' => $validated['supervising_authority'],
            // 'supervising_authority_country' => $validated['supervising_authority_country'],
            'sponsor_name' => $validated['sponsor_name'],
            'sponsor_number' => $validated['sponsor_number'],
            'academic_level' => $validated['academic_level'],
            'orphan_obligations_islam' => $validated['orphan_obligations_islam'],
            'save_orphan_quran' =>$validated['save_orphan_quran'],
            'changes_orphan_year' => $validated['changes_orphan_year'],
            'authority_comment_guarantee' => $validated['authority_comment_guarantee'],
            'orphan_message' => $validated['orphan_message'],
            'academic_stage_detailes' => $validated['academic_stage_detailes'],

            'gender' => $validated['gender'] ?? null,
            'age' => $validated['age'] ?? null,
            'health_status' => $validated['health_status'] ?? null,
            'academic_stage' => $validated['academic_stage'] ?? null,
            'class' => $validated['class'] ?? null,
            'guardian_name' => $validated['guardian_name'] ?? null,
            'guardian_relationship' => $validated['guardian_relationship'] ?? null,
            'disease_description' => $validated['disease_description'] ?? null,
        ];

        DB::beginTransaction();

        try {

            $orphan = Orphan::findOrFail($validated['orphan_id']);

            if (!empty($validated['profile_image'])) {
                Storage::disk('public')->delete($validated['profile_image']);
            }

            if ($request->hasFile('profile_image')) { //to check if image file is exit
                    $file = $request->file('profile_image');
                    // تحديد اسم الصورة
                    $fileName = 'profile_image' . '.' . $file->getClientOriginalExtension();
                    // تخزين الصورة في المجلد المحدد
                    $path = $file->storeAs('reports/' . $orphan->name, $fileName, 'public');
                    // إضافة المسار إلى البيانات المعتمدة
                    $validated['profile_image'] = $path;
                }



            if($orphan->report){
                $orphan->report()->delete();
            }



            Report::create([
                'supporter_id' => $validated['supporter_id'],
                'orphan_id' => $validated['orphan_id'],
                'profile_image' => $validated['profile_image'],
                'fields' => json_encode($jsonData),
            ]);

            DB::commit();

            return redirect()->route('report.index' , $validated['supporter_id'])->with('success', __('تمت اضافة التقرير بنجاح'));


        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('danger', __(' فشل في حفظ التقرير. يرجى المحاولة مرة أخرى. '));

        }
    }


    public function SharjahStore(Request $request)
    {

        $validated = $request->validate([
            'supporter_id' => ['required' ,'exists:supporters,id'],
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
            // 'Type_disease' => ['nullable' , 'string'],
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


            'gender' => ['nullable' , 'string'],
            'birth_place' => ['nullable' , 'string'],
            'birth_date' => ['nullable' , 'date'],
            'age' => ['nullable' , 'string'],
            'reason_continuing_sponsorship' => ['nullable' , 'string'],
            'father_death_date' => ['nullable' , 'date'],
            'mother_name' => ['nullable' , 'string'],
            'mother_death_date' => ['nullable' , 'string'],
            'family_number' => ['nullable' , 'string'],
            'guardian_name' => ['nullable' , 'string'],
            'guardian_relationship' => ['nullable' , 'string'],
            'phone_number' => ['nullable' , 'string'],
            'whatsapp_phone' => ['nullable' , 'string'],
            'housing_type' => ['nullable' , 'string'],
            'health_status' => ['nullable' , 'string'],
            'disease_description' => ['nullable' , 'string'],
            'academic_stage' => ['nullable' , 'string'],
            'case_type' => ['nullable' , 'string'],


            // image
            'signature' =>['required','file' ,'mimes:png,jpg,jpeg,pdf','max:1048576'],

            'supporter_seal' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', 'max:1048576'],

            'group_photo' =>['required','file' ,'mimes:png,jpg,jpeg,pdf','max:1048576'],

            'thanks_letter' =>['required','file' ,'mimes:png,jpg,jpeg,pdf','max:1048576'],


            'academic_certificate' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', 'max:1048576'],

            'sponsorship_transfer_receipt' =>['required','file' ,'mimes:png,jpg,jpeg,pdf','max:1048576'],

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
            // 'Type_disease' => $validated['Type_disease'],
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

            'gender' => $validated['gender'] ?? null,
            'birth_place' => $validated['birth_place'] ?? null,
            'birth_date' => $validated['birth_date'] ?? null,
            'age' => $validated['age'] ?? null,
            'reason_continuing_sponsorship' => $validated['reason_continuing_sponsorship'] ?? null,
            'father_death_date' => $validated['father_death_date'] ?? null,
            'mother_name' => $validated['mother_name'] ?? null,
            'mother_death_date' => $validated['mother_death_date'] ?? null,
            'family_number' => $validated['family_number'] ?? null,
            'guardian_name' => $validated['guardian_name'] ?? null,
            'guardian_relationship' => $validated['guardian_relationship'] ?? null,
            'phone_number' => $validated['phone_number'] ?? null,
            'whatsapp_phone' => $validated['whatsapp_phone'] ?? null,
            'housing_type' => $validated['housing_type'] ?? null,
            'health_status' => $validated['health_status'] ?? null,
            'disease_description' => $validated['disease_description'] ?? null,
            'academic_stage' => $validated['academic_stage'] ?? null,
            'case_type' => $validated['case_type'] ?? null,

        ];

        DB::beginTransaction();

        try {

            $orphan = Orphan::findOrFail($validated['orphan_id']);

            $report =  $orphan->report;

            $imageData = Arr::only($validated ,[
                'signature' , 'supporter_seal' , 'group_photo' , 'thanks_letter' ,
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
                'supporter_id' => $validated['supporter_id'],
                'orphan_id' => $validated['orphan_id'],
                'fields' => json_encode($jsonData),
                'signature' =>$imageData['signature'],
                'supporter_seal' =>$imageData['supporter_seal'],
                'group_photo' =>$imageData['group_photo'],
                'thanks_letter' =>$imageData['thanks_letter'],
                'academic_certificate' =>$imageData['academic_certificate'],
                'sponsorship_transfer_receipt' =>$imageData['sponsorship_transfer_receipt'],
            ]);

            DB::commit();
            return redirect()->route('report.index' , $validated['supporter_id'])->with('success', __('تمت اضافة التقرير بنجاح'));


        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('danger', __(' فشل في حفظ التقرير. يرجى المحاولة مرة أخرى. '));

        }

    }

   public function MaryamStore(Request $request)
    {
        $validated = $request->validate([
            'supporter_id' => ['required' ,'exists:supporters,id'],
            'orphan_id' => ['required' , 'exists:orphans,id'],
            // 'supervising_authority' => ['required' , 'string'],
            'country' => ['required' , 'string'],
            'supervising_authority_place' => ['required' , 'string'],
            'sponsor_name' => ['required' , 'string'],
            'sponsor_number' => ['required' , 'string'],
            'religious_behavior' => ['required' , 'string'],
            'memorize_quran' => ['required' , 'string'],
            'academic_level' => ['required' , 'string'],
            'letter_thanks' => ['required' , 'string'],

            //
            'gender' => ['nullable' , 'string'],
            'case_type' => ['nullable' , 'string'],
            'health_status' => ['nullable' , 'string'],
            'class' => ['nullable' , 'string'],
            'birth_date' => ['nullable' , 'string'],
            'address' => ['nullable' , 'string'],
            'case_type' => ['nullable' , 'string'],
            'disease_description' => ['nullable' , 'string'],
            'mother_name' => ['nullable' , 'string'],
            'guardian_name' => ['nullable' , 'string'],
            'guardian_relationship' => ['nullable' , 'string'],


            // image
            'academic_certificate' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                        'max:1048576',],
            'payment_receipt' =>['nullable','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                        'max:1048576',],

            'profile_image' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                        'max:1048576',],

        ]);

        $jsonData = [
            // 'supervising_authority' => $validated['supervising_authority'],
            'country' => $validated['country'],
            'supervising_authority_place' => $validated['supervising_authority_place'],
            'sponsor_name' => $validated['sponsor_name'],
            'sponsor_number' => $validated['sponsor_number'],
            'religious_behavior' => $validated['religious_behavior'],
            'memorize_quran' =>$validated['memorize_quran'],
            'academic_level' => $validated['academic_level'],
            'letter_thanks' => $validated['letter_thanks'],

            'gender' => $validated['gender'] ?? '',
            'case_type' => $validated['case_type'] ?? '',
            'health_status' => $validated['health_status'] ?? '',
            'class' => $validated['class'] ?? '',
            'birth_date' => $validated['birth_date'] ?? '',
            'address' => $validated['address'] ?? '',
            'case_type' => $validated['case_type'] ?? '',
            'disease_description' => $validated['disease_description'] ?? '',
            'mother_name' => $validated['mother_name'] ?? '',
            'guardian_name' => $validated['guardian_name'] ?? '',
            'guardian_relationship' => $validated['guardian_relationship'] ?? '',

        ];

        DB::beginTransaction();

        try {

            $orphan = Orphan::findOrFail($validated['orphan_id']);

            if (!empty($validated['academic_certificate'])) {
                Storage::disk('public')->delete($validated['academic_certificate']);
            }

            if (!empty($validated['payment_receipt'])) {
                Storage::disk('public')->delete($validated['payment_receipt']);
            }

            if (!empty($validated['profile_image'])) {
                Storage::disk('public')->delete($validated['profile_image']);
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

            if ($request->hasFile('payment_receipt')) { //to check if image file is exit
                $file = $request->file('payment_receipt');
                // تحديد اسم الصورة
                $fileName = 'payment_receipt' . '.' . $file->getClientOriginalExtension();
                // تخزين الصورة في المجلد المحدد
                $path = $file->storeAs('reports/' . $orphan->name, $fileName, 'public');
                // إضافة المسار إلى البيانات المعتمدة
                $validated['payment_receipt'] = $path;
            }

            if ($request->hasFile('profile_image')) { //to check if image file is exit
                $file = $request->file('profile_image');
                // تحديد اسم الصورة
                $fileName = 'profile_image' . '.' . $file->getClientOriginalExtension();
                // تخزين الصورة في المجلد المحدد
                $path = $file->storeAs('reports/' . $orphan->name, $fileName, 'public');
                // إضافة المسار إلى البيانات المعتمدة
                $validated['profile_image'] = $path;
            }


            Report::create([
                'supporter_id' => $validated['supporter_id'],
                'orphan_id' => $validated['orphan_id'],
                'fields' => json_encode($jsonData),
                'academic_certificate' =>$validated['academic_certificate'],
                'payment_receipt' =>$validated['payment_receipt'],
                'profile_image' =>$validated['profile_image'],

            ]);

            DB::commit();
            return redirect()->route('report.index' ,$validated['supporter_id'])->with('success', __('تمت اضافة التقرير بنجاح'));


        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('danger', __(' فشل في حفظ التقرير. يرجى المحاولة مرة أخرى. '));

        }
    }

    public function DubaiStore(Request $request)
    {
        $governorate = Governorate::find($request->governorate)?->name;

        $request->merge([
            'governorate' => $governorate,
        ]);

        $validated = $request->validate([
            'supporter_id' => ['required' ,'exists:supporters,id'],
            'orphan_id' => ['required' , 'exists:orphans,id'],


            // sponsor
            'report_date' => ['required' , 'date'],
            'health_notes' => ['required' , 'string'],
            'orphan_management_notes' => ['required' , 'string'],
            'address_supervising_authority' => ['required' , 'string'],

            'governorate' => ['nullable' , 'string'],
            'center' => ['nullable' , 'string'],


             'birth_date' => ['nullable' , 'date'],
             'gender' => ['nullable' , 'string'],
             'guardian_name' => ['nullable' , 'string'],
             'guardian_relationship' => ['nullable' , 'string'],
             'mother_name' => ['nullable' , 'string'],
             'father_death_date' => ['nullable' , 'date'],
             'academic_stage' => ['nullable' , 'string'],
             'health_status' => ['nullable' , 'string'],





            // image

            'supporter_seal' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                        'max:1048576',],

            'group_photo' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                       'max:1048576',],

            'thanks_letter' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                        'max:1048576',],


            'academic_certificate' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                        'max:1048576',],

            'supporter_accreditation' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                        'max:1048576',],

        ]);

        $jsonData = [
            'report_date' => $validated['report_date'],
            'health_notes' => $validated['health_notes'],
            'orphan_management_notes' => $validated['orphan_management_notes'],
            'address_supervising_authority' => $validated['address_supervising_authority'],
            'birth_date' => $validated['birth_date'] ?? null,
            // 'birth_place' => $validated['birth_place'] ?? null,
            'gender' => $validated['gender'] ?? null,
            'guardian_name' => $validated['guardian_name'] ?? null,
            'guardian_relationship' => $validated['guardian_relationship'] ?? null,
            'mother_name' => $validated['mother_name'] ?? null,
            'father_death_date' => $validated['father_death_date'] ?? null ,
            'academic_stage' => $validated['academic_stage'] ?? null,
            'health_status' => $validated['health_status'] ?? null,

            'governorate' => $validated['governorate'] ?? null,
            'center' => $validated['center'] ?? null,



        ];


        DB::beginTransaction();

        try {

            $orphan = Orphan::findOrFail($validated['orphan_id']);

            $report =  $orphan->report;

            $imageData = Arr::only($validated ,[
                'supporter_seal' , 'group_photo' , 'thanks_letter' ,
                'academic_certificate' , 'supporter_accreditation'
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
                'supporter_id' => $validated['supporter_id'],
                'orphan_id' => $validated['orphan_id'],
                'fields' => json_encode($jsonData),
                'supporter_seal' =>$imageData['supporter_seal'],
                'group_photo' =>$imageData['group_photo'],
                'thanks_letter' =>$imageData['thanks_letter'],
                'academic_certificate' =>$imageData['academic_certificate'],
                'supporter_accreditation' =>$imageData['supporter_accreditation'],
            ]);

            DB::commit();
            return redirect()->route('report.index' , $validated['supporter_id'])->with('success', __('تمت اضافة التقرير بنجاح'));


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
                    $query->select('orphan_id', 'father_death_date' , 'mother_name' ,'mother_death_date' ,'academic_stage','governorate' , 'center');
            }])
            ->with('orphan.supporterFieldValues')
            ->with(['orphan.guardian' => function ($query) {
                $query->select('orphan_id', 'guardian_name' ,'guardian_relationship');
            }])
            ->with(['orphan.family' => function ($query) {
                $query->select('orphan_id', 'family_number','housing_type');
            }])
        ->firstOrFail();

         $governorates = Governorate::with('cities')->get();


        $supporter = Supporter::where('id' , $report->supporter_id)->value('name');

        $report->fields = json_decode($report->fields, true); // تحويل JSON إلى مصفوفة
        // dd($report->fields['report_date']);




        if($supporter == 'جمعية دار البر'){
            return view('pages.reports.ber-association.edit' , compact('report'));

        }elseif($supporter == 'جمعية الشارقة'){
            return view('pages.reports.sharjah-association.edit' , compact('report'));

        }elseif($supporter == 'جمعية السيدة مريم'){
            return view('pages.reports.mary-association.edit' , compact('report'));

        }elseif($supporter == 'جمعية دبي الخيرية'){
            return view('pages.reports.dubai-association.edit' , compact('report' , 'governorates'));
        }
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $supporter_id)
    {
        $report = Report::findOrFail($id);
        $supporter_name = Supporter::where('id', $supporter_id)->value('name');

        switch ($supporter_name) {

            case 'جمعية دار البر':
                $fieldsValidated = $request->validate([
                    // 'supervising_authority' => ['sometimes', 'string'],
                    // 'supervising_authority_country' => ['sometimes', 'string'],
                    'sponsor_name' => ['sometimes', 'string'],
                    'sponsor_number' => ['sometimes', 'string'],
                    'academic_level' => ['sometimes', 'string'],
                    'orphan_obligations_islam' => ['sometimes', 'string'],
                    'save_orphan_quran' => ['sometimes', 'string'],
                    'changes_orphan_year' => ['sometimes', 'string'],
                    'authority_comment_guarantee' => ['sometimes', 'string'],
                    'orphan_message' => ['sometimes', 'string'],
                    'academic_stage_detailes' => ['sometimes', 'string'],
                    'profile_image' =>['sometimes','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                        'max:1048576',],


                    'gender'=> ['nullable' , 'string'],
                    'age'=> ['nullable' , 'string'],
                    'health_status' => ['nullable' , 'string'],
                    'academic_stage' => ['nullable' , 'string'],
                    'class' => ['nullable' , 'string'],
                    'guardian_name' => ['nullable' , 'string'],
                    'guardian_relationship' => ['nullable' , 'string'],
                    'disease_description' => ['nullable' , 'string'],


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

                    'gender' => ['nullable' , 'string'],
                    'birth_place' => ['nullable' , 'string'],
                    'birth_date' => ['nullable' , 'date'],
                    'age' => ['nullable' , 'string'],
                    'reason_continuing_sponsorship' => ['nullable' , 'string'],
                    'father_death_date' => ['nullable' , 'date'],
                    'mother_name' => ['nullable' , 'string'],
                    'mother_death_date' => ['nullable' , 'string'],
                    'family_number' => ['nullable' , 'string'],
                    'guardian_name' => ['nullable' , 'string'],
                    'guardian_relationship' => ['nullable' , 'string'],
                    'phone_number' => ['nullable' , 'string'],
                    'whatsapp_phone' => ['nullable' , 'string'],
                    'housing_type' => ['nullable' , 'string'],
                    'health_status' => ['nullable' , 'string'],
                    'disease_description' => ['nullable' , 'string'],
                    'academic_stage' => ['nullable' , 'string'],
                    'case_type' => ['nullable' , 'string'],
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

                    'gender' => ['nullable' , 'string'],
                    'case_type' => ['nullable' , 'string'],
                    'health_status' => ['nullable' , 'string'],
                    'class' => ['nullable' , 'string'],
                    'birth_date' => ['nullable' , 'string'],
                    'address' => ['nullable' , 'string'],
                    'case_type' => ['nullable' , 'string'],
                    'disease_description' => ['nullable' , 'string'],
                    'mother_name' => ['nullable' , 'string'],
                    'guardian_name' => ['nullable' , 'string'],
                    'guardian_relationship' => ['nullable' , 'string'],
                ]);
                break;

            case 'جمعية دبي الخيرية':
                $fieldsValidated = $request->validate([
                    'report_date' => ['sometimes', 'string'],
                    'health_notes' => ['sometimes', 'string'],
                    'orphan_management_notes' => ['sometimes', 'string'],
                    'address_supervising_authority' => ['sometimes', 'string'],

                    'birth_date' => ['nullable' , 'date'],
                    'birth_place' => ['nullable' , 'string'],
                    'gender' => ['nullable' , 'string'],
                    'guardian_name' => ['nullable' , 'string'],
                    'guardian_relationship' => ['nullable' , 'string'],
                    'mother_name' => ['nullable' , 'string'],
                    'father_death_date' => ['nullable' , 'date'],
                    'academic_stage' => ['nullable' , 'string'],
                    'health_status' => ['nullable' , 'string'],
                ]);
                break;
        }

        // قائمة الصور المتاحة للتحديث
        $imageFields = [
            'signature', 'supporter_seal', 'group_photo', 'thanks_letter',
            'academic_certificate',  'profile_image',  'payment_receipt', 'sponsorship_transfer_receipt', 'supporter_accreditation', 'profile_image'
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
                'supporter_seal' => $new_images['supporter_seal'] ?? $old_images['supporter_seal'],
                'group_photo' => $new_images['group_photo'] ?? $old_images['group_photo'],
                'thanks_letter' => $new_images['thanks_letter'] ?? $old_images['thanks_letter'],
                'academic_certificate' => $new_images['academic_certificate'] ?? $old_images['academic_certificate'],
                'sponsorship_transfer_receipt' => $new_images['sponsorship_transfer_receipt'] ?? $old_images['sponsorship_transfer_receipt'],
                'supporter_accreditation' => $new_images['supporter_accreditation'] ?? $old_images['supporter_accreditation'],
                'profile_image' => $new_images['profile_image'] ?? $old_images['profile_image'],

            ]);

            // بعد تحديث قاعدة البيانات، حذف الصور القديمة
            foreach ($new_images as $imageField => $newPath) {
                if ($old_images[$imageField] && Storage::disk('public')->exists($old_images[$imageField])) {
                    Storage::disk('public')->delete($old_images[$imageField]);
                }
            }

            DB::commit();
            return redirect()->route('report.index', $supporter_id)->with('success', __('تم تعديل البيانات بنجاح'));
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

        $images = ['signature', 'supporter_seal', 'group_photo', 'thanks_letter', 'academic_certificate', 'sponsorship_transfer_receipt' , 'supporter_accreditation'];

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

    public function DownloadReport(string $report_id)
    {
        $report = Report::where('id', $report_id)
            ->with('orphan')
            ->with('orphan.image')
            ->with(['orphan.profile' => function ($query) {
                $query->select(
                    'orphan_id',
                    'father_death_date',
                    'mother_name',
                    'mother_death_date',
                    'academic_stage',
                    'class',
                    'full_address',
                    'governorate',
                    'center'
                );
            }])
            ->with('orphan.supporterFieldValues')
            ->with(['orphan.guardian' => function ($query) {
                $query->select('orphan_id', 'guardian_name', 'guardian_relationship');
            }])
            ->with(['orphan.family' => function ($query) {
                $query->select('orphan_id', 'family_number', 'housing_type');
            }])
            ->with('supporter')
            ->firstOrFail();

        $report->fields = json_decode($report->fields, true);

        $viewName = 'pdf.reports.supporter_' . $report->supporter->id;

        if (!view()->exists($viewName)) {
            abort(404, 'لا يوجد قالب PDF مخصص لهذه الجمعية');
        }

        // 1) توليد PDF عبر mPDF
        $pdf = \Mccarlosen\LaravelMpdf\Facades\LaravelMpdf::loadView($viewName, [
            'report' => $report
        ]);

        $pdfPath = storage_path('app/public/temp_report.pdf');
        file_put_contents($pdfPath, $pdf->output());

        // 2) نستخدم FPDI
        $tcpdf = new \setasign\Fpdi\Tcpdf\Fpdi();
        $pageCount = $tcpdf->setSourceFile($pdfPath);

        // مر على كل الصفحات
        if ($report->supporter->id == 1) {
            $this->fillSupporter1Fields($tcpdf, $report, $pageCount);
        }
        elseif ($report->supporter->id == 2) {
            $this->fillSupporter2Fields($tcpdf, $report, $pageCount);
        }

        elseif($report->supporter->id == 3) {
            $this->fillSupporter3Fields($tcpdf, $report, $pageCount);
        }
        elseif($report->supporter->id == 4){
            $this->fillSupporter4Fields($tcpdf, $report, $pageCount);

        }

        return response($tcpdf->Output('supporter_' . $report->supporter->id . '.pdf', 'S'))
            ->header('Content-Type', 'application/pdf');
    }



    /**
 * Fill PDF fields for supporter 1
 *
 * @param \setasign\Fpdi\Tcpdf\Fpdi $tcpdf
 * @param \App\Models\Report $report
 * @param int $pageCount
 * @return void
 */
private function fillSupporter1Fields($tcpdf, $report, $pageCount)
{
    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        $tcpdf->AddPage();
        $tplId = $tcpdf->importPage($pageNo);
        $tcpdf->useTemplate($tplId, 0, 0, 210);

        $tcpdf->setRTL(true);
        $tcpdf->SetFont('arial', '', 14);
        $tcpdf->SetTextColor(0, 0, 0);

        if ($pageNo == 1) {
            $fields = $report->fields ?? [];

            $tcpdf->SetXY(143, 95);
            $tcpdf->TextField('sponsor_name', 90, 9, [
                'value' => $fields['sponsor_name'] ?? '',
                'align' => 'C',
            ]);

            $tcpdf->SetXY(143, 105);
            $tcpdf->TextField('sponsor_number', 90, 9, [
                'value' => $fields['sponsor_number'] ?? '',
                'align' => 'C',
            ]);

            $tcpdf->SetXY(103, 122.5);
            $tcpdf->TextField('orphan_name', 64, 8.5, [
                'value' => $report->orphan->name ?? '',
                'align' => 'C',
            ]);

            $tcpdf->SetXY(200, 122.5);
            $tcpdf->TextField('orphan_code', 63, 8.5, [
                'value' => $report->orphan->internal_code ?? '',
                'align' => 'C',
            ]);

            $tcpdf->SetXY(200, 132);
            $tcpdf->TextField('orphan_gender', 41.3, 8.5, [
                'value' => $report->orphan->gender ?? $fields['gender'] ?? '',
                'align' => 'C',
            ]);

            $tcpdf->SetXY(137.3, 132);
            $tcpdf->TextField('orphan_old', 41.3, 8.5, [
                'value' => ($report->orphan->age ?? $fields['age'] ?? '') . ' سنوات',
                'align' => 'C',
            ]);

            $tcpdf->SetXY(200, 149);
            $tcpdf->TextField('orphan_status', 130, 8.5, [
                'value' => $report->orphan->health_status ?? $fields['health_status'] ?? '',
                'align' => 'C',
            ]);

            $tcpdf->SetXY(200, 158);
            $tcpdf->TextField('orphan_dkno', 190, 8.5, [
                'value' => $report->orphan->disease_description
                    ?? $report->orphan->disability_type
                    ?? $fields['disease_description'] ?? '',
                'align' => 'C',
            ]);

            $tcpdf->SetXY(72.5, 175);
            $tcpdf->TextField('orphan_academic_stage', 30, 8.5, [
                'value' => $report->orphan->profile->academic_stage ?? $fields['academic_stage'] ?? '',
                'align' => 'C',
            ]);

            $tcpdf->SetXY(200, 175);
            $tcpdf->TextField('orphan_academic_level', 30, 9, [
                'value' => $fields['academic_level'] ?? '',
            ]);

            $tcpdf->SetXY(137, 175);
            $tcpdf->TextField('orphan_class', 46, 9, [
                'value' => $report->orphan->profile->class ?? $fields['class'] ?? '',
            ]);

            $tcpdf->SetXY(200, 185);
            $tcpdf->TextField('orphan_class_description', 190, 8, [
                'value' => $fields['academic_stage_detailes'] ?? '',
            ]);

            $tcpdf->SetXY(103, 194);
            $tcpdf->TextField('orphan_obligations_islam', 39, 9, [
                'value' => $fields['orphan_obligations_islam'] ?? '',
            ]);

            $tcpdf->SetXY(200, 194);
            $tcpdf->TextField('save_orphan_quran', 39, 9, [
                'value' => ($fields['save_orphan_quran'] ?? '') . ' جزء',
            ]);

            $tcpdf->SetXY(133, 212);
            $tcpdf->TextField('orphan_guardian_name', 60, 8, [
                'value' => $report->orphan->guardian->guardian_name ?? $fields['guardian_name'] ?? '',
            ]);

            $tcpdf->SetXY(200, 212);
            $tcpdf->TextField('orphan_guardian_relationship', 37, 9, [
                'value' => $report->orphan->guardian->guardian_relationship ?? $fields['guardian_relationship'] ?? '',
            ]);

            $tcpdf->SetXY(200, 221.7);
            $tcpdf->TextField('orphan_changes_orphan_year', 130, 15, [
                'value' => $fields['changes_orphan_year'] ?? '',
            ]);

            $tcpdf->SetXY(200, 247);
            $tcpdf->TextField('orphan_authority_comment_guarantee', 190, 9, [
                'value' => $fields['authority_comment_guarantee'] ?? '',
            ]);

            $tcpdf->SetXY(200, 265);
            $tcpdf->TextField('orphan_message', 190, 9, [
                'value' => $fields['orphan_message'] ?? '',
            ]);
        }
    }
}
private function fillSupporter2Fields($tcpdf, $report, $pageCount)
{
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $tcpdf->AddPage();
            $tplId = $tcpdf->importPage($pageNo);
            $tcpdf->useTemplate($tplId, 0, 0, 210);

            $tcpdf->setRTL(true);
            $tcpdf->SetFont('arial', '', 16);
            $tcpdf->SetTextColor(0,0,0);



            if ($pageNo == 2) {
                // رقم الكفيل
                // 120 + يسار
                // 97 - فوق

                $tcpdf->SetXY(172.5, 65.5);
                $tcpdf->TextField('sponsor_code', 74.5, 8.5, [
                    'value' =>$report->fields['sponsor_code'] ?? '',
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                //اسم الكافل
                $tcpdf->SetXY(135, 81);
                $tcpdf->TextField('sponsor_name', 85.5, 8.5, [
                    'value' =>$report->fields['sponsor_name'] ?? '',
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // هاتف الكافل
                $tcpdf->SetXY(201, 80.5);
                $tcpdf->TextField('sponsor_phone', 42, 8.5, [
                    'value' =>$report->fields['sponsor_phone'] ?? '',
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // ايميل الكافل
                $tcpdf->SetXY(136.8, 95.5);
                $tcpdf->TextField('sponsor_email', 85.5, 8.5, [
                    'value' =>$report->fields['sponsor_email'] ?? '',
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // صندوق بريد الكافل
                $tcpdf->SetXY(202, 95);
                $tcpdf->TextField('sponsor_mailbox', 42, 8.5, [
                    'value' =>$report->fields['sponsor_mailbox'] ?? '',
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                $tcpdf->SetXY(202, 110.3);
                $tcpdf->TextField('sponsor_address', 170.5, 8.5, [
                    'value' =>$report->fields['sponsor_address'] ?? '',
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // اسم اليتيم
                $tcpdf->SetXY(149, 158.5);
                $tcpdf->TextField('name', 94, 8.5, [
                    'value' =>$report->orphan->name,
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // كود اليتيم
                $tcpdf->SetXY(205, 158.5);
                $tcpdf->TextField('case_type', 32, 8.5, [
                    'value' =>$report->orphan->case_type ?? $report->fields['case_type'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // تاريخ ميلاد اليتيم
                $tcpdf->SetXY(89, 173);
                $tcpdf->TextField('birth_place', 46, 8.5, [
                    'value' =>$report->orphan->birth_place ?? $report->fields['birth_place'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                //الجنس
                $tcpdf->SetXY(206.5, 173);
                $tcpdf->TextField('gender', 36, 8.6, [
                    'value' =>$report->orphan->gender ?? $report->fields['gender'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // تاريخ ميلاد اليتيم
                $tcpdf->SetXY(85, 187.5);
                $tcpdf->TextField('birth_date', 41.5, 8.6, [
                    'value' =>$report->orphan->birth_date ?? $report->fields['birth_date'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // عمر اليتيم
                $tcpdf->SetXY(143.5, 187);
                $tcpdf->TextField('age', 29, 8.6, [
                    'value' =>$report->orphan->age ?? $report->fields['age'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // سبب استمرار الكفالة
                $tcpdf->SetXY(206.5, 196.5);
                $tcpdf->TextField('reason_continuing_sponsorship', 132, 13.5, [
                    'value' =>$report->orphan->getFieldValueByDatabaseName('reason_continuing_sponsorship') ?? $report->fields['reason_continuing_sponsorship'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // تاريخ وفاة الاب
                $tcpdf->SetXY(93, 213.2);
                $tcpdf->TextField('father_death_date', 42, 8.6, [
                    'value' =>$report->orphan->profile->father_death_date ?? $report->fields['father_death_date'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // اسم الام
                $tcpdf->SetXY(207, 214.5);
                $tcpdf->TextField('mother_name', 88, 8.6, [
                    'value' =>$report->orphan->profile->mother_name ?? $report->fields['mother_name'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // تاريخ وفاة الام
                $tcpdf->SetXY(129.5, 228);
                $tcpdf->TextField('mother_death_date', 49, 8.5, [
                    'value' =>$report->orphan->profile->mother_death_date ?? 'غير متوفاة',
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // رقم العائلة
                $tcpdf->SetXY(200, 230);
                $tcpdf->TextField('family_number', 30, 8.5, [
                    'value' =>$report->orphan->family->family_number ?? $report->fields['family_number'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // اسم الوصي
                $tcpdf->SetXY(142, 243);
                $tcpdf->TextField('guardian_name', 91.5, 8.6, [
                    'value' =>$report->orphan->guardian->guardian_name ?? $report->fields['guardian_name'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // صلة الوصي باليتيم
                $tcpdf->SetXY(208.5, 242);
                $tcpdf->TextField('guardian_relationship', 42, 8.5, [
                    'value' =>$report->orphan->guardian->guardian_relationship ?? $report->fields['guardian_relationship'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // رقم الهاتف
                $tcpdf->SetXY(96.5, 257);
                $tcpdf->TextField('phone_number', 61.5, 8.4, [
                    'value' =>$report->orphan->phones[0]->phone_number ?? $report->fields['phone_number'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);

                // رقم الواتساب
                $tcpdf->SetXY(198, 257);
                $tcpdf->TextField('whatsapp_phone', 61.5, 8.4, [
                    'value' =>$report->orphan->getFieldValueByDatabaseName('whatsapp_phone') ?? $report->fields['whatsapp_phone'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                ]);



            }

            if($pageNo == 3){

                // نوع السكن
                $tcpdf->SetXY(87.5, 43);
                $tcpdf->TextField('live_mother', 41, 8.5, [
                    'value' =>$report->fields['live_mother'] ?? '',
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // سبب السكن
                $tcpdf->SetXY(200, 42.5);
                $tcpdf->TextField('reason_live', 93, 8.5, [
                    'value' =>$report->fields['reason_live'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // نوع السكن
                $tcpdf->SetXY(200.5, 54);
                $tcpdf->TextField('housing_type', 164.5, 8.5, [
                    'value' =>$report->orphan->family->housing_type ?? $report->fields['housing_type'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // حالة اليتيم
                $tcpdf->SetXY(200, 69);
                $tcpdf->TextField('conditions_orphan', 139.5, 17, [
                    'value' =>$report->fields['conditions_orphan'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // الحالة الصحية
                $tcpdf->SetXY(114.5, 105);
                $tcpdf->TextField('health_status', 73.5, 8.5, [
                    'value' =>$report->orphan->health_status ?? $report->fields['health_status'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // وصف المرض
                $tcpdf->SetXY(198 , 103);
                $tcpdf->TextField('chronic_disease', 45.5, 8.5, [
                    'value' =>$report->fields['chronic_disease'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // وصف المرض
                $tcpdf->SetXY(201 , 116);
                $tcpdf->TextField('disease_description', 146.5, 12, [
                    'value' =>$report->orphan->disease_description ?? $report->fields['disease_description']  ?? '-',
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // المرحلة الدراسية
                $tcpdf->SetXY(112 , 145.5);
                $tcpdf->TextField('chronic_disease', 64.5, 8.5, [
                    'value' =>$report->orphan->profile->academic_stage ?? $report->fields['academic_stage'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // المستوى الدراسي
                $tcpdf->SetXY(200.2 , 145);
                $tcpdf->TextField('chronic_disease', 44, 8.5, [
                    'value' =>$report->fields['academic_level'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // سبب عدم الدراسة
                $tcpdf->SetXY(98 , 158);
                $tcpdf->TextField('reason_notStudying', 48, 8.5, [
                    'value' =>$report->fields['reason_notStudying'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // المنهج البديل
                $tcpdf->SetXY(201 , 158);
                $tcpdf->TextField('alternative_approach', 73.5, 8.5, [
                    'value' =>$report->fields['alternative_approach'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // ابرز الصعوبات التي تواجه اليتيم دراسيا
                $tcpdf->SetXY(200.5 , 170);
                $tcpdf->TextField('actions_supervisor', 125.5, 10, [
                    'value' =>$report->fields['actions_supervisor'],
                    'align' => 'C',
                    'multiline' => true,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // التزام اليتيم بالصلوات
                $tcpdf->SetXY(81 , 199);
                $tcpdf->TextField('regular_praying', 29, 8.5, [
                    'value' =>$report->fields['regular_praying'],
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // التزام المشرف بالمتابعة
                $tcpdf->SetXY(205 , 198);
                $tcpdf->TextField('actions_supervisor_praying', 60, 8.5, [
                    'value' =>$report->fields['actions_supervisor_praying'],
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // التزام اليتيم بالصيام
                $tcpdf->SetXY(80 , 213);
                $tcpdf->TextField('ramadan_fasting', 38, 8.5, [
                    'value' =>$report->fields['ramadan_fasting'],
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // التزام المشرف بالمتابعة
                $tcpdf->SetXY(207.5 , 212);
                $tcpdf->TextField('actions_supervisor_ramadan', 62.5, 8.5, [
                    'value' =>$report->fields['actions_supervisor_ramadan'],
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // حفظ اليتيم من القران الكريم
                $tcpdf->SetXY(206 , 226);
                $tcpdf->TextField('quran_memorized', 141.5, 8.5, [
                    'value' =>$report->fields['quran_memorized'],
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                // المشرف على اليتيم
                $tcpdf->SetXY(105 , 241);
                $tcpdf->TextField('orphan_supervisor', 63.5, 8.5, [
                    'value' =>$report->fields['orphan_supervisor'],
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);

                $tcpdf->SetXY(105 , 253.5);
                $tcpdf->TextField('date', 65, 8.5, [
                    'value' =>$report->fields['date'],
                    'align' => 'C',
                    'multiline' => false,
                    'textColor' => [29, 29, 254],
                    'fillColor' => null, // اللون الصحيح
                    // 'bgcolor' => [225,225,255] // مهم
                ]);



            }

   }

}
private function fillSupporter3Fields($tcpdf, $report, $pageCount)
{
    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        $tcpdf->AddPage();
        $tplId = $tcpdf->importPage($pageNo);
        $tcpdf->useTemplate($tplId, 0, 0, 210);

        $tcpdf->setRTL(true);
        $tcpdf->SetFont('arial', '', 14);
        $tcpdf->SetTextColor(0,0,0);



        if ($pageNo == 1) {
            // الدولة
            // 120 + يسار
            // 97 - فوق
            $tcpdf->SetXY(101, 74);
            $tcpdf->TextField('country', 70, 9, [
                'value' => $report->fields['country'] ?? '',
                'align' => 'C',
                'multiline' => true,
                'textColor' => [0, 0, 0],
                'fillColor' => null, // اللون الصحيح
            ]);



            // عنوان الجهة المشرفة
            $tcpdf->SetXY(200, 74);
            $tcpdf->TextField('supervising_authority_place', 49, 9, [
                'value' => $report->fields['supervising_authority_place'] ?? '',
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // اسم الكافل
            $tcpdf->SetXY(101, 85.5);
            $tcpdf->TextField('sponsor_name', 70, 9, [
                'value' => $report->fields['sponsor_name'] ?? '',
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            //  رقم الكافل
            $tcpdf->SetXY(200, 85.5);
            $tcpdf->TextField('sponsor_number', 70, 9, [
                'value' =>$report->fields['sponsor_number'] ?? '',
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // اسم اليتيم
            $tcpdf->SetXY(101, 97);
            $tcpdf->TextField('name', 70, 16, [
                'value' => $report->orphan->name ,
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // رقم اليتيم
            $tcpdf->SetXY(200, 97.2);
            $tcpdf->TextField('internal_code', 70, 9, [
                'value' => $report->orphan->internal_code,
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // الجنس
            $tcpdf->SetXY(101, 115);
            $tcpdf->TextField('orphan_status', 70, 9.5, [
                'value' => $report->orphan->gender ?? $report->fields['gender'] ?? '',
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // تاريخ ميلاد اليتيم
            $tcpdf->SetXY(200, 115);
            $tcpdf->TextField('birth_date',57.5, 9.5, [
                'value' => $report->orphan->birth_date ?? $report->fields['birth_date'] ?? '',
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // العنوان

            $tcpdf->SetXY(101, 127);
            $tcpdf->TextField('orphan_status', 70, 9.5, [
                'value' => $report->orphan->profile->governorate . '/' . $report->orphan->profile->center . '/' . $report->orphan->profile->full_address,
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            //  العمر
            $tcpdf->SetXY(200, 127);
            $birthDate = \Carbon\Carbon::parse($report->orphan->birth_date);
            $years = $birthDate->age;
            $months = $birthDate->diffInMonths(now());
            $tcpdf->TextField('birth_date',70, 9.5, [
                'value' => $years>=1 ? $years . ' سنة' : $months . ' شهر',
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // حالة اليتم
            $tcpdf->SetXY(101, 138);
            $tcpdf->TextField('orphan_status', 70, 9.5, [
                'value' => $report->orphan->case_type ?? $report->fields['case_type'],
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // رقم التيلفون
            $tcpdf->SetXY(200, 138);
            $birthDate = \Carbon\Carbon::parse($report->orphan->birth_date);
            $years = $birthDate->age;
            $months = $birthDate->diffInMonths(now());
            $tcpdf->TextField('phone_number',67.5, 10, [
                'value' => $report->orphan->phones[0]->phone_number ?? '',
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            //  الحالة الصحية
            $tcpdf->SetXY(101, 164);
            $tcpdf->TextField('health_status', 64, 9.5, [
                'value' => $report->orphan->health_status ?? $report->fields['health_status'],
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            //  اسم الأم
            $tcpdf->SetXY(200, 164);
            $tcpdf->TextField('mother_name',66.5, 9.5, [
                'value' =>  $report->orphan->profile->mother_name ?? $report->fields['mother_name'],
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // اسم المسؤول عن اليتيم
            $tcpdf->SetXY(101, 175.5);
            $tcpdf->TextField('guardian_name', 49.5, 15, [
                'value' => $report->orphan->guardian->guardian_name ?? $report->fields['guardian_name'],
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,

            ]);

            // صلة القرابة
            $tcpdf->SetXY(200, 175.5);
            $tcpdf->TextField('guardian_relationship',66.5, 9.5, [
                'value' =>  $report->orphan->guardian->guardian_relationship ?? $report->fields['guardian_relationship'],
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // السلوك الديني
            $tcpdf->SetXY(101, 192);
            $tcpdf->TextField('religious_behavior', 64, 9.5, [
                'value' => $report->fields['religious_behavior'] ?? '',
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // حفظه للقران
            $tcpdf->SetXY(200, 192);
            $tcpdf->TextField('memorize_quran',66.5, 9.5, [
                'value' =>  $report->fields['memorize_quran'] . 'جزء' ?? '',
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // الصف
            $tcpdf->SetXY(101, 204);
            $tcpdf->TextField('academic_stage', 60, 9.5, [
                'value' => $report->orphan->profile->academic_stage ?? $report->fields['class'] ?? '',
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            // المستوى الدراسي
            $tcpdf->SetXY(200, 204);
            $tcpdf->TextField('academic_level',57, 9.5, [
                'value' =>  $report->fields['academic_level'] ?? '',
                'align' => 'C',
                'textColor' => [0, 0, 0],
                'fillColor' => null,
                'multiline' => true,
            ]);

            $tcpdf->SetXY(200, 229);
            $tcpdf->TextField('letter_thanks',190, 29, [
                'value' => $report->fields['letter_thanks'],
                'align' => 'C',
                'borderStyle' => 'none',       // لإلغاء الإطار
                'borderColor' => null, // لون الإطار أبيض (شفاف عملياً)
                'fillColor' => null,          // الخلفية شفافة
                'textColor' => [0, 0, 0],      // لون النص
            ]);


            // // مش عارف حاليا لشو
            // $tcpdf->SetXY(200, 159);
            // $tcpdf->TextField('orphan_dkno', 189, 8, [
            //     'value' => $report->orphan->disease_description
            //     ?? $report->orphan->disability_type
            //     ?? $report->fields['disease_description'] ?? 'بيىم' ,
            //     'align' => 'C',
            // ]);

            //  // المرحلة الدراسية
            //  $tcpdf->SetXY(70, 177);
            //  $tcpdf->TextField('orphan_academic_stage', 27, 8, [
            //      'value' => $report->orphan->profile->academic_stage ?: $report->fields['academic_stage'] ?? '',
            //      'align' => 'C',
            //  ]);
        }
    }
}
private function fillSupporter4Fields($tcpdf, $report, $pageCount)
{
    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        $tcpdf->AddPage();
        $tplId = $tcpdf->importPage($pageNo);
        $tcpdf->useTemplate($tplId, 0, 0, 210);

        $tcpdf->setRTL(true);
        $tcpdf->SetFont('arial', '', 14);
        $tcpdf->SetTextColor(0,0,0);



        if ($pageNo == 2) {
            // رقم الكفيل
            // 120 + يسار
            // 97 - فوق

            $tcpdf->SetXY(103, 42);
            $tcpdf->TextField('orphan_number_dbi', 63,10, [
                'value' => $report->orphan->internal_code ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);

            $tcpdf->SetXY(198.3, 42);
            $tcpdf->TextField('report_date_dbi', 63,10, [
                'value' => $report->fields['report_date'] ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);

            $tcpdf->SetXY(123.5, 56.5);
            $tcpdf->TextField('orphan_name_dbi', 83.5,10, [
                'value' =>$report->orphan->name ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);
            $tcpdf->SetXY(73, 71);
            $tcpdf->TextField('orphan_birth_date_dbi', 33,9.5, [
                'value' =>$report->orphan->birth_date ?? $report->fields['birth_date'] ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);
            $tcpdf->SetXY(149.3, 71);
            $tcpdf->TextField('orphan_governorate_dbi', 46.5 ,9.5, [
                'value' => ($report->orphan->profile->governorate ?? $report->fields['governorate'])
                                 . '/' .
                            ($report->orphan->profile->center ?? $report->fields['center']) ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);
            $tcpdf->SetXY(198, 71);
            $tcpdf->TextField('orphan_gender_dbi', 29.4,9.5, [
                'value' => $report->orphan->gender ?? $report->fields['gender'] ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);

            $tcpdf->SetXY(149.4, 85);
            $tcpdf->TextField('orphan_guardian_name_dbi', 78.3,10, [
                'value' => $report->orphan->guardian->guardian_name ?? $report->fields['guardian_name'] ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);
            $tcpdf->SetXY(95.4, 99.5);
            $tcpdf->TextField('orphan_guardian_relationship_dbi', 50,9.5, [
                'value' => $report->orphan->guardian->guardian_relationship ?? $report->fields['guardian_relationship'] ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);
            $tcpdf->SetXY(114, 113.7);
            $tcpdf->TextField('orphan_mother_name_dbi', 71.2,9.5, [
                'value' => $report->orphan->profile->mother_name ?? $report->fields['mother_name'] ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);
            $tcpdf->SetXY(198, 113.9);
            $tcpdf->TextField('orphan_father_death_date_dbi', 45.8,9.5, [
                'value' => $report->orphan->profile->father_death_date ?? $report->fields['father_death_date'] ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);
            $tcpdf->SetXY(198, 128.1);
            $tcpdf->TextField('orphan_father_death_date_dbi', 151.5,9.5, [
                'value' => $report->orphan->profile->father_death_date ?? $report->fields['father_death_date'] ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);
            $tcpdf->SetXY(198.2, 142.3);
            $tcpdf->TextField('orphan_health_notes_dbi', 118.2,9.5, [
                'value' => $report->fields['health_notes'] ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);

            $tcpdf->SetXY(198, 156.7);
            $tcpdf->TextField('orphan_academic_stage_dbi', 148,9.5, [
                'value' => $report->orphan->profile->academic_stage ?? $report->fields['academic_stage'] ?? '',
                'align' => 'C',
                'multiline' => false,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);
            $tcpdf->SetXY(199, 185.5);
            $tcpdf->TextField('orphan_management_notes_dbi', 188.3,33, [
                'value' => $report->fields['orphan_management_notes'] ?? '',
                'align' => 'C',
                'multiline' => true,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);
            $tcpdf->SetXY(199, 229.5);
            $tcpdf->TextField('orphan_management_notes_dbi', 188.3,9.5, [
                'value' => $report->fields['address_supervising_authority'] ?? '',
                'align' => 'C',
                'multiline' => true,
                'border' => 0
                // 'bgcolor' => [221,228,255] // مهم
            ]);
        }
    }
}




    public function DownloadAllReports($supporter_id)
    {
        $reports = Report::where('supporter_id', $supporter_id)
            ->with('orphan')
            ->with('orphan.image')
            ->with(['orphan.profile' => function ($query) {
                $query->select('orphan_id', 'father_death_date', 'mother_name', 'mother_death_date', 'academic_stage', 'class', 'full_address', 'governorate', 'center');
            }])
            ->with('orphan.supporterFieldValues')
            ->with(['orphan.guardian' => function ($query) {
                $query->select('orphan_id', 'guardian_name', 'guardian_relationship');
            }])
            ->with(['orphan.family' => function ($query) {
                $query->select('orphan_id', 'family_number', 'housing_type');
            }])
            ->with('supporter')
            ->get();

        if ($reports->isEmpty()) {
            return back()->with('danger', 'لا يوجد تقارير للتحميل');
        }

        $zipFileName = 'reports_' . now()->format('Y_m_d_His') . '.zip';
        $zipPath = storage_path('app/' . $zipFileName);

        $zip = new \ZipArchive;
        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
            foreach ($reports as $report) {
                $report->fields = json_decode($report->fields, true);

                $viewName = 'pdf.reports.supporter_' . $report->supporter->id;

                if (view()->exists($viewName)) {
                    $pdf = PDF::loadView($viewName, ['report' => $report], [], [
                        'default_font' => 'arialarabic',
                    ]);

                    $fileName = ($report->orphan->name ?? 'report') . '_' . $report->id . '.pdf';

                    $tempPath = storage_path("app/temp_report_{$report->id}.pdf");
                    File::put($tempPath, $pdf->output());

                    // 📂 إضافة داخل مجلد وهمي
                    $zip->addFile($tempPath, "reports/" . $fileName);
                }
            }
            $zip->close();
        }

        // حذف الملفات المؤقتة
        foreach ($reports as $report) {
            $tempPath = storage_path("app/temp_report_{$report->id}.pdf");
            if (File::exists($tempPath)) {
                File::delete($tempPath);
            }
        }

        return response()->download($zipPath, $zipFileName)->deleteFileAfterSend(true);
    }


}
