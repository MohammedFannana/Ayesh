<?php

namespace App\Http\Controllers;

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
        $validated = $request->validate([
            'name' => ['string' , 'required'],
            'country' => ['string' , 'required'],
            'phone' => ['string' , 'required' , 'unique:donors,phone'],
            'fax' => ['string' , 'required'],
            'association_name' => ['string' , 'required'],
            'department_name' => ['string' , 'required'],
            'administrator_name' => ['string' , 'required'],
            'website' => ['string' , 'required'],
            'email' => ['string' , 'required' ,'email' , 'unique:donors,email'],
            'address' => ['string' , 'required'],

        ]);

        Supporter::create($validated);
        return redirect()->back()->with('success', __('تمت اضافة الداعم بنجاح'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Supporter $supporter)
    {
        return view('pages.supporters.view' , compact('supporter'));

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
}
