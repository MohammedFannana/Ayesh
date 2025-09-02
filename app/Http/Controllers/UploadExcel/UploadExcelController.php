<?php

namespace App\Http\Controllers\UploadExcel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OrphansImport;

class UploadExcelController extends Controller
{
    public function import()
    {
        $filePath = storage_path('app/orphans.xlsx'); // تأكد أن الملف موجود هنا

        try {
            Excel::import(new OrphansImport, $filePath);
            return response()->json(['message' => 'تم الاستيراد بنجاح'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'حدث خطأ أثناء الاستيراد',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // public function import()
    // {
    //     $filePath = storage_path('app/orphans.xlsx');

    //     try {
    //         // تحميل الملف كـ Collection
    //         $collection = Excel::toCollection(new OrphansImport, $filePath);

    //         // افترض أن البيانات في أول sheet
    //         $rows = $collection->first();

    //         if ($rows->isEmpty()) {
    //             return response()->json(['message' => 'الملف فارغ'], 400);
    //         }

    //         // جرب فقط أول صف (عدى العنوان)
    //         $firstRow = $rows->get(1); // get(1) لو أول صف هو العناوين، وإلا استخدم get(0)
    //         // dd($firstRow->toArray());


    //         // نفذ نفس منطق المعالجة على صف واحد فقط
    //         $import = new OrphansImport();
    //         $import->model($firstRow->toArray());

    //         return response()->json(['message' => 'تم استيراد الصف الأول بنجاح'], 200);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'message' => 'حدث خطأ أثناء استيراد الصف الأول',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }
}
