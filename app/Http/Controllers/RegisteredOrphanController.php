<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Orphan;
use App\Models\Governorate;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class RegisteredOrphanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orphans = Orphan::where('status' , 'registered')
        ->when($request->search, function ($builder, $value) { //from search input
            $builder->where('name', 'LIKE', "%{$value}%");
        })->select('id', 'internal_code', 'name' ,'case_type') //to return Special fields
        ->with(['profile' => function ($query) {  // to get phone from profile table
            $query->select('id', 'orphan_id');
        }])
        ->with('phones')
        ->paginate(8);

        $count = $orphans->total(); // هذا يعطي العدد الكلي للايتام المسجلين
        return view('pages.orphans.new-orphans.index' , compact('orphans' , 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orphan = new Orphan();
        $governorates = Governorate::with('cities')->get();

        return view('pages.orphans.new-orphans.create',compact(['orphan' , 'governorates']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $governorate = Governorate::find($request->governorate)?->name;
        $age = Carbon::parse($request->birth_date)->age;
    
        $request->merge([
            'status' => 'registered',
            'age' => $age,
            'governorate' => $governorate,
        ]);

        


        $validated = $request->validate([
            // orphans table
            'status' => ['required','string' ,'in:registered,under_review,rejected,pending_approval
                                                ,approved,marketing_provider,waiting,sponsored,archived'],
            'internal_code' => ['required','string','unique:orphans'],
            'application_form' =>['required','file' ,'mimes:png,jpg,jpeg,pdf'],
            'name' => ['required','string'],
            'national_id' => ['required','string','unique:orphans','size:14','regex:/^\d{14}$/'],
            'birth_date' => ['required','date'],
            'birth_place' => ['required','string'],
            'gender' => ['required','string','in:ذكر,أنثى'],
            'age' => ['nullable','integer','min:0'],
            'case_type' => ['required','string','in:يتيم الأبوين,يتيم'],
            'health_status' => ['required','string','in:مريض,جيدة,معاق'],
            'disease_description' => ['nullable','string','required_if:health_status,مريض'],
            'disability_type' => ['nullable','string','required_if:health_status,معاق'],
            'bank_name' => ['nullable','string'],
            'visa_number' => ['nullable','numeric'],



            // // guardians tabel
            'guardian_name' => ['required','string'],
            'guardian_national_id' => ['required','string','regex:/^\d{14}$/','size:14'],
            'guardian_relationship' => ['required','string'],
            'guardianship_reason'=> ['nullable','string'],
            'internal_research'=> ['required','string'],
            'research_date' => ['required','date'],
            'notes'=> ['required','string'],

            // // familes table
            'family_number' => ['required','integer','min:0'],
            'male_number' => ['required','integer','min:0'],
            'female_number' => ['required','integer','min:0'],
            'income' => ['required' , 'string'],
            'income_source' => ['required' , 'string'],
            'housing_type' => ['required','string','in:ملك,ايجار,مشترك'],
            'housing_case' => ['required','string','in:جيد,متوسط,سيء'],

            // // phones table
            'phone_number' => ['required', 'array'], // يجب أن يكون array وليس string
            'phone_number.*' => ['required', 'string'],

            // // profiles table
            'father_death_date' => ['nullable','date'],
            'mother_death_date' => ['nullable','date'],
            'mother_name' => ['required' , 'string'],
            'mother_national_id' => ['required','string','regex:/^\d{14}$/','size:14'],
            'mother_work' => ['nullable','string','in:نعم,لا'],
            'mother_status' => ['nullable','string','in:متزوجة,أرملة'],


            'academic_stage' => ['required','string','in:تحت السن,أزهري,عام,غير مقيد(خارج التعليم)'],
            'academic_stage_details' =>['nullable', 'string' ,'in:روضة,ابتدائي,إعدادي,ثانوي' ,
                Rule::requiredIf(function () {
                    return in_array(request('academic_stage'), ['عام', 'أزهري']);
                }),],
            'academic_secondary_details' =>['nullable', 'string' , 'in:ثانوي عام,تجاري,صناعي,زراعي,تمريض' , 'required_if:academic_stage_details,ثانوي'],
            'reason_not_registering' =>['nullable', 'string' , 'in:أخرى,معاق,مريض' , 'required_if:academic_stage,غير مقيد(خارج التعليم)'],
            'other_reason_not_registering' =>['nullable', 'string' , 'required_if:reason_not_registering,أخرى'],
            'class' => ['nullable','string','in:الأول,الثاني,الثالث,الرابع,الخامس,السادس'],
            'governorate' => ['required','string'],
            'center' => ['required','string'],
            'full_address' => ['required','string'],
            'registrar_name' => ['required','string'],
            'registrar_date' => ['required','date'],



            // // images table

            'birth_certificate' =>['required','file' ,'mimes:png,jpg,jpeg,pdf'],

            'father_death_certificate' =>['required','file' ,'mimes:png,jpg,jpeg,pdf'],

            'mother_death_certificate' =>['nullable','file' ,'mimes:png,jpg,jpeg,pdf'],

            'mother_card' =>['required','file' ,'mimes:png,jpg,jpeg,pdf'],

            'orphan_image_4_6' =>['required','file' ,'mimes:png,jpg,jpeg,pdf'],

            'orphan_image_9_12' =>['required','file' ,'mimes:png,jpg,jpeg,pdf'],

            'school_benefit' =>['required','file' ,'mimes:png,jpg,jpeg,pdf'],

            'medical_report' =>['nullable','file' ,'mimes:png,jpg,jpeg,pdf'],

            'social_research' =>['required','file' ,'mimes:png,jpg,jpeg,pdf'],

            'guardianship_decision' =>['nullable','file' ,'mimes:png,jpg,jpeg,pdf'],

            'data_validation' =>['nullable','file' ,'mimes:png,jpg,jpeg,pdf'],

            'agricultural_holding' =>['nullable','file' ,'mimes:png,jpg,jpeg,pdf'],

            'visa_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);



        DB::beginTransaction();

        try {

            // start store in orphans table
            $validatedData = Arr::only($validated , ['status' , 'internal_code' , 'application_form' , 'name' , 'national_id',
                                                        'birth_date' , 'birth_place' , 'gender' ,'age' , 'case_type' ,'health_status'
                                                        ,'disease_description','disability_type','bank_name' ,'visa_number'
                                                    ]);
                                                    
                            

            if ($request->hasFile('application_form')) {    //to check if image file is exit
                $file = $request->file('application_form');
                $fileName = $request->input('name') . '_استمارة' . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('orphans/' . $request->input('name'), $fileName, 'public');
                $validatedData['application_form'] = $path;
            }

            $orphan = Orphan::create($validatedData);


            // store in profiles table
            $profileData = Arr::only($validated ,[
               
                'father_death_date' ,'mother_death_date'  , 'mother_name' , 'mother_national_id' , 'mother_work' , 'mother_status' ,
                'academic_stage' , 'academic_stage_details' , 'academic_secondary_details' , 'reason_not_registering',
                'other_reason_not_registering','class' ,'full_address'  ,'registrar_name' ,'registrar_date','governorate' ,'center'
            ]);

            $orphan->profile()->create($profileData);


            //  store in guardians table
            $guardianData =  Arr::only($validated ,[
                'guardian_name' ,'guardian_national_id' , 'guardian_relationship',
                'guardianship_reason' , 'internal_research', 'research_date','notes'

            ]);

            $orphan->guardian()->create($guardianData);


            //store in familes table
            $familyData = Arr::only($validated ,[
                // 'address',
                'family_number', 'male_number', 'female_number', 'income', 'income_source',
                'housing_type', 'housing_case'
            ]);
            $orphan->family()->create($familyData);


            // store in phones table
            if ($request->has('phone_number')) {
                $phoneData = Arr::only($validated ,[ 'phone_number' ]);
                foreach ($request->phone_number as $phone) {
                    $orphan->phones()->create(['phone_number' => $phone]);
                }
            }

            // store in images table
            // $imageData = Arr::only($validated ,[
            //     'birth_certificate' , 'father_death_certificate' , 'mother_death_certificate' , 'mother_card' , 'data_validation','agricultural_holding',
            //     'orphan_image_4_6' , 'orphan_image_9_12' , 'school_benefit' , 'medical_report' , 'social_research' , 'guardianship_decision'
            // ]);

            $imageData = Arr::only($validated ,[
                'orphan_image_4_6' , 'birth_certificate' , 'father_death_certificate' , 'mother_card' ,
                'school_benefit' , 'social_research' , 'medical_report' , 'mother_death_certificate' ,
                'data_validation' , 'orphan_image_9_12','guardianship_decision' ,'agricultural_holding','visa_file'
            ]);


            // to rename image as 1.png , 2.jpg
            $counter = 1;

            foreach ($imageData as $key => $image) {
                if ($request->hasFile($key)) { //to check if image file is exit
                    $file = $request->file($key);
                    // تحديد اسم الصورة
                    $fileName = $counter . '.' . $file->getClientOriginalExtension();
                    // تخزين الصورة في المجلد المحدد
                    $path = $file->storeAs('orphans/' . $request->input('name'), $fileName, 'public');
                    // إضافة المسار إلى البيانات المعتمدة
                    $imageData[$key] = $path;

                    $counter++;
                }
            }


            $orphan->image()->create($imageData);


            DB::commit();
            return redirect()->back()->with('success', __('تمت اضافة اليتيم بنجاح'));


        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('danger', __(' فشل في تسجيل اليتيم. يرجى المحاولة مرة أخرى. '))->withInput();

        }

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orphan = Orphan::with('image')->findOrFail($id);
        // dd($orphan);
        return view('pages.orphans.new-orphans.view' ,compact('orphan'));
    }

    public function details(string $id){
        $orphan = Orphan::with(['profile', 'guardian', 'family', 'image', 'phones'])
                    ->findOrFail($id);
        return view('pages.orphans.new-orphans.orphan_details', compact('orphan'));
    }


    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
    {
        $orphan = Orphan::with(['profile', 'phones', 'image', 'guardian', 'family'])->findOrFail($id);
        $governorates = Governorate::with('cities')->get();

        return view('pages.orphans.new-orphans.edit', compact(['orphan' , 'governorates']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $orphan = Orphan::findOrFail($id);

        $age = Carbon::parse($request->birth_date)->age;
        $request->merge(['age' => $age]);

        $validated = $request->validate([
            // orphans table
            // 'status' => ['sometimes','string','in:registered,under_review,rejected,pending_approval,approved,marketing_provider,waiting,sponsored,archived'],
            'internal_code' => ['sometimes','string','unique:orphans,internal_code,'.$id],
            'application_form' =>['sometimes','file','mimes:png,jpg,jpeg,pdf'],
            'name' => ['sometimes','string'],
            'national_id' => ['sometimes','string','size:14','regex:/^\d{14}$/','unique:orphans,national_id,'.$id],
            'birth_date' => ['sometimes','date'],
            'birth_place' => ['sometimes','string'],
            'gender' => ['sometimes','string','in:ذكر,أنثى'],
            'age' => ['nullable','integer','min:0'],
            'case_type' => ['sometimes','string','in:يتيم الأبوين,يتيم'],
            'health_status' => ['sometimes','string','in:مريض,جيدة,معاق'],
            'disease_description' => ['nullable','string','required_if:health_status,مريض'],
            'disability_type' => ['nullable','string','required_if:health_status,معاق'],
            'bank_name' => ['nullable','string'],
            'visa_number' => ['nullable','numeric'],

            // guardians table
            'guardian_name' => ['sometimes','string'],
            'guardian_national_id' => ['sometimes','string','regex:/^\d{14}$/','size:14'],
            'guardian_relationship' => ['sometimes','string'],
            'guardianship_reason'=> ['nullable','string'],
            'internal_research'=> ['sometimes','string'],
            'research_date' => ['sometimes','date'],
            'notes'=> ['sometimes','string'],

            // familes table
            'family_number' => ['sometimes','integer','min:0'],
            'male_number' => ['sometimes','integer','min:0'],
            'female_number' => ['sometimes','integer','min:0'],
            'income' => ['sometimes','string'],
            'income_source' => ['sometimes','string'],
            'housing_type' => ['sometimes','string','in:ملك,ايجار,مشترك'],
            'housing_case' => ['sometimes','string','in:جيد,متوسط,سيء'],

            // phones table
            'phone_number' => ['sometimes', 'array'],
            'phone_number.*' => ['sometimes', 'string'],

            // profiles table
            'father_death_date' => ['nullable','date'],
            'mother_death_date' => ['nullable','date'],
            'mother_name' => ['sometimes','string'],
            'mother_national_id' => ['sometimes','string','regex:/^\d{14}$/','size:14'],
            'mother_work' => ['nullable','string','in:نعم,لا'],
            'mother_status' => ['nullable','string','in:متزوجة,أرملة'],
            'academic_stage' => ['sometimes','string','in:تحت السن,أزهري,عام,غير مقيد(خارج التعليم)'],
            'academic_stage_details' =>['nullable', 'string','in:روضة,ابتدائي,إعدادي,ثانوي'],
            'academic_secondary_details' =>['nullable', 'string','in:ثانوي عام,تجاري,صناعي,زراعي,تمريض'],
            'reason_not_registering' =>['nullable', 'string','in:أخرى,معاق,مريض'],
            'other_reason_not_registering' =>['nullable', 'string'],
            'class' => ['nullable','string','in:الأول,الثاني,الثالث,الرابع,الخامس,السادس'],
            'governorate' => ['sometimes','string'],
            'center' => ['sometimes','string'],
            'full_address' => ['sometimes','string'],
            'registrar_name' => ['sometimes','string'],
            'registrar_date' => ['sometimes','date'],

            // images table
            'birth_certificate' =>['sometimes','file','mimes:png,jpg,jpeg,pdf'],
            'father_death_certificate' =>['sometimes','file','mimes:png,jpg,jpeg,pdf'],
            'mother_death_certificate' =>['nullable','file','mimes:png,jpg,jpeg,pdf'],
            'mother_card' =>['sometimes','file','mimes:png,jpg,jpeg,pdf'],
            'orphan_image_4_6' =>['sometimes','file','mimes:png,jpg,jpeg,pdf'],
            'orphan_image_9_12' =>['sometimes','file','mimes:png,jpg,jpeg,pdf'],
            'school_benefit' =>['sometimes','file','mimes:png,jpg,jpeg,pdf'],
            'medical_report' =>['nullable','file','mimes:png,jpg,jpeg,pdf'],
            'social_research' =>['sometimes','file','mimes:png,jpg,jpeg,pdf'],
            'guardianship_decision' =>['nullable','file','mimes:png,jpg,jpeg,pdf'],
            'data_validation' =>['nullable','file','mimes:png,jpg,jpeg,pdf'],
            'agricultural_holding' =>['nullable','file','mimes:png,jpg,jpeg,pdf'],
            'visa_file' => ['nullable','file','mimes:jpg,jpeg,png,pdf','max:2048'],
        ]);

        DB::beginTransaction();

        try {
            // 1. تحديث بيانات اليتيم الأساسية
            $orphanData = Arr::only($validated, [
                'status', 'internal_code', 'application_form', 'name', 'national_id',
                'birth_date', 'birth_place', 'gender', 'age', 'case_type', 'health_status',
                'disease_description', 'disability_type', 'bank_name', 'visa_number'
            ]);

            if ($request->hasFile('application_form')) {
                $file = $request->file('application_form');
                $fileName = $request->input('name') . '_استمارة' . '.' . $file->getClientOriginalExtension();
                $newPath = $file->storeAs('orphans/' . $request->input('name'), $fileName, 'public');

                // تحديث المسار الجديد أولاً
                $orphanData['application_form'] = $newPath;

                // حذف الملف القديم بعد التأكد من رفع الجديد
                if ($orphan->application_form) {
                    Storage::disk('public')->delete($orphan->application_form);
                }
            }

            $orphan->update($orphanData);

            // 2. تحديث الملفات باستخدام updateOrCreate
            $imageData = Arr::only($validated, [
                'orphan_image_4_6', 'birth_certificate', 'father_death_certificate',
                'mother_card', 'school_benefit', 'social_research', 'medical_report',
                'mother_death_certificate', 'data_validation', 'orphan_image_9_12',
                'guardianship_decision', 'agricultural_holding', 'visa_file'
            ]);

            $counter = 1;
            $oldImages = $orphan->image ? $orphan->image->toArray() : [];
            $newImageData = [];

            foreach ($imageData as $key => $image) {
                if ($request->hasFile($key)) {
                    $file = $request->file($key);
                    $fileName = $counter . '.' . $file->getClientOriginalExtension();
                    $newPath = $file->storeAs('orphans/' . $request->input('name'), $fileName, 'public');
                    $newImageData[$key] = $newPath;
                    $counter++;
                } else {
                    $newImageData[$key] = $oldImages[$key] ?? null;
                }
            }

            // استخدام updateOrCreate للصور
            $orphan->image()->updateOrCreate([], $newImageData);

            // حذف الملفات القديمة بعد التأكد من رفع الجديدة
            foreach ($imageData as $key => $image) {
                if ($request->hasFile($key) && isset($oldImages[$key])) {
                    Storage::disk('public')->delete($oldImages[$key]);
                }
            }

            // 3. تحديث البيانات الأخرى باستخدام updateOrCreate
            $profileData = Arr::only($validated, [
                'father_death_date', 'mother_death_date', 'mother_name', 'mother_national_id',
                'mother_work', 'mother_status', 'academic_stage', 'academic_stage_details',
                'academic_secondary_details', 'reason_not_registering', 'other_reason_not_registering',
                'class', 'full_address', 'registrar_name', 'registrar_date', 'governorate', 'center'
            ]);
            $orphan->profile()->updateOrCreate([], $profileData);

            $guardianData = Arr::only($validated, [
                'guardian_name', 'guardian_national_id', 'guardian_relationship',
                'guardianship_reason', 'internal_research', 'research_date', 'notes'
            ]);
            $orphan->guardian()->updateOrCreate([], $guardianData);

            $familyData = Arr::only($validated, [
                'family_number', 'male_number', 'female_number', 'income',
                'income_source', 'housing_type', 'housing_case'
            ]);
            $orphan->family()->updateOrCreate([], $familyData);

            // 4. تحديث أرقام الهواتف
            if ($request->has('phone_number')) {
                $orphan->phones()->delete();
                foreach ($request->phone_number as $phone) {
                    $orphan->phones()->updateOrCreate(
                        ['phone_number' => $phone],
                        ['phone_number' => $phone]
                    );
                }
            }

            DB::commit();
            return redirect()->back()->with('success', __('تم تحديث بيانات اليتيم بنجاح'));

        } catch(Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('danger', __('فشل في تحديث بيانات اليتيم. يرجى المحاولة مرة أخرى.'))->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orphan = Orphan::with(['image'])->findOrFail($id);
        
        DB::beginTransaction();
        
        try {
            // 1. حذف الملفات من التخزين
            // حذف ملف الاستمارة
            if ($orphan->application_form) {
                Storage::disk('public')->delete($orphan->application_form);
            }
            
            // حذف ملفات الصور
            if ($orphan->image) {
                $imageFields = [
                    'orphan_image_4_6', 'birth_certificate', 'father_death_certificate',
                    'mother_card', 'school_benefit', 'social_research', 'medical_report',
                    'mother_death_certificate', 'data_validation', 'orphan_image_9_12',
                    'guardianship_decision', 'agricultural_holding', 'visa_file'
                ];
                
                foreach ($imageFields as $field) {
                    if ($orphan->image->$field) {
                        Storage::disk('public')->delete($orphan->image->$field);
                    }
                }
            }
            
            // حذف مجلد اليتيم
            $directory = 'orphans/' . $orphan->name;
            if (Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->deleteDirectory($directory);
            }
            
            // 2. حذف اليتيم (سيحذف السجلات المرتبطة تلقائياً)
            $orphan->delete();
            
            DB::commit();
            
            return redirect()->route('orphan.registered.index')
                   ->with('success', __('تم حذف اليتيم وملفاته بنجاح'));
                   
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                   ->with('danger', __('حدث خطأ أثناء حذف اليتيم. يرجى المحاولة مرة أخرى.'));
        }
    }
}
