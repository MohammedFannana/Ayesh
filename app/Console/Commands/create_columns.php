<?php

// require 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\IOFactory;

// // =======================
// // الإعدادات
// // =======================
// $excelPath  = 'storage/app/orphan.xlsx';
// $orphansDir = 'storage/app/public/orphans/sharjah';

// // خريطة أعمدة الصور 1..12
// $imageColumnMap = [
//     1 => 'J', 2 => 'K', 3 => 'L', 4 => 'M', 5 => 'N', 6 => 'O',
//     7 => 'P', 8 => 'Q', 9 => 'R', 10 => 'S', 11 => 'T', 12 => 'U',
// ];

// // =======================
// // دوال التطبيع والمطابقة
// // =======================
// function normalizeName(string $name): string {
//     $name = mb_strtolower((string)$name, 'UTF-8');
//     // إزالة الحركات والتطويل
//     $harakat = ['َ','ً','ُ','ٌ','ِ','ٍ','ْ','ّ','ـ'];
//     $name = str_replace($harakat, '', $name);
//     // توحيد أشكال
//     $name = preg_replace('/[آأإ]/u', 'ا', $name);
//     $name = preg_replace('/ى/u', 'ي', $name);
//     $name = preg_replace('/ة/u', 'ه', $name);
//     // توحيد "عبد الله" → "عبدالله" وعائلتها
//     $name = preg_replace('/\bعبد\s+الله\b/u', 'عبدالله', $name);
//     $name = preg_replace('/\bعبد\s+ال(\S+)/u', 'عبدال$1', $name);
//     // إزالة الرموز وتطبيع المسافات
//     $name = preg_replace('/[^\p{Arabic}\p{N}\s]/u', ' ', $name);
//     $name = preg_replace('/\s+/u', ' ', $name);
//     return trim($name);
// }

// function tokenize(string $name): array {
//     $name = normalizeName($name);
//     if ($name === '') return [];
//     $parts = preg_split('/\s+/u', $name, -1, PREG_SPLIT_NO_EMPTY);

//     // كلمات نتجاهلها
//     $stop = ['بن','ابن','بنت','ابي','ابو','السيد','السيده','السيدة','ال','الـ'];
//     $stop = array_map(fn($w) => normalizeName($w), $stop);

//     $out = [];
//     foreach ($parts as $p) {
//         if ($p === '' || in_array($p, $stop, true)) continue;
//         $out[] = $p;
//     }
//     return $out;
// }

// /**
//  * درجة تشابه مبسطة:
//  * - نركّز على أول 3 كلمات (prefix)
//  * - ثم fuzzy عام على أول 4 كلمات
//  * نرجّح النتيجتين ونطلع درجة 0..1
//  */
// function similarityScore(string $excelName, string $folderName): float {
//     $A = tokenize($excelName);
//     $B = tokenize($folderName);

//     // تجاهل آخر كلمة لو الاسم طويل (غالباً اللقب المختلف)
//     if (count($A) > 3) array_pop($A);
//     if (count($B) > 3) array_pop($B);

//     // prefix (أول 3 كلمات)
//     $N = min(3, count($A), count($B));
//     $ok = 0;
//     for ($i = 0; $i < $N; $i++) {
//         similar_text($A[$i], $B[$i], $pct);
//         if (($pct/100) >= 0.85) $ok++;
//     }
//     $prefixScore = $N > 0 ? ($ok / $N) : 0.0;

//     // fuzzy على أول 4 كلمات
//     $sa = implode(' ', array_slice($A, 0, 4));
//     $sb = implode(' ', array_slice($B, 0, 4));
//     $fuzzy = 0.0;
//     if ($sa !== '' && $sb !== '') {
//         similar_text($sa, $sb, $pct2);
//         $fuzzy = $pct2 / 100.0;
//     }

//     // مزيج موزون
//     return 0.65 * $prefixScore + 0.35 * $fuzzy;
// }

// /**
//  * اختيار أفضل فولدر فقط إذا الدرجة ≥ العتبة
//  */
// function pickBestFolder(string $name, array $folders, float $threshold = 0.82): string {
//     $best   = '';
//     $bestSc = -1.0;
//     foreach ($folders as $folder) {
//         $sc = similarityScore($name, $folder);
//         if ($sc > $bestSc) {
//             $bestSc = $sc;
//             $best   = $folder;
//         }
//     }
//     return ($bestSc >= $threshold) ? $best : '';
// }

// // =======================
// // تحميل الإكسل وقراءة الأسماء من العمود C
// // =======================
// $spreadsheet = IOFactory::load($excelPath);
// $sheet = $spreadsheet->getActiveSheet();

// // قراءة الأسماء C2.. حتى أول خلية فاضية
// $names = [];
// $row = 2;
// while (true) {
//     $val = $sheet->getCell("C$row")->getValue();
//     if ($val === null || trim((string)$val) === '') break;
//     $names[] = trim((string)$val);
//     $row++;
// }

// // قراءة أسماء المجلدات داخل مجلد الأيتام
// $folders = array_filter(scandir($orphansDir), function($item) use ($orphansDir) {
//     return is_dir($orphansDir . DIRECTORY_SEPARATOR . $item) && $item !== '.' && $item !== '..';
// });
// $folders = array_values($folders);

// // =======================
// // تنفيذ المطابقة وكتابة النتائج
// // =======================
// $rowIndex = 2;
// foreach ($names as $name) {

//     // 1) اختار فولدر واحد فقط (أو فارغ لو أقل من العتبة)
//     $matchedFolder = pickBestFolder($name, $folders, 0.82);

//     // 2) اكتب نتيجة الفولدر في عمود I (أو "مراجعة" لو مفيش)
//     // $sheet->setCellValue('I'.$rowIndex, $matchedFolder !== '' ? $matchedFolder : 'مراجعة');

//     // 3) جهّز مصفوفة روابط (فارغة افتراضيًا) لكل الأعمدة J..U
//     $rowLinks = [];
//     foreach ($imageColumnMap as $idx => $col) {
//         $rowLinks[$col] = ''; // الخلية تبقى فاضية إذا مفيش صورة
//     }

//     // 4) لو فيه فولدر مطابق: اسحب منه فقط الصور 1..12
//     if ($matchedFolder !== '') {
//         $folderPath = $orphansDir . DIRECTORY_SEPARATOR . $matchedFolder;
//         if (is_dir($folderPath)) {
//             $files = array_filter(scandir($folderPath), function ($file) use ($folderPath) {
//                 return is_file($folderPath . DIRECTORY_SEPARATOR . $file);
//             });

//             // ابحث عن ملفات 1..12 فقط في هذا الفولدر
//             foreach ($files as $file) {
//                 if (preg_match('/^(\d+)\.(jpg|jpeg|png)$/iu', $file, $m)) {
//                     $index = (int)$m[1];
//                     $ext   = strtolower($m[2]);
//                     if ($index >= 1 && $index <= 12) {
//                         $col = $imageColumnMap[$index] ?? null;
//                         if ($col) {
//                             $rowLinks[$col] = "orphans/" . $matchedFolder . "/$index.$ext";
//                         }
//                     }
//                 }
//             }
//         }
//     }

//     // 5) اكتب الروابط (أو الفارغ) في الأعمدة J..U — بدون أخذ أي شيء من فولدرات أخرى
//     foreach ($rowLinks as $col => $val) {
//         $sheet->setCellValue($col . $rowIndex, $val);
//     }

//     $rowIndex++;
// }

// // =======================
// // حفظ الملف + نسخة سطح المكتب
// // =======================
// $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
// $writer->save($excelPath);

// $desktopPath = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
//     ? rtrim(getenv("USERPROFILE") ?: getenv("HOMEDRIVE").getenv("HOMEPATH"), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'Desktop' . DIRECTORY_SEPARATOR . 'orphans_updated.xlsx'
//     : rtrim(getenv("HOME") ?: '~', DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'Desktop' . DIRECTORY_SEPARATOR . 'orphans_updated.xlsx';

// try {
//     $writer->save($desktopPath);
// } catch (Throwable $e) {
//     // تجاهل لو مفيش صلاحيات سطح المكتب
// }

// echo "✅ تم التحديث. تم أخذ الصور من الفولدر المطابق فقط، والحقول غير المتوفرة بقيت فاضية.\n";
// echo "الأصلي: $excelPath\n";
// echo "النسخة: $desktopPath\n";

// // (اختياري) فتح الملف تلقائيًا
// if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
//     @shell_exec("start \"\" \"" . $desktopPath . "\"");
// } elseif (PHP_OS === 'Darwin') {
//     @shell_exec("open \"" . $desktopPath . "\"");
// } else {
//     @shell_exec("xdg-open \"" . $desktopPath . "\"");
// }
