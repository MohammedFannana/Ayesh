<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $donors = Donor::when($request->search, function ($builder, $value) {
            $builder->where('name', 'LIKE', "%{$value}%");
        })->paginate(10);
        $count = $donors->total(); // هذا يعطي العدد الكلي للمتبرعين
        return view('pages.donors.index' , compact('donors' , 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $donor = new Donor();
        return view('pages.donors.create' , compact('donor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['string' , 'required'],
            'country' => ['string' , 'required'],
            'phone' => ['string' , 'required' , 'unique:donors,phone'],
            'fax' => ['string' , 'required'],
            'website' => ['string' , 'required'],
            'email' => ['string' , 'required' ,'email' , 'unique:donors,email'],
            'address' => ['string' , 'required'],
        ]);

        Donor::create($validated);
        return redirect()->back()->with('success', __('تمت اضافة المتبرع بنجاح'));


    }

    /**
     * Display the specified resource.
     */
    public function show(Donor $donor)
    {
        return view('pages.donors.view' , compact('donor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donor $donor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donor $donor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donor $donor)
    {
        $donor->delete();
        return redirect()->route('donor.index')->with('success' , __(' تم حذف المتبرع بنجاح '));
    }
}
