<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;





class ImageController extends Controller
{
    public function index(Request $request){
        try {
            $filePath = Crypt::decrypt($request->file);
            return view('pages.orphans.show_image' , compact('filePath'));

        } catch (\Exception $e) {
            return abort(404);
        }
    }

    public function download($file){
        //فك تشفير اسم الملف
        $filePath = decrypt($file);

        // التحقق من وجود الملف
        if (Storage::disk('public')->exists($filePath)) {
            return response()->download(storage_path('app/public/' . $filePath));
        }

        // إذا لم يتم العثور على الملف
        // return abort(404, 'File not found');
        return redirect()->back()->with(
            'danger' , __('لم يتم العثور على هذه الصورة')
        );
    }
    
    public function visaDownload($file){
        try {
            // فك التشفير الآمن
            // $filePath = Crypt::decryptString($file);
            $filePath = unserialize(Crypt::decryptString($file));


            // التحقق من وجود الملف
            if (!Storage::disk('private')->exists($filePath)) {
                return back()->with('danger', 'الملف غير موجود');
            }

            $user = Auth::user();
            $allowed =  Gate::allows('access-admin');

            if (!$allowed) {
                abort(Response::HTTP_FORBIDDEN, 'لا تملك صلاحية الوصول لهذا الملف');
            }

            return Storage::disk('private')->download($filePath);

        } catch (\Exception $e) {
            return back()->with('danger', 'رابط الملف غير صالح أو منتهي');
        }
    }
}
