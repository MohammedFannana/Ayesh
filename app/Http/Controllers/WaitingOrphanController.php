<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use App\Models\Sponsorship;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WaitingOrphanController extends Controller
{
    public function index(Request $request){

        $orphans = Orphan::where('status', 'waiting')

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
                $query->select('phone', 'orphan_id');
            }])
            ->with(['family' => function ($query) {  // to get phone from profile table
                $query->select('address', 'orphan_id');
            }])
            ->with(['marketing' => function ($query) {  // to get only supporter data through marketing table
                $query->select('orphan_id', 'supporter_id') // اختر الحقول المطلوبة من جدول marketing
                    ->with(['supporter' => function ($query) {  // to get supporter data
                        $query->select('id', 'name'); // اختر الحقول التي تريدها من جدول supporters
                }]);
            }])
            ->paginate(8);


            $count = $orphans->total();

            // get the doner
            // $supporters = Supporter::all('id' , 'name');


            return view('pages.orphans.awaiting-orphans.index' , compact('orphans' , 'count'));

    }

    public function store(Request $request , $orphanId){

        $orphan = Orphan::findOrFail($orphanId);

        $request->merge([
            'orphan_id' => $orphanId,
            'sponsorship_date' => now()->format('Y-m-d'),
            'status' => 'sponsored'
        ]);

        $validated = $request->validate([
            'orphan_id' => ['required' , 'exists:orphans,id'],
            'supporter_id' => ['required' , 'exists:supporters,id'],
            'external_code' => ['required' , 'string'],
            'sponsorship_date' => ['required' , 'date'],
            'status' => ['required' , 'in:sponsored,finished'],

        ]);

        DB::beginTransaction();

        try {

            // dd($validated);

            $orphan->sponsorship()->create($validated);


            $orphan->update(['status' => 'sponsored']);

            DB::commit();
            return redirect()->route('orphan.waiting.index')->with('success', __('تمت كفالة اليتيم  بنجاح'));


        }catch(Exception $e){
            DB::rollBack();

            return redirect()->route('orphan.waiting.index')->with('danger', __(' فشل في كفالة اليتيم. يرجى المحاولة مرة أخرى. '));

        }

    }

    public function show(string $id){


        $orphan = Orphan::where('id', $id)
        ->where('status', 'waiting') // إضافة شرط status بعد id
        ->select('id', 'internal_code', 'name', 'application_form')
        ->with(['profile' => function ($query) {  // to get phone from profile table
            $query->select('phone', 'orphan_id');
        }])
        ->with(['image' => function ($query) {
            $query->select('orphan_id' ,'birth_certificate' , 'mother_card' ,
            'father_death_certificate' , 'mother_death_certificate');
        }])
        ->with(['certified_orphan_extras'])
        ->firstOrFail(); //

        return view('pages.orphans.awaiting-orphans.view' , compact('orphan'));
    }

    public function destroy(string $id){

        $orphan = Orphan::where('id', $id)
        ->where('status', 'waiting') // إضافة شرط status بعد id
        ->firstOrFail(); // إذا لم يكن موجودًا سيرمي استثناء

        $orphan->delete();
        return redirect()->route('orphan.waiting.index')->with('success' , __(' تم حذف اليتيم بنجاح '));

    }
}
