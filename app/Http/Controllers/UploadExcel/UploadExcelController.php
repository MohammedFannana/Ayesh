<?php

namespace App\Http\Controllers\UploadExcel;

use App\Models\Supporter;
use Illuminate\Http\Request;
use App\Imports\OrphansImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class UploadExcelController extends Controller
{

    public function index()
    {
        $supporters = Supporter::get(['id', 'name']);
        return view('pages.orphans.new-orphans.upload_excel' , compact('supporters'));
    }


    public function import(Request $request)
    {
        $validated = $request->validate([
            'excelFile' => 'required|mimes:xlsx,xls,csv',
            'supporter_id' => 'required|integer'
            , 'status' => 'required|string|in:registered,under_review,approved,marketing_provider,waiting,sponsored'
        ]);


        try {
            Excel::import(new OrphansImport($request->supporter_id , $request->status), $request->file('excelFile'));

            return redirect()
                ->back()
                ->with('success', 'تم استيراد الملف بنجاح ✅');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('danger', 'حدث خطأ أثناء الاستيراد: ' . $e->getMessage());
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
