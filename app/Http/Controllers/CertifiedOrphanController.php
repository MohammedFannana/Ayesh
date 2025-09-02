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
use Illuminate\Support\Facades\Gate;

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
                elseif (in_array('يتيم', $filters)) {
                    $builder->where('case_type', 'يتيم');
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

        $supporters = Supporter::pluck('name', 'id')->toArray();
        // $volunteers = Volunteer::pluck('name', 'id')->toArray();
        return view('pages.orphans.certified-orphans.edit' , compact('supporters' , 'orphan_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'country' => 'مصر',
            'city' => 'الكردي',
        ]);

        $validated = $request->validate([
            'orphan_id' => ['required' , 'exists:orphans,id'],
            'country' => ['required' , 'string' , 'in:مصر'],
            'city' => ['required' , 'string'],
            // 'description_orphan_condition' => ['required' , 'string'],
            // 'volunteer_id' => ['required' , 'exists:volunteers,id' ],
            'supporter_id' => ['required' , 'exists:supporters,id'],

            // 'father_card' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
            //                         ],

            // 'school_enrollment' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
            //                         ],

            // 'health_insurance' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
            //                         ],

            'signature' =>['nullable','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                                    ],

            'supervisory_accreditation' =>['nullable','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                                    ],
        ]);

        // get the name of orphan to store file in special folder
        $orphan_name = Orphan::where('id' , $validated['orphan_id'])->value('name');


        $imageFields = ['signature' ,'supervisory_accreditation']; // حدد الحقول التي تحتوي على صور
        $imageData = []; // مصفوفة لتخزين المسارات

        // تعريف counter ليبدأ من 14
        $counter = 14;

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);

                // تخصيص اسم الملف بناءً على counter
                $fileName = $counter . '.' . $file->getClientOriginalExtension();

                // تخزين الصورة في المجلد العام
                // $path = $file->storeAs('public/images', $fileName);
                $path = $file->storeAs('orphans/' . $orphan_name, $fileName, 'public');

                // حفظ المسار في المصفوفة مع مفتاح الحقل
                $imageData[$field] = $path;
                $counter++;
            }
        }

        // دمج المسارات مع باقي البيانات
        $validated = array_merge($validated, $imageData);

        // تخزين البيانات في الجدول
        CertifiedOrphanExtra::create($validated);

        return redirect()->route('orphan.certified.details' , $request->orphan_id)->with('success' , 'تم اكمال ادخال البيانات بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orphan = Orphan::where('id', $id)
                ->where('status', 'approved') // إضافة شرط status بعد id
                // ->with(['profile', 'guardian', 'family', 'file', 'phones' ,
                // ])
                ->with(['profile' , 'image' , 'phones'])
                ->firstOrFail(); // إذا لم يكن موجودًا سيرمي استثناء


        return view('pages.orphans.certified-orphans.view', compact('orphan'));
    }

    public function details(string $id){

        $orphan = Orphan::where('id', $id)
        ->where('status', 'approved') // إضافة شرط status بعد id
        ->with(['profile', 'image' , 'certified_orphan_extras' ,'phones'])
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
            'supporter_id' => ['required' , 'exists:supporters,id'],
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

                if (! Gate::allows('has-certified-extra', $orphan)) {
                    // dd('x');
                    return redirect()->route('orphan.certified.index')->with('danger', 'لا يمكن تسويق يتيم بدون بيانات اضافية معتمدة.');
                }

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
