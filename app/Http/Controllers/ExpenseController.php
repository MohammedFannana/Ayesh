<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Expense;
use App\Models\Orphan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ExpenseController extends Controller
{
    public function index(Request $request){

        $expenses = Expense::with(['orphan:id,name'])
        ->when($request->search, function ($builder, $value) {
            $builder->whereHas('orphan', function ($query) use ($value) {
                $query->where('name', 'LIKE', "%{$value}%");
            });
        })
        ->get();

        $balanceAmount = Balance::sum('amount');

        // جمع المبالغ من جدول Expense
        $expenseAmount = Expense::sum('amount');


        return view('pages.money.amounts_paid.index' , compact('expenses' , 'balanceAmount' , 'expenseAmount'));

    }

    public function create(){

        $orphans = Orphan::where('status' , 'sponsored')->get(['id' , 'internal_code' , 'name' ]);

        return view('pages.money.amounts_paid.create' ,compact('orphans'));

    }

    public function store(Request $request){

        $request->merge([
            'payment_date' => now()->format('Y-m-d'),
        ]);


        $validated = $request->validate([
            'orphan_id' => ['required', 'exists:orphans,id'],
            'orphan_id_1' => ['required', 'exists:orphans,id' ,'same:orphan_id'], // يجب أن يكون مطابقًا للقائمة الأولى
            'amount' => ['required' , 'string'],
            'payment_date' => ['required' , 'date'],
            'payment_image' => ['required','image' ,'mimes:png,jpg,jpeg', // يسمح فقط بملفات PNG و JPG/JPEG
                                    'dimensions:min_width=100,min_height=100','max:1048576',],

        ]);


        $orphan_name = Orphan::where( 'id' , $validated['orphan_id'])->value('name');


        if ($request->hasFile('payment_image')) {    //to check if image file is exit
            $file = $request->file('payment_image');
            $fileName = uniqid(). $request->input('orphan_id') . '_وصل_استلام_مبلغ' . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('orphans/' . $orphan_name , $fileName, 'public');
            $validated['payment_image'] = $path;
        }

        Expense::create([
            'orphan_id' => $validated['orphan_id'],
            'amount' => $validated['amount'],
            'payment_date' => $validated['payment_date'],
            'payment_image' => $validated['payment_image']

        ]);

        return redirect()->route('expenses.index')->with('success' , 'تم صرف المبلغ من الى اليتيم بنجاح');

        // dd($validated);

    }

    public function destroy(string $id){
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->back()->with('success' , 'تم حذف المبلغ  بنجاح');
    }
}
