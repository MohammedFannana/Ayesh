<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Expense;
use App\Models\ExpenseOrphan;
use App\Models\Orphan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;



class ExpenseController extends Controller
{
    public function index(Request $request){

        // $expenses = Expense::with('expenseOrphans')
        // ->when($request->search, function ($builder, $value) {
        //     $builder->whereHas('orphan', function ($query) use ($value) {
        //         $query->where('name', 'LIKE', "%{$value}%");
        //     });
        // })
        // ->get();

        $expenses = ExpenseOrphan::
        when($request->search, function ($builder, $value) {
            $builder->whereHas('orphan', function ($query) use ($value) {
                $query->where('orphan', 'LIKE', "%{$value}%");
            });
        })
        ->get();


        $balanceAmount = Balance::sum('amount');

        // جمع المبالغ من جدول Expense
        $expenseAmount = ExpenseOrphan::sum('net_amount');


        return view('pages.money.amounts_paid.index' , compact('expenses' , 'balanceAmount' , 'expenseAmount'));

    }

    public function create(){

        // $orphans = Orphan::where('status' , 'sponsored')->get(['id' , 'internal_code' , 'name' ]);

        return view('pages.money.amounts_paid.create');

    }

    public function store(Request $request){


        $request->merge([
            'payment_date' => now()->format('Y-m-d'),
        ]);


        $validated = $request->validate([
            // 'orphan_id' => ['required', 'exists:orphans,id'],
            // 'orphan_id_1' => ['required', 'exists:orphans,id' ,'same:orphan_id'], // يجب أن يكون مطابقًا للقائمة الأولى
            // 'amount' => ['required' , 'string'],
            'start_sponsored' => ['required' , 'date'],
            'payment_date' => ['required' , 'date'],
            'payment_file' => ['required','file' ,'mimes:xlsx,xls'],

        ]);



        // $orphan_name = Orphan::where( 'id' , $validated['orphan_id'])->value('name');


        if ($request->hasFile('payment_file')) {    //to check if image file is exit
            $file = $request->file('payment_file');
            $fileName = uniqid(). 'كشف_استلام_المبلغ' . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('Expense/' , $fileName, 'public');
            $validated['payment_file'] = $path;
        }


        DB::beginTransaction();

        try {
             $expenseFile = Expense::create([
                // 'orphan_id' => $validated['orphan_id'],
                // 'amount' => $validated['amount'],
                'start_sponsored' => $validated['start_sponsored'],
                'payment_date' => $validated['payment_date'],
                'payment_file' => $validated['payment_file']

            ]);

            $spreadsheet = IOFactory::load($file->getPathname());
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // الحصول على رؤوس الأعمدة
            // $headers = array_map('trim', $rows[0]); // الصف الأول كرؤوس
            // $headers = array_map(function($h) {
            //     return trim(str_replace('%', '', $h)); // حذف %
            // }, $rows[0]);

            $rawHeaders = $rows[0];

            $headers = array_map(function ($header) {
                $header = trim($header);
                $header = str_replace('%', '', $header); // إزالة %
                $header = str_replace("\u{200f}", '', $header); // إزالة الرموز غير المرئية (مثل RTL marker)
                return $header;
            }, $rawHeaders);



            $dataRows = array_slice($rows, 1);      // باقي الصفوف

            foreach ($dataRows as $row) {
                $assoc = array_combine($headers, $row); // حول الصف إلى associative array
                // dd($assoc);
                // تأكد إن الأعمدة موجودة
                // if (!isset($assoc['start_sponsored']) || !isset($assoc['payment_date'])) {
                //     continue; // أو ارجع بخطأ
                // }

                $startDate = Carbon::parse($expenseFile->start_sponsored);
                $monthsToAdd = (int) $assoc['عدد الاشهر'];
                $endDate = $startDate->copy()->addMonths($monthsToAdd);

                // $total = floatval($assoc['المدفوع للمكفول']);
                // to clac the net_amount
                // $total = floatval($assoc['المحصل']);
                // // $adminRatio = (float) $assoc['نسبة ادارية'];
                // $adminRatioStr = $assoc['نسبة ادارية'];       // "5%"
                // $adminRatio = floatval(str_replace('%', '', $adminRatioStr));
                // $netAmount = $total - ($total * $adminRatio / 100);

                $adminRatioStr = $assoc['نسبة ادارية'];
                $adminRatioStr = str_replace('%', '', $adminRatioStr);
                $adminRatio = is_numeric($adminRatioStr) ? (float) $adminRatioStr : 0;

                // تحويل النسبة إلى رقم عشري (إذا لزم)
                $adminDecimal = $adminRatio / 100;

                // المبلغ الكلي
                $total = (float) $assoc['المحصل'];

                // احسب صافي المبلغ
                $netAmount = $total - ($total * $adminDecimal);

                $monthly_paid = $netAmount / $assoc['عدد الاشهر'];

                ExpenseOrphan::create([
                    'expense_id' => $expenseFile->id,
                    'internal_code' => $assoc['الكود الداخلي'],
                    'external_code' => $assoc['الكود الخارجي'],
                    'orphan' => $assoc['اسم اليتيم'],
                    'visa_number' => $assoc['رقم الفيزا'],
                    'bank_name' => $assoc['نوع الحساب'],
                    'guardian_name' => $assoc['اسم الوصي'],
                    'guardian_national_id' => $assoc['الرقم القومي'],
                    'orphan_number' => $assoc['عدد الأيتام'],
                    'month_number' => $assoc['عدد الاشهر'],
                    'total' => $assoc['المحصل'],
                    'orphan_paid_monthly' =>  $monthly_paid,
                    'administrative_ratio' => $adminRatio,
                    'notes' => $assoc['ملاحظات'],
                    'net_amount' => $netAmount,
                    'start_date' => $expenseFile->start_sponsored,
                    'end_date'    => $endDate->format('Y-m-d'),
                ]);
            }

            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            dd($e);
            return redirect()->back()->with('danger', __(' فشل في تسجيل البيانات. يرجى المحاولة مرة أخرى. '))->withInput();

        }

        return redirect()->route('expenses.index')->with('success' , 'تم صرف المبلغ من الى اليتيم بنجاح');

        // dd($validated);

    }

    public function destroy(string $id){
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->back()->with('success' , 'تم حذف المبلغ  بنجاح');
    }
}
