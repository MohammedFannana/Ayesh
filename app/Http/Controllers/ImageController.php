<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;



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
}
