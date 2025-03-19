<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccreditationOrphanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // بدنا نجيب الايتام الي المراجعة الاولى الهم تمت

        $orphans = Orphan::where('status' , 'under_review')
        ->when($request->search, function ($builder, $value) { //from search input
            $builder->where('name', 'LIKE', "%{$value}%");
        })->select('id', 'internal_code', 'name' ,'case_type') //to return Special fields
        ->with(['profile' => function ($query) {  // to get phone from profile table
            $query->select('id', 'phone', 'orphan_id');
        }])
        ->paginate(8);

        return view('pages.orphans.accreditation-orphans.index' , compact('orphans'));
    }
    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $orphanId)
    {
        $orphan = Orphan::findOrFail($orphanId);

        $request->merge([
            'review_number' => 'final',
            'review_date' =>now()->format('Y-m-d'),
            'orphan_id' => $orphanId,
        ]);

        $validated = $request->validate([
            'review_number'  => ['required' , 'string' , 'in:first,final'],
            'review_date' => ['required' , 'date'],
            'orphan_id' => ['required' , 'exists:orphans,id'],
            'status' => ['required' , 'in:approved,rejected'],
            'report' => ['required' , 'string'],
            'rejected_reason' => ['nullable', 'string', 'required_if:status,rejected'],
            'name' => ['required' , 'string']
        ]);


        DB::beginTransaction();

        try {

            $orphan->reviews()->create($validated);

            if ($request->status == 'approved') {
                $orphan->update(['status' => 'approved']);
            } else {
                $orphan->update(['status' => 'rejected']);
            }


            DB::commit();
            return redirect()->route('orphan.accreditation.index')->with('success', __('تمت مراجعة اليتيم مراجعة نهائية بنجاح'));


        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('orphan.accreditation.show' , $orphanId)->with('danger', __(' فشل في تسجيل بيانات مراجعة اليتيم. يرجى المحاولة مرة أخرى. '));

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $orphan = Orphan::findOrFail($id)
        // ->with(['profile' , 'guardian' , 'family' ,'image' , 'phones'])->first();

        // $review = $orphan->reviews()->where('status', 'approved')
        // ->where('review_number', 'first')->first();
        // return view('pages.orphans.accreditation-orphans.view' ,compact('orphan' , 'review'));

        $orphan = Orphan::where('id', $id)
                ->where('status', 'under_review') // إضافة شرط status بعد id
                ->with(['profile', 'guardian', 'family', 'image', 'phones' ,
                ])
                ->firstOrFail(); // إذا لم يكن موجودًا سيرمي استثناء

        $review = $orphan->reviews()->where('status', 'approved')
                ->where('review_number', 'first')->first();


        return view('pages.orphans.accreditation-orphans.view', compact('orphan' , 'review'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orphan = Orphan::findOrFail($id);
        $orphan->delete();
        return redirect()->route('orphan.accreditation.index')->with('success' , __(' تم حذف اليتيم بنجاح '));
    }
}
