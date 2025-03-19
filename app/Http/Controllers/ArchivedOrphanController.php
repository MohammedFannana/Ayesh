<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchivedOrphanController extends Controller
{
    public function index(Request $request){

        $orphans = Orphan::where('status', 'archived')
            ->when($request->search, function ($builder, $value) {  //search input
                $builder->where('name', 'LIKE', "%{$value}%");
            })
            // إضافة الفلاتر بناءً على الـ checkboxes
            ->when($request->filter, function ($builder, $filters) { //filter input
                if (in_array('جمعية دار البر', $filters)) {
                    $builder->whereHas('marketing.donor', function ($query) {
                        $query->where('name', 'جمعية دار البر');
                    });
                }
                elseif (in_array('جمعية الشارقة', $filters)) {
                    $builder->whereHas('marketing.donor', function ($query) {
                        $query->where('name', 'جمعية الشارقة');
                    });
                }
                elseif (in_array('جمعية السيدة مريم', $filters)) {
                    $builder->whereHas('marketing.donor', function ($query) {
                        $query->where('name', 'جمعية السيدة مريم');
                    });
                }
                elseif (in_array('جمعية دبي الخيرية', $filters)) {
                    $builder->whereHas('marketing.donor', function ($query) {
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
            ->with(['sponsorship' => function ($query) {  // to get phone from profile table
                $query->select('external_code', 'orphan_id');
            }])
            ->with(['marketing' => function ($query) {  // to get only donor data through marketing table
                $query->select('orphan_id', 'donor_id') // اختر الحقول المطلوبة من جدول marketing
                    ->with(['donor' => function ($query) {  // to get donor data
                        $query->select('id', 'name'); // اختر الحقول التي تريدها من جدول donors
                }]);
            }])
            ->paginate(8);


            $count = $orphans->total();

            return view('pages.orphans.archived-orphans.index' , compact('orphans' , 'count'));

    }

    public function show(string $id){


        $orphan = Orphan::where('id', $id)
        ->where('status', 'archived') // إضافة شرط status بعد id
        ->select('id', 'internal_code', 'name', 'application_form')
        ->with(['profile' => function ($query) {  // to get phone from profile table
            $query->select('phone', 'orphan_id');
        }])
        ->with(['sponsorship' => function ($query) {  // to get phone from profile table
            $query->select('external_code', 'orphan_id');
        }])
        ->with(['image' => function ($query) {
            $query->select('orphan_id' ,'birth_certificate' , 'mother_card' ,
            'father_death_certificate' , 'mother_death_certificate');
        }])
        ->with(['certified_orphan_extras'])
        ->firstOrFail(); //

        return view('pages.orphans.archived-orphans.view', compact('orphan'));
    }


    public function destroy(string $id){

        $orphan = Orphan::where('id', $id)
        ->where('status', 'archived') // إضافة شرط status بعد id
        ->firstOrFail(); // إذا لم يكن موجودًا سيرمي استثناء

        $orphan->delete();
        return redirect()->route('orphan.archived.index')->with('success' , __(' تم حذف اليتيم بنجاح '));

    }

}
