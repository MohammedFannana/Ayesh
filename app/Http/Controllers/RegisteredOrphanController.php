<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
            $query->select('id', 'phone', 'orphan_id');
        }])
        ->paginate(8);

        $count = $orphans->total(); // هذا يعطي العدد الكلي للايتام المسجلين
        return view('pages.orphans.new-orphans.index' , compact('orphans' , 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.orphans.new-orphans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // store the basic orphan information in 5 table
        // orphan , images , phones , guardians , profiles

        $request->merge([
            'status' => 'registered'
        ]);


        $validated = $request->validate([
            // orphans table
            'status' => ['required','string' ,'in:registered,under_review,rejected,pending_approval
                                                ,approved,marketing_provider,waiting,sponsored,archived'],
            'internal_code' => ['required','string','unique:orphans'],
            'application_form' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],
            'name' => ['required','string'],
            'national_id' => ['required','string','unique:orphans'],
            'birth_date' => ['required','date'],
            'birth_place' => ['required','string'],
            'gender' => ['required','string','in:ذكر,أنثى'],
            'age' => ['required','integer','min:1'],
            'case_type' => ['required','string','in:يتيم الأبوين,مريض مزمن,حالات خاصة,قريب السن'],
            'health_status' => ['required','string'],

            // guardians tabel
            'guardian_name' => ['required','string'],
            'guardian_national_id' => ['required','string'],
            'guardian_relationship' => ['required','string'],
            'guardianship_reason'=> ['nullable','string'],
            'internal_research'=> ['required','string'],
            'research_date' => ['required','date'],
            'notes'=> ['required','string'],

            // familes table
            'family_number' => ['required','integer','min:0'],
            'male_number' => ['required','integer','min:0'],
            'female_number' => ['required','integer','min:0'],
            'income' => ['required' , 'string'],
            'income_source' => ['required' , 'string'],
            'address' => ['required' , 'string'],
            'housing_type' => ['required','string','in:ملك,ايجار,مشترك'],
            'housing_case' => ['required','string','in:جيد,متوسط,سيء'],

            // phones table
            'phone_number' => ['required', 'array'], // يجب أن يكون array وليس string
            'phone_number.*' => ['required', 'string'],

            // profiles table
            'father_death_date' => ['nullable','date'],
            'mother_death_date' => ['nullable','date'],
            'parents_orphan' => ['required' , 'string' , 'in:نعم,لا'],
            'mother_name' => ['required' , 'string'],
            'mother_national_id' => ['required','string'],
            'mother_work' => ['required','string','in:نعم,لا'],
            'mother_status' => ['required','string','in:يتيم الأبوين,مريض مزمن,حالات خاصة,قريب السن'],
            'academic_stage' => ['required','string','in:الابتدائية,الاعدادية'],
            'class' => ['required','string'],
            'phone' => ['required','string'],
            'full_address' => ['required','string'],
            'governorate' => ['required','string'],
            'center' => ['required','string'],
            'recipient_name' => ['required','string'],
            'registrar_name' => ['required','string'],
            'registrar_date' => ['required','date'],
            'knowledge' => ['required','string'],

            // images table

            'birth_certificate' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],

            'father_death_certificate' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],

            'mother_death_certificate' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],

            'mother_card' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],

            'orphan_image_4_6' =>['required','image' ,'mimes:png,jpg,jpeg'], // يسمح فقط بملفات PNG و JPG/JPEG
                                    //'dimensions:min_width=400,max_width=1200,min_height=900,max_height=1800','max:1048576',],

            'orphan_image_9_12' =>['required','image' ,'mimes:png,jpg,jpeg'], // يسمح فقط بملفات PNG و JPG/JPEG
                                   // 'dimensions:min_width=1350,max_width=2700,min_height=1800,max_height=3600','max:1048576',],

            'school_benefit' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],

            'medical_report' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],

            'social_research' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],

            'guardianship_decision' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],
        ]);


        DB::beginTransaction();

        try {

            // start store in orphans table
            $validatedData = Arr::only($validated , ['status' , 'internal_code' , 'application_form' , 'name' , 'national_id',
                                                        'birth_date' , 'birth_place' , 'gender' ,'age' , 'case_type' ,'health_status'
                                                    ]);

            if ($request->hasFile('application_form')) {    //to check if image file is exit
                $file = $request->file('application_form');
                $fileName = $request->input('name') . 'استمارة' . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs($request->input('internal_code'), $fileName, 'public');
                $validatedData['application_form'] = $path;
            }

            $orphan = Orphan::create($validatedData);


            // store in profiles table
            $profileData = Arr::only($validated ,[
                'father_death_date' ,'mother_death_date' , 'parents_orphan' , 'mother_name' , 'mother_national_id' , 'mother_work' , 'mother_status' ,
                'academic_stage' , 'class' , 'phone' ,'full_address' ,'governorate' ,'center' , 'recipient_name' ,'registrar_name' ,'registrar_date' ,'knowledge'
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
                'family_number', 'male_number', 'female_number', 'income', 'income_source', 'address',
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
            $imageData = Arr::only($validated ,[
                'birth_certificate' , 'father_death_certificate' , 'mother_death_certificate' , 'mother_card' ,
                'orphan_image_4_6' , 'orphan_image_9_12' , 'school_benefit' , 'medical_report' , 'social_research' , 'guardianship_decision'
            ]);

            // to rename image as 1.png , 2.jpg
            $counter = 1;

            foreach ($imageData as $key => $image) {
                if ($request->hasFile($key)) { //to check if image file is exit
                    $file = $request->file($key);
                    // تحديد اسم الصورة
                    $fileName = $counter . '.' . $file->getClientOriginalExtension();
                    // تخزين الصورة في المجلد المحدد
                    $path = $file->storeAs($request->input('internal_code'), $fileName, 'public');
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
            return redirect()->back()->with('danger', __(' فشل في تسجيل اليتيم. يرجى المحاولة مرة أخرى. '));

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orphan = Orphan::findOrFail($id)->with('image')->first();
        return view('pages.orphans.new-orphans.view' ,compact('orphan'));
    }

    public function details(string $id){
        $orphan = Orphan::findOrFail($id)
                    ->with(['profile' , 'guardian' , 'family' ,'image' , 'phones'])->first();
        return view('pages.orphans.new-orphans.orphan_details' ,compact('orphan'));
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
        $orphan = Orphan::findOrFail($id);
        $orphan->delete();
        return redirect()->route('orphan.registered.index')->with('success' , __(' تم حذف اليتيم بنجاح '));
    }
}
