<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Log;
use ZipArchive;


class OrphanAttachmentController extends Controller
{


    public function downloadAll($orphanId)
    {
        $orphan = Orphan::with('image')->findOrFail($orphanId);

        if (!$orphan->image) {
            return redirect()->back()->with('error', 'لا يوجد مرفقات لليتيم');
        }

        $imageArray = $orphan->image->toArray();
        $images = collect($imageArray)->except(['created_at', 'updated_at', 'orphan_id', 'id'])->filter();

        if ($images->isEmpty()) {
            return redirect()->back()->with('error', 'لا توجد مرفقات قابلة للتحميل.');
        }

        $zip = new ZipArchive;
        $zipFileName = storage_path('app/public/attachments_' .$orphan->name . '_' .time() . '.zip');

        if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
            foreach ($images as $key => $path) {
                $fullPath = storage_path('app/public/' . $path);

                if (file_exists($fullPath)) {
                    // اسم داخل الملف zip
                    $filenameInZip = $orphan->image->display_name ?? basename($fullPath);
                    $zip->addFile($fullPath, $key . '.' . pathinfo($fullPath, PATHINFO_EXTENSION));
                }
            }
            $zip->close();

            return response()->download($zipFileName)->deleteFileAfterSend(true);
        } else {
            return redirect()->back()->with('error', 'فشل في إنشاء ملف مضغوط.');
        }
    }




    // public function listAttachments($orphanId)
    // {
    //     $orphan = Orphan::with('image')->findOrFail($orphanId);

    //     if (!$orphan->image) {
    //         return redirect()->back()->with('error', 'لا يوجد مرفقات لليتيم');
    //     }

    //     $imageArray = $orphan->image->toArray();
    //     $images = collect($imageArray)->except(['created_at', 'updated_at', 'orphan_id' ,'id']);
    //     dd($images);

    //     $filePath = storage_path('app/public/' . $orphan->image->path);

    //     if (!file_exists($filePath)) {
    //         return redirect()->back()->with('error', 'الملف غير موجود في المسار المحدد.');
    //     }

    //     // يمكنك إرجاع الملف مباشرة بدون ضغط إذا هو ملف واحد فقط:
    //     return response()->download($filePath);
    // }

}
