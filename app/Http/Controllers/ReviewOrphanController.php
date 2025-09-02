<?php

namespace App\Http\Controllers;

use App\Events\OrphanReviewed;
use App\Models\Orphan;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewOrphanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orphans = Orphan::where('status' , 'registered')
        ->when($request->search, function ($builder, $value) { //from search input
            $builder->where('name', 'LIKE', "%{$value}%");
        })->select('id', 'internal_code', 'name' ,'case_type') //to return Special fields
        ->with(['profile' => function ($query) {  // to get phone from profile table
            $query->select('id', 'orphan_id');
        }])
        ->with('phones')
        ->paginate(8);

        return view('pages.orphans.review-orphans.index' , compact('orphans'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $orphanId)
    {

        $orphan = Orphan::findOrFail($orphanId);

        $request->merge([
            'review_number' => 'first',
            'review_date' =>now()->format('Y-m-d'),
            'orphan_id' => $orphanId,
        ]);

        $validated = $request->validate([
            'review_number'  => ['required' , 'string' , 'in:first,final'],
            'review_date' => ['required' , 'date'],
            'orphan_id' => ['required' , 'exists:orphans,id'],
            'status' => ['required' , 'in:approved,rejected'],
            'report' => ['nullable' , 'string','required_if:status,rejected'],
            'name' => ['required' , 'string']
        ]);



        DB::beginTransaction();

        try {

            $review = $orphan->reviews()->create($validated);

            event(new OrphanReviewed($review));


            if ($request->status == 'approved') {
                $orphan->update(['status' => 'under_review']);
            } else {
                $orphan->update(['status' => 'rejected']);
            }


            DB::commit();
            return redirect()->route('orphan.review.index')->with('success', __('تمت مراجعة اليتيم مراجعة أولية بنجاح'));


        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('orphan.review.show' ,$orphan->id)->with('danger', __(' فشل في تسجيل بيانات مراجعة اليتيم. يرجى المحاولة مرة أخرى. '));

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $orphan = Orphan::findOrFail($id)->where('status' , 'registered')
        //             ->with(['profile' , 'guardian' , 'family' ,'image' , 'phones'])->first();

        //             dd($orphan);
        // return view('pages.orphans.review-orphans.view' ,compact('orphan'));

        $orphan = Orphan::where('id', $id)
                ->where('status', 'registered') // إضافة شرط status بعد id
                ->with(['profile', 'guardian', 'family', 'image', 'phones'])
                ->firstOrFail(); // إذا لم يكن موجودًا سيرمي استثناء

        return view('pages.orphans.review-orphans.view', compact('orphan'));
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orphan = Orphan::findOrFail($id);
        $orphan->delete();
        return redirect()->route('orphan.review.index')->with('success' , __(' تم حذف اليتيم بنجاح '));
    }
}
