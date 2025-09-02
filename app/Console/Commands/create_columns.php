<?php


// require 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

// // مسارات الملفات
// $excelPath = 'storage/app/orphans.xlsx';
// $orphansDir = 'storage/app/public/orphans/x';

// // تحميل ملف Excel
// $spreadsheet = IOFactory::load($excelPath);
// $sheet = $spreadsheet->getActiveSheet();

// // قراءة أسماء الأيتام من العمود C (الصف 2 وما بعده)
// $names = [];
// $row = 2;
// while (($name = $sheet->getCell("C$row")->getValue()) !== null) {
//     $names[] = trim($name);
//     $row++;
// }

// // قراءة أسماء المجلدات داخل مجلد الأيتام
// $folders = array_filter(scandir($orphansDir), function($item) use ($orphansDir) {
//     return is_dir($orphansDir . DIRECTORY_SEPARATOR . $item) && $item !== '.' && $item !== '..';
// });

// // دالة لتطبيع الأسماء
// function normalizeName($name) {
//     $name = mb_strtolower($name, 'UTF-8');
//     $harakat = ['َ','ً','ُ','ٌ','ِ','ٍ','ْ','ّ'];
//     $name = str_replace($harakat, '', $name);
//     $name = preg_replace('/[آأإ]/u', 'ا', $name);
//     $name = preg_replace('/ى/u', 'ي', $name);
//     $name = preg_replace('/ة/u', 'ه', $name);
//     // $name = preg_replace('/[.,\/#!$%\^&\*;:{}=\-_`~()؟،]/u', '', $name);
//     // $name = preg_replace('/\s+/u', ' ', $name);
//     return trim($name);
// }
// //// *** ************************
// دالة مقارنة الأسماء
// function areNamesSimilar($nameExcel, $nameFolder, $defaultThreshold = 0.8) {
//     $normalizedExcel = normalizeName($nameExcel);
//     $normalizedFolder = normalizeName($nameFolder);

//     $excelParts = explode(' ', $normalizedExcel);
//     $folderParts = explode(' ', $normalizedFolder);

//     $excelCount = count($excelParts);
//     $folderCount = count($folderParts);

//     if ($folderCount >= $excelCount) {
//         // لو عدد مقاطع المجلد أكبر أو يساوي → استخدم الاسم كاملاً وعتبة 95%
//         similar_text($normalizedExcel, $normalizedFolder, $percent);
//         return ($percent / 100) >= 0.85;
//     } else {
//         // لو عدد مقاطع المجلد أقل → قارن فقط أول عدد مساوي من Excel
//         $shortenedExcel = implode(' ', array_slice($excelParts, 0, $folderCount));
//         similar_text($shortenedExcel, $normalizedFolder, $percent);
//         return ($percent / 100) >= $defaultThreshold; // 0.8 أو أي قيمة تحددها
//     }
// }

//******************************************************************** */
// function areNamesSimilar($name1, $name2, $threshold = 0.85) {

//     $n1 = normalizeName($name1);
//     $n2 = normalizeName($name2);
//     // $countWordN1 = count(explode(' ' , $n1));

//     // dd($countWordN1);
//     similar_text($n1, $n2, $percent);
//     return ($percent / 100) >= $threshold;
// }





// // معرفة أول عمود فارغ بعد الأعمدة الأصلية
// $firstRow = $sheet->rangeToArray('1:1')[0];
// $startingColIndex = count($firstRow) + 1; // نبدأ بعد آخر عمود موجود فعلياً

// // تنفيذ المطابقة والكتابة
// $rowIndex = 2;

// foreach ($names as $name) {
//     $matchedFolder = '';
//     foreach ($folders as $folder) {
//         if (areNamesSimilar($name, $folder)) {
//             // dd($name , $folder);
//             $matchedFolder = $folder;
//             break;
//         }
//     }

//     // // كتابة اسم المجلد المطابق أو "غير موجود"

//     // إن وجد مجلد مطابق، البحث عن الصور 1 إلى 12
//     if ($matchedFolder) {
//     // قراءة أسماء الملفات داخل المجلد (فقط ملفات، وليس مجلدات فرعية)
//     $folderPath = $orphansDir . DIRECTORY_SEPARATOR . $matchedFolder;
//     $files = array_filter(scandir($folderPath), function ($file) use ($folderPath) {
//         return is_file($folderPath . DIRECTORY_SEPARATOR . $file);
//     });
//     // إنشاء مصفوفة بالملفات الموجودة على شكل [رقم => الامتداد]
//     $existingImages = [];
//     foreach ($files as $file) {
//         if (preg_match('/^(\d+)\.(jpg|jpeg|png)$/i', $file, $matches)) {
//             $index = (int)$matches[1]; // مثال: 1 أو 2 أو 3
//             $ext = strtolower($matches[2]);
//             if ($index >= 1 && $index <= 12) {
//                 $existingImages[$index] = $ext;
//             }
//         }
//     }

// $imageColumnMap = [
//     1 => 'J', // شهادة وفاة الأب
//     2 => 'K', // شهادة الميلاد
//     3 => 'L', // شهادة وفاة الأم
//     4 => 'M', // بطاقة الوصي
//     5 => 'N', // صورة شخصية 6*4
//     6 => 'O', // صورة شخصية 9*12
//     7 => 'P', // شهادة المدرسة
//     8 => 'Q', // التقرير الطبي
//     9 => 'R', // البحث الاجتماعي
//     10 => 'S', // البحث الاجتماعي
//     11 => 'T', // البحث الاجتماعي
//     12 => 'U',
//     // يمكنك إضافة المزيد حسب الحاجة
// ];
// foreach ($existingImages as $index => $ext) {
//     if (isset($imageColumnMap[$index])) {
//         $colLetter = $imageColumnMap[$index];
//         $relativePath = "orphans/" . $matchedFolder . "/$index." . $ext;
//         $sheet->setCellValue($colLetter . $rowIndex, $relativePath);
// }
// }
// }

//     $rowIndex++;
// }

// // حفظ الملف الأصلي
// $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
// $writer->save($excelPath);

// // حفظ نسخة على سطح المكتب
// $desktopPath = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
//     ? getenv("USERPROFILE") . DIRECTORY_SEPARATOR . 'Desktop' . DIRECTORY_SEPARATOR . 'orphans_updated.xlsx'
//     : getenv("HOME") . DIRECTORY_SEPARATOR . 'Desktop' . DIRECTORY_SEPARATOR . 'orphans_updated.xlsx';

// $writer->save($desktopPath);

// echo "✅ تم حفظ الملف مع روابط الصور في الملف الأصلي ونسخة على سطح المكتب: $desktopPath\n";

// // فتح الملف تلقائيًا
// if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
//     shell_exec("start \"\" \"" . $desktopPath . "\"");
// } elseif (PHP_OS === 'Darwin') {
//     shell_exec("open \"" . $desktopPath . "\"");
// } else {
//     shell_exec("xdg-open \"" . $desktopPath . "\"");
// }
