<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use App\Models\Supporter;
use App\Models\SupporterField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;





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
            $query->select('full_address','orphan_id');
        }])
        ->with(['family' => function ($query) {  // to get phone from profile table
            $query->select('orphan_id');
        }])
        ->with(['marketing' => function ($query) {  // to get only supporter data through marketing table
            $query->select('orphan_id', 'supporter_id') // اختر الحقول المطلوبة من جدول marketing
                  ->with(['supporter' => function ($query) {  // to get supporter data
                      $query->select('id', 'name'); // اختر الحقول التي تريدها من جدول supporters
            }]);
        }])
        ->with('phones')
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
        // $name = $supporter->name;

        $orphan = Orphan::where('id' , $orphanId)
        ->where('status', 'marketing_provider')
        ->with(['profile' , 'guardian' , 'family' , 'phones' , 'certified_orphan_extras'])
        ->firstOrFail();


        $fields = SupporterField::where('supporter_id' , $supporterId)->get();

        return view('pages.orphans.marketing-orphans.supporter_' .  $supporterId , compact(['orphan' , 'supporterId' ,'fields']));

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
            $query->select('orphan_id');
        }])
        ->with(['image' => function ($query) {
            $query->select('orphan_id' ,'birth_certificate' , 'mother_card' ,
            'father_death_certificate' , 'mother_death_certificate');
        }])
        ->with(['certified_orphan_extras'])
        ->firstOrFail(); //

        // التحقق إذا كانت جميع الحقول قد تم ملؤها
        if (!Gate::allows('has-filled-fields', $orphan)) {
            return redirect()->route('orphan.marketing.index')->with('danger', __('لمشاهدة تفاصيل البيانات كاملة يجب اكمال البيانات. .'));
        }

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



    // public function generatePDF(Request $request)
    // {
    //     $type = $request->query('type');

    //     $allowedTypes = ['pdf', 'word', 'powerpoint'];
    //     if (!in_array($type, $allowedTypes)) {
    //         abort(400, 'نوع الملف غير مدعوم');
    //     }

    //     if($type === 'pdf'){

    //         $orphanIds = explode(',', $request->orphan_ids);

    //         $orphans = Orphan::with([
    //             'guardian' => function ($query) {
    //                 $query->select('orphan_id', 'guardian_name', 'guardian_relationship');
    //             },
    //             'image' => function ($query) {
    //                 $query->select('orphan_id', 'orphan_image_4_6');
    //             },
    //             'family',
    //             'marketing' => function ($query) {
    //                 $query->select('id', 'orphan_id', 'supporter_id');
    //             },
    //             'supporterFieldValues.field'
    //         ])
    //         ->whereIn('id', $orphanIds)
    //         ->get();


    //         if ($orphans->isEmpty()) {
    //             return back()->with('danger', 'لا يوجد أيتام متاحين');
    //         }


    //         $pdfFiles = [];
    //         $orphansToUpdate = [];



    //         foreach ($orphans as $orphan) {

    //             $supporterId = $orphan->marketing->supporter_id ?? null;

    //             if (!$supporterId) {
    //                 return redirect()->route('orphan.marketing.index')->with('danger', "اليتيم {$orphan->name} غير مرتبط بأي متبرع");
    //             }

    //             $requiredFields = SupporterField::where('supporter_id', $supporterId)->pluck('id')->toArray();
    //             $filledFields = $orphan->supporterFieldValues
    //                                 ->whereNotNull('value')
    //                                 ->pluck('supporter_field_id')
    //                                 ->toArray();

    //             $missingFields = array_diff($requiredFields, $filledFields);

    //             if (!empty($missingFields)) {
    //                 return redirect()->route('orphan.marketing.index')->with('danger', "اليتيم {$orphan->name} لا يحتوي على جميع بيانات المتبرع المطلوبة");
    //             }

    //             if ($orphan->status !== 'marketing_provider') {
    //                 return redirect()->route('orphan.marketing.index')->with('danger', "اليتيم {$orphan->name} ليس في حالة المتبرع");
    //             }

    //             $pdfContent = PDF::loadView('pdf.donor_' . $supporterId, ['orphan' => $orphan]);


    //             $tempFile = storage_path('app/public/temp_orphan_' . $orphan->id . '.pdf');
    //             $pdfContent->save($tempFile);
    //             $pdfFiles[] = $tempFile;

    //             $orphansToUpdate[] = $orphan->id; // اجمع الـ IDs للتحديث لاحقاً


    //             // try {
    //                 // $orphan->update(['status' => 'waiting']);
    //             // } catch (\Exception $e) {
    //             //     ("تحديث الحالة فشل: " . $e->getMessage());
    //             // }





    //         }

    //         $pdf = new \Mpdf\Mpdf();

    //         foreach ($pdfFiles as $file) {
    //             // استيراد الصفحة من الملف المؤقت
    //             $pageCount = $pdf->setSourceFile($file); // عدد الصفحات في الملف

    //             for ($i = 1; $i <= $pageCount; $i++) {
    //                 // استيراد الصفحة الحالية
    //                 $templateId = $pdf->importPage($i);

    //                 // إضافة الصفحة إلى المستند الجديد
    //                 $pdf->AddPage();
    //                 $pdf->useTemplate($templateId);
    //             }
    //         }

    //         // حذف الملفات المؤقتة بعد دمجها
    //         foreach ($pdfFiles as $file) {
    //             unlink($file);
    //         }



    //         Orphan::whereIn('id', $orphansToUpdate)->update(['status' => 'waiting']);


    //         // عرض الملف المدمج
    //         // return $pdf->Output('donors.pdf', 'I');
    //         $orphanNames = $orphans->pluck('name')->implode('_'); // جمع أسماء الأيتام مع Underscore
    //         $filename = $orphanNames . '_' . now()->format('Ymd') . '.pdf';
    //         // return $pdf->Output($filename, 'I');
    //         return response($pdf->Output('', 'S'), 200)
    //         ->header('Content-Type', 'application/pdf')
    //         ->header('Content-Disposition', 'attachment; filename="' . $filename . '"') // تغيير هنا
    //         ->header('Content-Transfer-Encoding', 'binary')
    //         ->header('Accept-Ranges', 'bytes')
    //         ->header('Cache-Control', 'public, must-revalidate, max-age=0');

    //     }elseif($type === 'word') {
    //         $orphanIds = explode(',', $request->orphan_ids);
    //         $orphans = Orphan::with([
    //             'guardian' => function ($query) {
    //                 $query->select('orphan_id', 'guardian_name', 'guardian_relationship');
    //             },
    //             'image' => function ($query) {
    //                 $query->select('orphan_id', 'orphan_image_4_6');
    //             },
    //             'family',
    //             'marketing' => function ($query) {
    //                 $query->select('id', 'orphan_id', 'supporter_id');
    //             },
    //             'supporterFieldValues.field'
    //         ])->whereIn('id', $orphanIds)->get();

    //         if ($orphans->isEmpty()) {
    //             return back()->with('danger', 'لا يوجد أيتام متاحين');
    //         }

    //         $phpWord = new \PhpOffice\PhpWord\PhpWord();

    //         foreach ($orphans as $orphan) {
    //             $section = $phpWord->addSection();

    //             $section->addTitle("Orphan: {$orphan->name}", 1);
    //             $section->addText("Guardian: " . ($orphan->guardian->guardian_name ?? '---'));
    //             $section->addText("Relationship: " . ($orphan->guardian->guardian_relationship ?? '---'));
    //             $section->addText("Family Members: Male - {$orphan->family->male_number}, Female - {$orphan->family->female_number}");
    //             $section->addText("Status: {$orphan->status}");
    //             $section->addTextBreak(2);
    //         }

    //         $filename = 'orphans_' . now()->format('Ymd') . '.docx';
    //         $tempPath = storage_path('app/public/' . $filename);
    //         $phpWordWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    //         $phpWordWriter->save($tempPath);

    //         return response()->download($tempPath)->deleteFileAfterSend(true);
    //     }elseif($type === 'powerpoint') {
    //         $orphanIds = explode(',', $request->orphan_ids);
    //         $orphans = Orphan::with([
    //             'guardian' => function ($query) {
    //                 $query->select('orphan_id', 'guardian_name', 'guardian_relationship');
    //             },
    //             'image' => function ($query) {
    //                 $query->select('orphan_id', 'orphan_image_4_6');
    //             },
    //             'family',
    //             'marketing' => function ($query) {
    //                 $query->select('id', 'orphan_id', 'supporter_id');
    //             },
    //             'supporterFieldValues.field'
    //         ])->whereIn('id', $orphanIds)->get();

    //         if ($orphans->isEmpty()) {
    //             return back()->with('danger', 'لا يوجد أيتام متاحين');
    //         }

    //         $presentation = new \PhpOffice\PhpPresentation\PhpPresentation();
    //         $oSlide = $presentation->getActiveSlide();

    //         foreach ($orphans as $index => $orphan) {
    //             if ($index > 0) {
    //                 $oSlide = $presentation->createSlide();
    //             }

    //             $shape = $oSlide->createRichTextShape()
    //                 ->setHeight(300)
    //                 ->setWidth(600)
    //                 ->setOffsetX(100)
    //                 ->setOffsetY(100);

    //             $shape->getActiveParagraph()->getAlignment()->setHorizontal(\PhpOffice\PhpPresentation\Style\Alignment::HORIZONTAL_CENTER);

    //             $textRun = $shape->createTextRun("Orphan: {$orphan->name}\n");
    //             $textRun->getFont()->setBold(true)->setSize(20);

    //             $shape->createTextRun("Guardian: " . ($orphan->guardian->guardian_name ?? '---') . "\n");
    //             $shape->createTextRun("Relationship: " . ($orphan->guardian->guardian_relationship ?? '---') . "\n");
    //             $shape->createTextRun("Status: {$orphan->status}");
    //         }

    //         $filename = 'orphans_' . now()->format('Ymd') . '.pptx';
    //         $tempPath = storage_path('app/public/' . $filename);
    //         $oWriter = \PhpOffice\PhpPresentation\IOFactory::createWriter($presentation, 'PowerPoint2007');
    //         $oWriter->save($tempPath);

    //         return response()->download($tempPath)->deleteFileAfterSend(true);
    //     }



    // }

    public function generatePDF(Request $request)
    {

        $type = $request->query('type');

        $allowedTypes = ['pdf', 'word', 'powerpoint'];
        if (!in_array($type, $allowedTypes)) {
            abort(400, 'نوع الملف غير مدعوم');
        }


        if($type === 'pdf'){

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
                'phones'
                ,
                'supporterFieldValues.field'
            ])
            ->whereIn('id', $orphanIds)
            ->get();


            if ($orphans->isEmpty()) {
                return back()->with('danger', 'لا يوجد أيتام متاحين');
            }


            $pdfFiles = [];
            $orphansToUpdate = [];



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

                $pdfContent = PDF::loadView('pdf.donor_' . $supporterId, ['orphan' => $orphan]);


                $tempFile = storage_path('app/public/temp_orphan_' . $orphan->id . '.pdf');
                $pdfContent->save($tempFile);
                $pdfFiles[] = $tempFile;

                $orphansToUpdate[] = $orphan->id; // اجمع الـ IDs للتحديث لاحقاً


                // try {
                    // $orphan->update(['status' => 'waiting']);
                // } catch (\Exception $e) {
                //     ("تحديث الحالة فشل: " . $e->getMessage());
                // }





            }

            $pdf = new \Mpdf\Mpdf();

            foreach ($pdfFiles as $file) {
                // استيراد الصفحة من الملف المؤقت
                $pageCount = $pdf->setSourceFile($file); // عدد الصفحات في الملف

                for ($i = 1; $i <= $pageCount; $i++) {
                    // استيراد الصفحة الحالية
                    $templateId = $pdf->importPage($i);

                    // إضافة الصفحة إلى المستند الجديد
                    $pdf->AddPage();
                    $pdf->useTemplate($templateId);
                }
            }

            // حذف الملفات المؤقتة بعد دمجها
            foreach ($pdfFiles as $file) {
                unlink($file);
            }



            Orphan::whereIn('id', $orphansToUpdate)->update(['status' => 'waiting']);


            // عرض الملف المدمج
            // return $pdf->Output('donors.pdf', 'I');
            $orphanNames = $orphans->pluck('name')->implode('_'); // جمع أسماء الأيتام مع Underscore
            $filename = $orphanNames . '_' . now()->format('Ymd') . '.pdf';


            // return $pdf->Output($filename, 'I');
            return response($pdf->Output('', 'S'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"') // تغيير هنا
            ->header('Content-Transfer-Encoding', 'binary')
            ->header('Accept-Ranges', 'bytes')
            ->header('Cache-Control', 'public, must-revalidate, max-age=0');

        }elseif($type === 'word') {

            $orphanIds = explode(',', $request->orphan_ids);
            $orphans = Orphan::with(['guardian', 'image', 'profile', 'marketing'])->whereIn('id', $orphanIds)->get();

            if ($orphans->isEmpty()) {
                return back()->with('danger', 'لا يوجد أيتام متاحين');
            }

            // 1. دمج HTML لكل يتيم
            $mergedHtml = '';
            foreach ($orphans as $orphan) {
                $supporterId = $orphan->marketing->supporter_id ?? 1;
                $html = view('word.donor_' . $supporterId, ['orphan' => $orphan])->render();
                $mergedHtml .= $html . '<div style="page-break-after: always;"></div>';
            }

            // 2. حفظه كـ HTML مؤقت
            $htmlFilename = 'orphans_' . now()->format('Ymd_His') . '.html';
            $htmlPath = storage_path('app/public/' . $htmlFilename);
            file_put_contents($htmlPath, $mergedHtml);

            // 3. إنشاء اتصال مع CloudConvert
            $cloudconvert = new CloudConvert([
                'api_key' => env('CLOUDCONVERT_API_KEY'),
                'sandbox' => false,
            ]);

            // 4. إنشاء job للرفع والتحويل والتصدير
            $job = $cloudconvert->jobs()->create(
                (new Job())
                    ->addTask(new Task('import/upload', 'upload-html'))
                    ->addTask(
                        (new Task('convert', 'convert-to-word'))
                            ->set('input', 'upload-html')
                            ->set('input_format', 'html')
                            ->set('output_format', 'docx')
                            ->set('engine', 'libreoffice')
                    )
                    ->addTask(
                        (new Task('export/url', 'export-word'))
                            ->set('input', 'convert-to-word')
                    )
            );

            // 5. البحث عن مهمة الرفع
            $uploadTask = null;
            foreach ($job->getTasks() as $task) {
                if ($task->getName() === 'upload-html') {
                    $uploadTask = $task;
                    break;
                }
            }

            // 6. رفع الملف
            $cloudconvert->tasks()->upload($uploadTask, fopen($htmlPath, 'r'));

            // 7. انتظار انتهاء المهمة
            $cloudconvert->jobs()->wait($job);

            // 8. استخراج رابط الملف النهائي
            $exportTask = null;
            foreach ($job->getTasks() as $task) {
                if ($task->getName() === 'export-word') {
                    $exportTask = $task;
                    break;
                }
            }

            $file = $exportTask->getResult()['files'][0];

            // 9. تنزيل الملف وإرساله للمستخدم
            $response = Http::get($file['url']);
            $finalName = 'orphans_' . now()->format('Ymd_His') . '.docx';

            return response($response->body(), 200)
                ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                ->header('Content-Disposition', 'attachment; filename="' . $finalName . '"');
        }

        elseif($type === 'powerpoint') {
            $orphanIds = explode(',', $request->orphan_ids);
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

            $presentation = new \PhpOffice\PhpPresentation\PhpPresentation();
            $oSlide = $presentation->getActiveSlide();

            foreach ($orphans as $index => $orphan) {
                if ($index > 0) {
                    $oSlide = $presentation->createSlide();
                }

                $shape = $oSlide->createRichTextShape()
                    ->setHeight(300)
                    ->setWidth(600)
                    ->setOffsetX(100)
                    ->setOffsetY(100);

                $shape->getActiveParagraph()->getAlignment()->setHorizontal(\PhpOffice\PhpPresentation\Style\Alignment::HORIZONTAL_CENTER);

                $textRun = $shape->createTextRun("Orphan: {$orphan->name}\n");
                $textRun->getFont()->setBold(true)->setSize(20);

                $html = view('pdf.donor_' . $orphan->marketing->supporter_id, ['orphan' => $orphan])->render();

                // تنظيف HTML لإزالة التاغات وترك النص فقط
                $plainText = strip_tags($html);

                $shape = $oSlide->createRichTextShape()
                    ->setHeight(300)
                    ->setWidth(600)
                    ->setOffsetX(100)
                    ->setOffsetY(100);

                $shape->getActiveParagraph()->getAlignment()->setHorizontal(\PhpOffice\PhpPresentation\Style\Alignment::HORIZONTAL_CENTER);

                $textRun = $shape->createTextRun($plainText);
                $textRun->getFont()->setSize(14);

            }

            $filename = 'orphans_' . now()->format('Ymd') . '.pptx';
            $tempPath = storage_path('app/public/' . $filename);
            $oWriter = \PhpOffice\PhpPresentation\IOFactory::createWriter($presentation, 'PowerPoint2007');
            $oWriter->save($tempPath);

            return response()->download($tempPath)->deleteFileAfterSend(true);
        }


    }

}






