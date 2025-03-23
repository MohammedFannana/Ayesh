<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Donor;
use App\Models\Expense;
use App\Models\Supporter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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
        $expenseAmount = Expense::sum('amount');


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

        ]);


        $supporter_name = Supporter::where( 'id' , $validated['supporter_id'])->value('name');


        if ($request->hasFile('payment_image')) {    //to check if image file is exit
            $file = $request->file('payment_image');
            $fileName = Str::uuid() . '_وصل_استلام_مبلغ' . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('balance/' . $supporter_name , $fileName, 'public');
            $validated['payment_image'] = $path;
        }

        Balance::create([
            'supporter_id' => $validated['supporter_id'],
            'amount' => $validated['amount'],
            'payment_date' => $validated['payment_date'],
            'payment_image' => $validated['payment_image']

        ]);

        return redirect()->route('balance.index')->with('success' , 'تم أضافة المبلغ من قبل الجمعية بنجاح');

        // dd($validated);

    }

    public function destroy(Balance $balance){
        $balance->delete();

        return redirect()->back()->with('success' , 'تم حذف المبلغ  بنجاح');
    }
}
