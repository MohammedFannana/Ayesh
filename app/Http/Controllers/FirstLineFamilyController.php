<?php

namespace App\Http\Controllers;

use App\Models\FirstLineFamily;
use App\Models\FirstLineFamilyProfile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class FirstLineFamilyController extends Controller
{
    public function index(Request $request){

        $families = FirstLineFamily::
        when($request->search, function ($builder, $value) {  //search input
            $builder->where('name', 'LIKE', "%{$value}%");
        })
        // إضافة الفلاتر بناءً على الـ checkboxes
        ->when($request->filter, function ($builder, $filters) { //filter input
            if (in_array('مطلقة', $filters)) {
                // $builder->whereHas('marketing.supporter', function ($query) {
                    $builder->where('parents_status', 'مطلقة');
                // });
            }
            elseif (in_array('أرملة', $filters)) {
                // $builder->whereHas('marketing.supporter', function ($query) {
                    $builder->where('parents_status', 'أرملة');
                // });
            }
            elseif (in_array('سجين', $filters)) {
                // $builder->whereHas('marketing.supporter', function ($query) {
                    $builder->where('parents_status', 'سجين');
                // });
            }
            elseif (in_array('مريض', $filters)) {
                // $builder->whereHas('marketing.supporter', function ($query) {
                    $builder->where('parents_status', 'مريض');
                // });
            }
            elseif (in_array('فقير', $filters)) {
                // $builder->whereHas('marketing.supporter', function ($query) {
                    $builder->where('parents_status', 'فقير');
                // });
            }
        })
        ->with('first_line_familie_profile')
        ->get();
        $count = FirstLineFamily::count();

        return view('pages.families.index' , compact('families' , 'count'));


    }

    public function create(){
        return view('pages.families.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'families_number' => ['required' , 'string'],
            'authority_number' => ['required' , 'string'],
            'authority_name' => ['required' , 'string'],
            'country' => ['required' , 'string'],
            'city' => ['required' , 'string'],
            'parents_status' => ['required' , 'string' , 'in:مطلقة,أرملة,سجين,مريض,فقير'],
            'name' => ['required' , 'string'],
            'nationality' => ['required' , 'string'],
            'birth_date' => ['required' , 'date'],
            'marital_status' => ['required' , 'string'],
            'family_number' => ['required' , 'integer' ,'min:0'],
            'family_male_number' => ['required' , 'integer' ,'min:0'],
            'family_female_number' => ['required' , 'integer' ,'min:0'],
            'income' => ['required' , 'string'],
            'income_source' => ['required' , 'string'],
            'subsidies' => ['required' , 'string'],
            'financial_status' => ['required' , 'string' , 'in:فقير,غني'],
            'birth' => ['required' , 'string'],
            // 'first_line_family_id' => ['required' , 'exist:first_line_families,id'],
            'family_city' => ['required' , 'string'],
            'family_directorate' => ['required' , 'string'],
            'family_village' => ['required' , 'string'],
            'family_neighborhood' => ['required' , 'string'],
            'landmark' => ['required' , 'string'],
            'housing_status' => ['required' , 'string' ,'in:ملك,ايجار,مشترك'],
            'search_status' => ['required' , 'string'],
            'researcher_name' => ['required' , 'string'],
            'signature' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', 'max:1048576'],
            'phone' => ['required' , 'string'],
            'supporting_documents' =>['required','file' ,'mimes:png,jpg,jpeg,pdf','max:1048576'],
            'authority_official' => ['required' , 'string'],
            'authority_official_signature' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', 'max:1048576'],
            'birth_certificate' =>['required','file' ,'mimes:png,jpg,jpeg,pdf','max:1048576'],
            'death_certificate' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', 'max:1048576'],
            'date' => ['required' , 'date'],
            'sponsor_number' => ['required' , 'string'],

        ]);

        // dd($validated);

        DB::beginTransaction();

        try {

            $validatedData = Arr::only($validated , ['families_number' , 'authority_number' , 'authority_name' , 'country' , 'city',
                'parents_status' , 'name' , 'nationality' ,'birth_date' , 'marital_status' ,'family_number','family_male_number','family_female_number',
                'income','income_source','subsidies','financial_status','birth'
            ]);
            // dd($validatedData );


            $family = FirstLineFamily::create($validatedData);
            // dd($family);



            $profileData = Arr::only($validated , ['family_city' , 'family_directorate' , 'family_village' , 'family_neighborhood',
                'landmark' , 'housing_status' , 'search_status' ,'researcher_name' , 'signature' ,'phone' ,'supporting_documents' , 'authority_official',
                'authority_official_signature' , 'birth_certificate' , 'death_certificate', 'date' , 'sponsor_number'
            ]);

            if ($request->hasFile('signature')) {    //to check if file file is exit
                $file = $request->file('signature');
                $fileName = $request->input('researcher_name') . '_توقيع' . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('families/' . $request->input('name'), $fileName, 'public');
                $profileData['signature'] = $path;
            }

            if ($request->hasFile('supporting_documents')) {    //to check if file file is exit
                $file = $request->file('supporting_documents');
                $fileName =  'المستندات_الثيوتية' . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('families/' . $request->input('name'), $fileName, 'public');
                $profileData['supporting_documents'] = $path;
            }

            if ($request->hasFile('authority_official_signature')) {    //to check if file file is exit
                $file = $request->file('authority_official_signature');
                $fileName = $request->input('authority_official') . '_توقيع_الهيئة'  . '.' .$file->getClientOriginalExtension();
                $path = $file->storeAs('families/' . $request->input('name'), $fileName, 'public');
                $profileData['authority_official_signature'] = $path;
            }

            if ($request->hasFile('birth_certificate')) {    //to check if file file is exit
                $file = $request->file('birth_certificate');
                $fileName =  'شهادة_ميلاد'  . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('families/' . $request->input('name'), $fileName, 'public');
                $profileData['birth_certificate'] = $path;
            }

            if ($request->hasFile('death_certificate')) {    //to check if file file is exit
                $file = $request->file('death_certificate');
                $fileName =  'شهادة_وفاة'  . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('families/' . $request->input('name'), $fileName, 'public');
                $profileData['death_certificate'] = $path;
            }

            // dd($profileData);

            $family->first_line_familie_profile()->create($profileData);

            DB::commit();
            return redirect()->route('family.index')->with('success', __('تمت اضافة العائلة بنجاح'));


        }catch(Exception $e){
            DB::rollBack();
            // return redirect()->back()->with('danger', 'فشل في تسجيل العائلة: ' . $e->getMessage());

            return redirect()->back()->with('danger', __(' فشل في تسجيل العائلة. يرجى المحاولة مرة أخرى. '))->withInput(); 
        }




    }

    public function show(String $id){
        $family = FirstLineFamily::where('id' , $id)
        ->with('first_line_familie_profile')
        ->firstOrFail();


        return view('pages.families.view' , compact('family'));

    }

    public function destroy(String $id){



        $family = FirstLineFamily::findOrFail($id);
        $family->load('first_line_familie_profile');

        DB::beginTransaction();

        try {

            if ($family->first_line_familie_profile->signature) {
                Storage::disk('public')->delete($family->first_line_familie_profile->signature);
            }

            if ($family->first_line_familie_profile->supporting_documents) {
                Storage::disk('public')->delete($family->first_line_familie_profile->supporting_documents);
            }

            if ($family->first_line_familie_profile->authority_official_signature) {
                Storage::disk('public')->delete($family->first_line_familie_profile->authority_official_signature);
            }

            if ($family->first_line_familie_profile->birth_certificate) {
                Storage::disk('public')->delete($family->first_line_familie_profile->birth_certificate);
            }

            if ($family->first_line_familie_profile->death_certificate) {
                Storage::disk('public')->delete($family->first_line_familie_profile->death_certificate);
            }


            $family->delete();



            DB::commit();
            return redirect()->route('family.index')->with('success', __('تمت حذف العائلة بنجاح'));


        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('danger', __(' فشل في حذف العائلة. يرجى المحاولة مرة أخرى. '));
        }

    }
}
