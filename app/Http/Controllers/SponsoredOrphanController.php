<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExpenseOrphan;


class SponsoredOrphanController extends Controller
{
    public function index(Request $request){

        $orphans = Orphan::where('status', 'sponsored')
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
                $query->select('orphan_id');
            }])
            ->with(['family' => function ($query) {  // to get phone from profile table
                $query->select('orphan_id');
            }])
            ->with(['sponsorship' => function ($query) {  // to get phone from profile table
                $query->select('external_code', 'orphan_id');
            }])
            ->with(['marketing' => function ($query) {  // to get only supporter data through marketing table
                $query->select('orphan_id', 'supporter_id') // اختر الحقول المطلوبة من جدول marketing
                    ->with(['supporter' => function ($query) {  // to get supporter data
                        $query->select('id', 'name'); // اختر الحقول التي تريدها من جدول supporters
                }]);
            }])
            ->with('phones')
            ->paginate(10);


            $count = $orphans->total();


            return view('pages.orphans.sponsored-orphans.index' , compact('orphans' , 'count'));

    }


    public function show(string $id){


        $orphan = Orphan::where('id', $id)
            ->where('status', 'sponsored') // إضافة شرط status بعد id
            ->select('id', 'internal_code', 'name', 'application_form','birth_date')
            ->with(['profile' => function ($query) {  // to get phone from profile table
                $query->select('orphan_id' , 'mother_name');
            }])
            ->with(['sponsorship' => function ($query) {  // to get phone from profile table
                $query->select('external_code', 'orphan_id');
            }])
            ->with(['image' => function ($query) {
                $query->select('orphan_id' ,'birth_certificate' , 'mother_card' ,
                'father_death_certificate' , 'mother_death_certificate');
            }])
            ->with(['certified_orphan_extras'])
            ->with(['phones'])
        ->firstOrFail(); //

        $expenses = $orphan->expenses()->take(5)->get();


        // جمع المبالغ من جدول Expense
        // $expenseAmount = $orphan->expenses()->sum('amount');
        $expenseAmount = ExpenseOrphan::sum('net_amount');



        return view('pages.orphans.sponsored-orphans.view', compact('orphan' , 'expenses' , 'expenseAmount'));
    }


    public function destroy(string $id){

        $orphan = Orphan::where('id', $id)
        ->where('status', 'sponsored') // إضافة شرط status بعد id
        ->firstOrFail(); // إذا لم يكن موجودًا سيرمي استثناء

        $orphan->delete();
        return redirect()->route('orphan.sponsored.index')->with('success' , __(' تم حذف اليتيم بنجاح '));

    }

    public function transfers(string $id){

        $orphan = Orphan::where('id', $id)
        ->where('status', 'sponsored') // إضافة شرط status بعد id
        ->select('id','name','internal_code')
        ->with('expenses')
        ->firstOrFail();

        // $expenseAmount = $orphan->expenses()->sum('amount');
        $expenseAmount = ExpenseOrphan::sum('net_amount');

        return view('pages.orphans.sponsored-orphans.transfers_view' , compact('orphan' , 'expenseAmount'));

    }

    public function convertArchived(string $id){


        $orphan = Orphan::where('id', $id)
        ->where('status', 'sponsored')->firstOrFail();


        DB::beginTransaction();

        try
        {
            $orphan->update([
                'status' => 'archived',
            ]);

            $orphan->sponsorship()->update([
                'status' => 'finished',
            ]);

            DB::commit();
            return redirect()->route('orphan.sponsored.index')->with('success', __('تمت تحويل اليتيم الى الحالات المؤرشفة بنجاح'));

        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('orphan.sponsored.index')->with('danger', __(' فشل تحويل اليتيم الى الحالات المؤرشفة . يرجى المحاولة مرة أخرى. '));
        }

    }

}
