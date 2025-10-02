<?php

namespace App\Exports;

use App\Models\Orphan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrphansExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithCustomStartCell
{
    protected $request;
    protected $filters;

    public function __construct($request)
    {
        $this->request = $request;
        $this->filters = [
            'الداعم' => $request->filter ? implode(", ", $request->filter) : 'الكل',
            'المحافظة' => $request->governorate ?? 'الكل',
            'العمر من' => $request->age_from ?? '0',
            'العمر إلى' => $request->age_to ?? '25',
        ];
    }

    /**
     * ترجع البيانات
     */
    public function collection()
    {
        return Orphan::sponsoredWithRelationsFilters($this->request)->get();
    }

    /**
     * مكان بداية الجدول (بعد الفلاتر)
     */
    public function startCell(): string
    {
        return 'A6'; // خلي الجدول يبدأ من الصف 6
    }

    /**
     * عناوين الأعمدة
     */
    public function headings(): array
    {
        return [
            'الكود الداخلي',
            'الكود الخارجي',
            'الاسم',
            'مقدم ل',
            'المحافظة',
            'العمر',
            'الداعم',
            'الهاتف',
        ];
    }

    /**
     * تنظيم كل صف قبل التصدير
     */
    public function filter(Request $request)
    {
        $query = Orphan::with('profile');

        // فلترة حسب المحافظة
        if ($request->has('governorate') && $request->governorate != '') {
            $query->whereHas('profile', function($q) use ($request) {
                $q->where('governorate', $request->governorate);
            });
        }

        // فلترة حسب العمر
        if ($request->has('age_from') && $request->age_from != '') {
            $query->whereHas('profile', function($q) use ($request) {
                $q->whereDate('birth_date', '<=', now()->subYears($request->age_from));
            });
        }

        if ($request->has('age_to') && $request->age_to != '') {
            $query->whereHas('profile', function($q) use ($request) {
                $q->whereDate('birth_date', '>=', now()->subYears($request->age_to));
            });
        }

        $orphans = $query->get();

        return response()->json($orphans);
    }


    /**
     * ستايل الملف
     */
    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:G1');
        $sheet->setCellValue('A1', 'تقرير الأيتام المكفولين');
        $sheet->getStyle('A1')->getFont()->setSize(16)->setBold(true);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        $row = 3;
        foreach ($this->filters as $key => $value) {
            $sheet->setCellValue("A{$row}", $key);
            $sheet->setCellValue("B{$row}", $value);
            $sheet->getStyle("A{$row}")->getFont()->setBold(true);
            $row++;
        }

        $sheet->getStyle('A6:G6')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => 'solid',
                'color' => ['rgb' => '4F81BD'],
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
        ]);

        foreach (range('A', 'G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        return [];
    }
}
