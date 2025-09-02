<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\File;
use App\Models\Orphan;
use App\Models\Supporter;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
        $orphan_count = Orphan::where('status' , 'sponsored')->count();
        $volunteer_count = Volunteer::count();
        $supporter_count = Supporter::count();
        return view('pages.files.index' , compact('orphan_count' , 'volunteer_count' , 'supporter_count'));
    }


    public function getCategories()
    {
        // استرجاع البيانات من قاعدة البيانات
        $orphans = Orphan::all(['id' , 'name']); // إذا كنت تستخدم موديل Orphan
        // $projects = Project::all(['id' , 'name']); // إذا كنت تستخدم موديل Project
        $supporters = Supporter::all(['id' , 'name']); // إذا كنت تستخدم موديل Donor
        $volunteers = Volunteer::all(['id' , 'name']); // إذا كنت تستخدم موديل Volunteer

        // إعادة البيانات إلى الجافا سكربت
        return response()->json([
            'orphan' => $orphans,
            // 'projects' => $projects,
            'supporter' => $supporters,
            'volunteer' => $volunteers
        ]);
    }

    public function store(Request $request){

         // التحقق من صحة البيانات
            $validated = $request->validate([
                'type' => 'required|in:orphan,project,supporter,volunteer',  // تحقق من القيمة المحددة
                'owner_file' => 'required|integer',  // يجب أن تكون قيمة owner_file ID صحيحة
                'file' =>['required','file' ,'mimes:png,jpg,jpeg,pdf', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'max:1048576',],
            ]);

            // dd($validated);

            if($request->type === 'orphan'){

                $model = 'App\Models\Orphan';
                $orphan_name = Orphan::where('id',$request->owner_file)->first()->value('name');

                if ($request->hasFile('file')) {
                        $file = $request->file('file');

                        $fileName = $file->getClientOriginalName();

                        $path = $file->storeAs('orphans/' . $orphan_name , $fileName , 'public');
                        // $path = $file->store($orphan_name , 'public');


                        // حفظ المسار في المصفوفة مع مفتاح الحقل
                        $validated['file'] = $path;
                }


            }elseif($request->type === 'project'){
                // $model = 'App\Models\Project';


            }elseif($request->type === 'supporter'){
                $model = 'App\Models\Supporter';

                $supporter_name = Supporter::where('id',$request->owner_file)->first()->value('name');
                if ($request->hasFile('file')) {
                        $file = $request->file('file');

                        // تخصيص اسم الملف بناءً على counter
                        // $fileName =  . '.' . $file->getClientOriginalExtension();
                        $fileName = $file->getClientOriginalName();

                        $path = $file->storeAs($supporter_name , $fileName , 'public');

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
