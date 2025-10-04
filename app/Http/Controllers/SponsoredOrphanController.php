<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Orphan;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Models\ExpenseOrphan;
use App\Exports\OrphansExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


class SponsoredOrphanController extends Controller
{
    public function index(Request $request){
// dd($request->filter);
    $governorates = Governorate::all();
        $orphans = Orphan::sponsoredWithRelationsFilters($request)
            ->paginate(10);
            // dd($orphans);

            $count = $orphans->total();

            $governorates = Governorate::all();



         return view('pages.orphans.sponsored-orphans.index' , compact('orphans' , 'count' , 'governorates'));

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

    public function exportOrphansDataToExcel(Request $request){
        // dd($request->query());

        return Excel::download(new OrphansExport($request), 'orphans.xlsx');

    }

    public function filter(Request $request)
    {
        $query = Orphan::with('profile');

        // فلترة المحافظة
        if ($request->filled('governorate')) {
            $query->whereHas('profile', function($q) use ($request) {
                    $q->where('governorate', $request->governorate);
            });
        }

        // فلترة العمر الأدنى
        if ($request->filled('age_from')) {
            $ageFrom = $request->age_from;
            $query->where(function($q) use ($ageFrom) {
                $q->where('age', '>=', $ageFrom)
                  ->orWhere(function($q2) use ($ageFrom) {
                      $q2->whereNull('age')
                         ->whereNotNull('birth_date')
                         ->whereDate('birth_date', '<=', now()->subYears($ageFrom));
                  });
            });
        }

        // فلترة العمر الأعلى
        if ($request->filled('age_to')) {
            $ageTo = $request->age_to;
            $query->where(function($q) use ($ageTo) {
                $q->where('age', '<=', $ageTo)
                  ->orWhere(function($q2) use ($ageTo) {
                      $q2->whereNull('age')
                         ->whereNotNull('birth_date')
                         ->whereDate('birth_date', '>=', now()->subYears($ageTo));
                  });
            });
        }

        $orphans = $query->get();

        // تجهيز البيانات للـ JSON
        $data = $orphans->map(function($orphan) {
            return [
                'id' => $orphan->id,
                'internal_code' => $orphan->internal_code,
                'external_code' => optional($orphan->sponsorship)->external_code,
                'name' => $orphan->name,
                'supporter' => optional(optional($orphan->marketing)->supporter)->name,
                'phone' => optional($orphan->phones->first())->phone_number,
            ];
        });


        return response()->json($data);
    }



}
