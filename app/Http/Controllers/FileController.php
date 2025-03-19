<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\File;
use App\Models\Orphan;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
        $orphan_count = Orphan::where('status' , 'sponsored')->count();
        $volunteer_count = Volunteer::count();
        $donor_count = Donor::count();
        return view('pages.files.index' , compact('orphan_count' , 'volunteer_count' , 'donor_count'));
    }


    public function getCategories()
    {
        // استرجاع البيانات من قاعدة البيانات
        $orphans = Orphan::all(['id' , 'name']); // إذا كنت تستخدم موديل Orphan
        // $projects = Project::all(['id' , 'name']); // إذا كنت تستخدم موديل Project
        $donors = Donor::all(['id' , 'name']); // إذا كنت تستخدم موديل Donor
        $volunteers = Volunteer::all(['id' , 'name']); // إذا كنت تستخدم موديل Volunteer

        // إعادة البيانات إلى الجافا سكربت
        return response()->json([
            'orphan' => $orphans,
            // 'projects' => $projects,
            'donor' => $donors,
            'volunteer' => $volunteers
        ]);
    }

    public function store(Request $request){

         // التحقق من صحة البيانات
            $validated = $request->validate([
                'type' => 'required|in:orphan,project,donor,volunteer',  // تحقق من القيمة المحددة
                'owner_file' => 'required|integer',  // يجب أن تكون قيمة owner_file ID صحيحة
                'file' =>['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],
            ]);

            // dd($validated);

            if($request->type === 'orphan'){

                $model = 'App\Models\Orphan';
                $orphan_name = Orphan::where('id',$request->owner_file)->first()->value('name');

                if ($request->hasFile('file')) {
                        $file = $request->file('file');

                        $fileName = $file->getClientOriginalName();

                        $path = $file->storeAs($orphan_name , $fileName , 'public');
                        // $path = $file->store($orphan_name , 'public');


                        // حفظ المسار في المصفوفة مع مفتاح الحقل
                        $validated['file'] = $path;
                }


            }elseif($request->type === 'project'){
                // $model = 'App\Models\Project';


            }elseif($request->type === 'donor'){
                $model = 'App\Models\Donor';

                $donor_name = Donor::where('id',$request->owner_file)->first()->value('name');
                if ($request->hasFile('file')) {
                        $file = $request->file('file');

                        // تخصيص اسم الملف بناءً على counter
                        // $fileName =  . '.' . $file->getClientOriginalExtension();
                        $fileName = $file->getClientOriginalName();

                        $path = $file->storeAs($donor_name , $fileName , 'public');

                        // حفظ المسار في المصفوفة مع مفتاح الحقل
                        $validated['file'] = $path;
                }


            }elseif($request->type === 'volunteer'){
                $model = 'App\Models\Volunteer';

                $volunteer_name = Volunteer::where('id',$request->owner_file)->first()->value('name');
                if ($request->hasFile('file')) {
                        $file = $request->file('file');

                        // تخصيص اسم الملف بناءً على counter
                        // $fileName =  . '.' . $file->getClientOriginalExtension();
                        $fileName = $file->getClientOriginalName();

                        $path = $file->storeAs('volunteers/' . $volunteer_name , $fileName , 'public');
                        // $path = $file->store('volunteers/' . $volunteer_name , 'public');


                        // حفظ المسار في المصفوفة مع مفتاح الحقل
                        $validated['file'] = $path;
                }




            }


            // إدخال السجلات في جدول files
            File::create([
                'type' => $validated['type'],
                'owner_file_type' => $model,  // أو موديل العلاقة حسب الحاجة
                'owner_file_id' => $validated['owner_file'],
                'file' => $validated['file'],
            ]);


            // إرجاع رد على النجاح
            return redirect()->route('file.index')->with('success', 'تم تحميل الملف بنجاح');

    }
}
