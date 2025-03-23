<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use App\Models\Supporter;
use App\Models\SupporterField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
// use setasign\Fpdi\Tcpdf\Fpdi;
// use setasign\Fpdi\Tcpdf\Fpdi;
// use Barryvdh\DomPDF\Facade\Pdf;
// use Mpdf\Mpdf;
// use setasign\Fpdi\PdfParser\StreamReader;
// use Barryvdh\DomPDF\Facade as PDF;

use TCPDF;


// use Mpdf\Mpdf;

class MarketingOrphanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orphans = Orphan::where('status', 'marketing_provider')

            ->when($request->search, function ($builder, $value) {  //search input
                $builder->where('name', 'LIKE', "%{$value}%");
            })
            // إضافة الفلاتر بناءً على الـ checkboxes
            ->when($request->filter, function ($builder, $filters) { //filter input
                if (in_array('جمعية دار البر', $filters)) {
                    $builder->whereHas('marketing.supporter', function ($query) {
                        $query->where('name', 'جمعية دار البر');
                    });
                }
                elseif (in_array('جمعية الشارقة', $filters)) {
                    $builder->whereHas('marketing.supporter', function ($query) {
                        $query->where('name', 'جمعية الشارقة');
                    });
                }
                elseif (in_array('جمعية السيدة مريم', $filters)) {
                    $builder->whereHas('marketing.supporter', function ($query) {
                        $query->where('name', 'جمعية السيدة مريم');
                    });
                }
                elseif (in_array('جمعية دبي الخيرية', $filters)) {
                    $builder->whereHas('marketing.supporter', function ($query) {
                        $query->where('name', 'جمعية دبي الخيرية');
                    });
                }
            })
        ->select('id', 'internal_code', 'name')
        ->with(['profile' => function ($query) {  // to get phone from profile table
            $query->select('phone', 'orphan_id');
        }])
        ->with(['family' => function ($query) {  // to get phone from profile table
            $query->select('address', 'orphan_id');
        }])
        ->with(['marketing' => function ($query) {  // to get only supporter data through marketing table
            $query->select('orphan_id', 'supporter_id') // اختر الحقول المطلوبة من جدول marketing
                  ->with(['supporter' => function ($query) {  // to get supporter data
                      $query->select('id', 'name'); // اختر الحقول التي تريدها من جدول supporters
            }]);
        }])
        ->paginate(8);


        $count = $orphans->total();

            // get the doner
            // $supporters = Supporter::all('id' , 'name');


            return view('pages.orphans.marketing-orphans.index' , compact('orphans' , 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $supporterId , string $orphanId)
    {
        $supporter = Supporter::findOrFail($supporterId);
        $name = $supporter->name;

        $orphan = Orphan::where('id' , $orphanId)
        ->where('status', 'marketing_provider')
        ->with(['profile' , 'guardian' , 'family' , 'phones' , 'certified_orphan_extras'])
        ->firstOrFail();


        $fields = SupporterField::where('supporter_id' , $supporterId)->get();


        if($name === "جمعية دار البر"){
            return view('pages.orphans.marketing-orphans.alBer_create' , compact(['orphan' , 'supporterId' ,'fields']));
        }elseif($name === "جمعية الشارقة"){
            return view('pages.orphans.marketing-orphans.sharjah_create' , compact(['orphan' , 'supporterId' ,'fields']));
        }elseif($name === "جمعية السيدة مريم"){
            return view('pages.orphans.marketing-orphans.group_create' , compact(['orphan' , 'supporterId' , 'fields']));
        }elseif($name === "جمعية دبي الخيرية"){
            return view('pages.orphans.marketing-orphans.adabi_create' , compact(['orphan' , 'supporterId' , 'fields']));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orphan = Orphan::where('id', $id)
        ->where('status', 'marketing_provider') // إضافة شرط status بعد id
        ->select('id', 'internal_code', 'name', 'application_form')
        ->with(['profile' => function ($query) {  // to get phone from profile table
            $query->select('phone', 'orphan_id');
        }])
        ->with(['image' => function ($query) {
            $query->select('orphan_id' ,'birth_certificate' , 'mother_card' ,
            'father_death_certificate' , 'mother_death_certificate');
        }])
        ->with(['certified_orphan_extras'])
        ->firstOrFail(); //

        return view('pages.orphans.marketing-orphans.view' , compact('orphan'));

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
        ->where('status', 'marketing_provider') // إضافة شرط status بعد id
        ->firstOrFail(); // إذا لم يكن موجودًا سيرمي استثناء

        $orphan->delete();
        return redirect()->route('orphan.marketing.index')->with('success' , __(' تم حذف اليتيم بنجاح '));
    }

    // public function generatePDF(Request $request){
    //     // جلب معرفات الأيتام من الطلب
    //     $orphanIds = explode(',', $request->orphan_ids);

    //     // جلب جميع الأيتام مع البيانات اللازمة
    //     $orphans = Orphan::with(['guardian', 'family', 'marketing.supporter', 'supporterFieldValues'])
    //                     ->whereIn('id', $orphanIds)
    //                     ->get();

    //     if ($orphans->isEmpty()) {
    //         return response()->json(['error' => 'لم يتم العثور على الأيتام المحددين'], 404);
    //     }

    //     $pdf = new Fpdi();
    //     // التحقق من اكتمال البيانات لكل يتيم
    //     foreach ($orphans as $orphan) {
    //         // جلب الـ donor_id من علاقة marketing
    //         $donor = $orphan->marketing->donor_id;

    //         if (!$donor) {
    //             return response()->json([
    //                 'error' => "اليتيم {$orphan->name} غير مرتبط بأي متبرع"
    //             ], 400);
    //         }

    //         // جلب الحقول المطلوبة لهذا المتبرع
    //         $requiredFields = DonorField::where('donor_id', $donor)->pluck('id')->toArray();

    //         // الحصول على الحقول التي يملكها هذا اليتيم فقط
    //         $filledFields = $orphan->donorFieldValues
    //                             ->whereNotNull('value') // التأكد أن القيم غير فارغة
    //                             ->pluck('donor_field_id')
    //                             ->toArray();

    //         // استخراج الحقول الناقصة
    //         $missingFields = array_diff($requiredFields, $filledFields);

    //         if (!empty($missingFields)) {

    //             return redirect()->route('orphan.marketing.index')->with('danger', "اليتيم {$orphan->name}  لا يحتوي على جميع بيانات المتبرع المطلوبة");
    //             // return response()->json([
    //             //     'error' => "اليتيم {$orphan->name} لا يحتوي على جميع بيانات المتبرع المطلوبة"
    //             // ], 400);
    //         }
    //     }

    //     // تحميل ملف PDF
    //     // $pdf = Pdf::loadView('pdf.orphan_image_template', compact('orphans'));

    //     // return response()->streamDownload(
    //     //     fn() => print($pdf->output()),
    //     //     'orphans_list.pdf'
    //     // );
    // }


    public function generatePDF(Request $request)
    {
        $orphanIds = explode(',', $request->orphan_ids);

        $orphans = Orphan::with([
            'guardian' => function ($query) {
                $query->select('orphan_id', 'guardian_name', 'guardian_relationship');
            },
            'image' => function ($query) {
                $query->select('orphan_id', 'orphan_image_4_6');
            },
            'family',
            'marketing' => function ($query) {
                $query->select('id', 'orphan_id', 'supporter_id');
            },
            'supporterFieldValues.field'
        ])
        ->whereIn('id', $orphanIds)
        ->get();

        if ($orphans->isEmpty()) {
            return back()->with('danger', 'لا يوجد أيتام متاحين');
        }

        // $mpdf = new Mpdf([
        //     'mode' => 'utf-8',
        //     'format' => 'A4',
        //     'margin_left' => 10,
        //     'margin_right' => 10,
        //     'margin_top' => 10,
        //     'margin_bottom' => 10,
        // ]);

        // $htmlContent = '';

        foreach ($orphans as $orphan) {
            $supporterId = $orphan->marketing->supporter_id ?? null;

            if (!$supporterId) {
                return redirect()->route('orphan.marketing.index')->with('danger', "اليتيم {$orphan->name} غير مرتبط بأي متبرع");
            }

            $requiredFields = SupporterField::where('supporter_id', $supporterId)->pluck('id')->toArray();
            $filledFields = $orphan->supporterFieldValues
                                ->whereNotNull('value')
                                ->pluck('supporter_field_id')
                                ->toArray();

            $missingFields = array_diff($requiredFields, $filledFields);

            if (!empty($missingFields)) {
                return redirect()->route('orphan.marketing.index')->with('danger', "اليتيم {$orphan->name} لا يحتوي على جميع بيانات المتبرع المطلوبة");
            }

            if ($orphan->status !== 'marketing_provider') {
                return redirect()->route('orphan.marketing.index')->with('danger', "اليتيم {$orphan->name} ليس في حالة المتبرع");
            }


            // $orphanHtml = View::make('pdf.donor_' . $donorId, compact('orphan'));


// إنشاء ملف PDF جديد
$pdf = new TCPDF();
$pdf->SetCreator('Laravel TCPDF');
$pdf->SetAuthor('اسم مؤسستك');
$pdf->SetTitle("ملف اليتيم - {$orphan->name}");
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->AddPage();
            // تنزيل الـ PDF مباشرة
            // $bootstrapCss = file_get_contents(public_path('css/bootstrap.min.css'));
            // $pdf->writeHTML('<style>' . $bootstrapCss . '</style>', true, false, true, false, '');

            // إدراج محتوى القالب داخل PDF
            // $pdf->writeHTML($orphanHtml, true, false, true, false, '');

            dd('x');
  // تنزيل الملف مباشرة للمستخدم
  $fileName = 'orphan_' . $orphan->id . '.pdf';
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename="' . $fileName . '"');
  $pdf->Output($fileName, 'D'); // 'D' تعني تنزيل الملف مباشرة
            // $htmlContent .= $orphanHtml . '<div style="page-break-before: always;"></div>'; // إضافة فاصل صفحات بين الأيتام
            // $mpdf->WriteHTML($orphanHtml);
            // $mpdf->AddPage(); // إضافة صفحة جديدة بعد كل يتيم
        }


        // $pdf = PDF::loadHTML($htmlContent);
        // return $pdf->stream('orphans_report.pdf');


    }

}






