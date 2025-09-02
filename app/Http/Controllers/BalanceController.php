<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Donor;
use App\Models\Expense;
use App\Models\Supporter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ExpenseOrphan;



class BalanceController extends Controller
{
    public function index(Request $request){

        $balances = Balance::with(['supporter:id,name'])
        ->when($request->search, function ($builder, $value) {
            $builder->whereHas('supporter', function ($query) use ($value) {
                $query->where('name', 'LIKE', "%{$value}%");
            });
        })
        ->get();

        // تحديد بداية الشهر السابق
    // $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
    // // تحديد نهاية الشهر السابق
    // $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();
    // // جمع المبالغ من جدول Balance للشهر السابق
    // $balanceAmount = Balance::whereBetween('date', [$startOfLastMonth, $endOfLastMonth])
    //                         ->sum('amount');
    // // جمع المبالغ من جدول Expense للشهر السابق
    // $expenseAmount = Expense::whereBetween('date', [$startOfLastMonth, $endOfLastMonth])
    //                         ->sum('amount');

        $balanceAmount = Balance::sum('amount');

        // جمع المبالغ من جدول Expense
        $expenseAmount = ExpenseOrphan::sum('net_amount');


        return view('pages.money.amounts_received.index' , compact('balances' ,'balanceAmount' , 'expenseAmount'));

    }

    public function create(){

        $supporters = Supporter::get(['id' , 'name']);

        return view('pages.money.amounts_received.create' ,compact('supporters'));

    }

    public function store(Request $request){

        $request->merge([
            'payment_date' => now()->format('Y-m-d'),
        ]);

        $validated = $request->validate([
            'supporter_id' => ['required', 'exists:supporters,id'],
            'supporter_id_1' => ['required', 'exists:supporters,id' ,'same:supporter_id'], // يجب أن يكون مطابقًا للقائمة الأولى
            'amount' => ['required' , 'string'],
            'payment_date' => ['required' , 'date'],
            'payment_image' => ['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],

            'orphan_name' => ['required','file' ,'mimes:xlsx,xls'],
            'start_sponsored' => ['required' , 'date'],
        ]);


        $supporter_name = Supporter::where( 'id' , $validated['supporter_id'])->value('name');


        if ($request->hasFile('payment_image')) {    //to check if image file is exit
            $file = $request->file('payment_image');
            $fileName = uniqid() . '_وصل_استلام_مبلغ' . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('balance/' . $supporter_name , $fileName, 'public');
            $validated['payment_image'] = $path;
        }

        if ($request->hasFile('orphan_name')) {    //to check if image file is exit
            $file = $request->file('orphan_name');
            $fileName = uniqid() . 'أسماء الأيتام' . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('balance/Excel' . $supporter_name , $fileName, 'public');
            $validated['orphan_name'] = $path;
        }

        Balance::create([
            'supporter_id' => $validated['supporter_id'],
            'amount' => $validated['amount'],
            'payment_date' => $validated['payment_date'],
            'payment_image' => $validated['payment_image'],
            'orphan_name' => $validated['orphan_name'],
            'start_sponsored' => $validated['start_sponsored'],

        ]);

        return redirect()->route('balance.index')->with('success' , 'تم أضافة المبلغ من قبل الجمعية بنجاح');


    }

    public function destroy(Balance $balance){
        $balance->delete();

        return redirect()->back()->with('success' , 'تم حذف المبلغ  بنجاح');
    }
}
