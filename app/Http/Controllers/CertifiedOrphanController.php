<?php

namespace App\Http\Controllers;

use App\Models\CertifiedOrphanExtra;
use App\Models\Donor;
use App\Models\Marketing;
use App\Models\Orphan;
use App\Models\Supporter;
use App\Models\Volunteer;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertifiedOrphanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request){

        $orphans = Orphan::where('status', 'approved')
            ->when($request->search, function ($builder, $value) {
                $builder->where('name', 'LIKE', "%{$value}%");
            })
            // إضافة الفلاتر بناءً على الـ checkboxes
            ->when($request->filter, function ($builder, $filters) {
                if (in_array('يتيم الأبوين', $filters)) {
                    $builder->where('case_type', 'يتيم الأبوين');
                }
                elseif (in_array('مريض مزمن', $filters)) {
                    $builder->where('case_type', 'مريض مزمن');
                }
                elseif (in_array('الحالات الخاصة', $filters)) {
                    $builder->where('case_type', 'الحالات الخاصة');
                }
                elseif (in_array('قريب السن', $filters)) {
                    $builder->where('case_type' , 'قريب السن');
                }
            })
            ->select('id', 'internal_code', 'name', 'case_type', 'age')
            ->paginate(8);

            $count = $orphans->total();

            // get the doner
            $supporters = Supporter::all('id' , 'name');


            return view('pages.orphans.certified-orphans.index' , compact('orphans' , 'count' ,'supporters'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $orphan_id = $request->orphan_id;

        $supporter = Supporter::pluck('name', 'id')->toArray();
        $volunteers = Volunteer::pluck('name', 'id')->toArray();
        return view('pages.orphans.certified-orphans.edit' , compact('supporter' , 'volunteers' , 'orphan_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'orphan_id' => ['required' , 'exists:orphans,id'],
            'country' => ['required' , 'string'],
            'city' => ['required' , 'string'],
            'description_orphan_condition' => ['required' , 'string'],
            'volunteer_id' => ['required' , 'exists:volunteers,id' ],
            'supporter_id' => ['required' , 'exists:supporters,id'],

            'father_card' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],

            'school_enrollment' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],

            'health_insurance' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],
        ]);

        // get the name of orphan to store image in special folder
        $orphan_name = Orphan::where('id' , $validated['orphan_id'])->value('name');


        $imageFields = ['father_card', 'school_enrollment', 'health_insurance']; // حدد الحقول التي تحتوي على صور
        $imageData = []; // مصفوفة لتخزين المسارات


        // تعريف counter ليبدأ من 9
        $counter = 9;

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);

                // تخصيص اسم الملف بناءً على counter
                $fileName = $counter . '.' . $file->getClientOriginalExtension();

                // تخزين الصورة في المجلد العام
                // $path = $file->storeAs('public/images', $fileName);
                $path = $file->storeAs($orphan_name, $fileName, 'public');


                // حفظ المسار في المصفوفة مع مفتاح الحقل
                $imageData[$field] = $path;

                // زيادة counter ليبدأ من 9 ثم يزيد إلى 10، 11، وهكذا
                $counter++;
            }
        }

        // دمج المسارات مع باقي البيانات
        $validated = array_merge($validated, $imageData);

        // تخزين البيانات في الجدول
        CertifiedOrphanExtra::create($validated);

        return redirect()->route('orphan.certified.details')->with('success' , 'تم اكمال ادخال البيانات بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orphan = Orphan::where('id', $id)
                ->where('status', 'approved') // إضافة شرط status بعد id
                // ->with(['profile', 'guardian', 'family', 'image', 'phones' ,
                // ])
                ->with(['profile' => function ($query) {  // to get phone from profile table
                    $query->select('id', 'phone', 'orphan_id');
                } , 'image'])
                ->firstOrFail(); // إذا لم يكن موجودًا سيرمي استثناء


        return view('pages.orphans.certified-orphans.view', compact('orphan'));
    }

    public function details(string $id){

        $orphan = Orphan::where('id', $id)
        ->where('status', 'approved') // إضافة شرط status بعد id
        ->select('id', 'internal_code', 'name', 'case_type', 'age' , 'application_form')
        ->with(['profile' => function ($query) {  // to get phone from profile table
            $query->select('id', 'phone', 'orphan_id');
        } , 'image' , 'certified_orphan_extras'])
        ->firstOrFail(); // إذا لم يكن موجودًا سيرمي استثناء


        return view('pages.orphans.certified-orphans.details', compact('orphan'));

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
                ->where('status', 'approved') // إضافة شرط status بعد id
                ->firstOrFail(); // إذا لم يكن موجودًا سيرمي استثناء

        $orphan->delete();
        return redirect()->route('orphan.certified.index')->with('success' , __(' تم حذف اليتيم بنجاح '));
    }

    // to convert the orphan status from approved to marketing
    public function convertToMarketing(Request $request){

        $request->merge([
            'marketing_date' => now()->toDateString(),
            'status' => 'marketing'
        ]);

        $validated = $request->validate([
            'orphan_ids' => ['required' , 'array'],
            'orphan_ids.*' => ['integer','exists:orphans,id'],
            'supporter_id' => ['required' , 'exists:supporter,id'],
            'marketing_date' => ['date'],
            'status' => ['required' , 'in:marketing,waiting'],
        ]);



        DB::beginTransaction();

        try {

            // جلب الأيتام الذين حالتهم approved
            $orphans = Orphan::whereIn('id', $validated['orphan_ids'])
            ->where('status', 'approved')
            ->get(['id' , 'status']);

            // dd($orphans);

            // التحقق إذا كان هناك أيتام غير معتمدين
            if ($orphans->count() !== count($validated['orphan_ids'])) {
                return redirect()->route('orphan.certified.index')->with('danger', __('بعض الأيتام المحددين ليسوا في حالة الاعتماد.'));
            }

            foreach ($orphans as $orphan) {

                $orphan->update([
                    'status' => 'marketing_provider',
                ]);

                Marketing::create([
                    'orphan_id' => $orphan->id,
                    'supporter_id' => $validated['supporter_id'],
                    'marketing_date' => $validated['marketing_date'], // تاريخ بدون وقت
                    'status' => $validated['status'],
                ]);
            }



            DB::commit();
            return redirect()->route('orphan.certified.index')->with('success', __('تمت تحويل اليتيم الى الحالات المقدمة للتسويق بنجاح'));

        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('orphan.certified.index')->with('danger', __(' فشل تحويل اليتيم الى الحالات المقدمة للتسويق. يرجى المحاولة مرة أخرى. '));
        }

    }
}
