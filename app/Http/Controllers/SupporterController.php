<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use App\Models\Supporter;
use Illuminate\Http\Request;

class SupporterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $supporters = Supporter::when($request->search, function ($builder, $value) {
            $builder->where('name', 'LIKE', "%{$value}%");
        })->paginate(10);
        $count = $supporters ->total();
        return view('pages.supporters.index' , compact('supporters' , 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $supporter = new Supporter();
        return view('pages.supporters.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        $validated = $request->validate([
            'name' => ['string' , 'required'],
            'country' => ['string' , 'required'],
            'phone' => ['string' , 'required' , 'unique:supporters,phone'],
            'fax' => ['string' , 'required'],
            'association_name' => ['string' , 'required'],
            'department_name' => ['string' , 'required'],
            'administrator_name' => ['array' , 'required'],
            'website' => ['string' , 'required'],
            // 'email' => ['json' , 'required'],
            'emails' => ['required', 'array'],
            'emails.*' => ['email' ],
            'address' => ['string' , 'required'],

        ]);


        // dd($validated);

        Supporter::create($validated);
        return redirect()->back()->with('success', __('تمت اضافة الداعم بنجاح'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Supporter $supporter)
    {
        $supporterId = $supporter->id;

        $supporter_balances = $supporter->balances()->take(5)->get();

        $orphans = Orphan::where('status' , 'sponsored')
        ->whereHas('sponsorship', function ($query) use ($supporterId) {
            $query->where('supporter_id', $supporterId);
        })->with(['expenses:id,orphan_id,amount' , 'profile:orphan_id,phone' , 'sponsorship:orphan_id,external_code'])
        ->take(5)
        ->get();

        return view('pages.supporters.view' , compact('supporter' , 'supporter_balances' , 'orphans'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supporter $supporter)
    {
        return view('pages.supporters.edit');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supporter $supporter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supporter $supporter)
    {
        $supporter->delete();
        return redirect()->route('supporter.index')->with('success' , __(' تم حذف الداعم بنجاح '));

    }



    public function incomingStatements(Supporter $supporter){
        $supporter_name = $supporter->name;
        $supporter_balances = $supporter->balances()->paginate(10);
        return view('pages.supporters.incoming_statements' , compact('supporter_name' , 'supporter_balances'));

    }

    public function ListSponsored(Request $request, String $supporterId){

        $supporter = Supporter::where('id' , $supporterId)->select(['id','name'])->first();

        $orphans = Orphan::where('status' , 'sponsored')
        ->whereHas('sponsorship', function ($query) use ($supporterId) {
            $query->where('supporter_id', $supporterId);
        })
        ->when($request->search, function ($builder, $value) {
            $builder->where('name', 'LIKE', "%{$value}%");
        })
        ->with(['expenses:id,orphan_id,amount' , 'profile:orphan_id,phone' , 'sponsorship:orphan_id,external_code'])
        ->paginate(10);

        return view('pages.supporters.sponsored_listed' ,compact('supporter' , 'orphans'));

    }
}
