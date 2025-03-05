<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $volunteers = Volunteer::when($request->search, function ($builder, $value) {
            $builder->where('name', 'LIKE', "%{$value}%");
        })->paginate(10);
        $count = $volunteers->total();
        return view('pages.volunteers.index' , compact('volunteers' , 'count'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.volunteers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['string' , 'required'],
            'country' => ['string' , 'required'],
            'phone' => ['string' , 'required'],
            'email' => ['string' , 'email' , 'required'],
            'address' => ['string' , 'required'],
            'selfie_image' => ['required' , 'image', 'max:1048576', // 1MB
                                'mimes:png,jpg', // يسمح فقط بملفات PNG و JPG/JPEG
                                'dimensions:min_width=100,min_height=100',
            ],
        ]);

        if ($request->hasFile('selfie_image')) {    //to check if image file is exit
            $file = $request->file('selfie_image');
            $path = $file->store('volunteers/selfie_image', 'public');  //store image in public disk insde storge folder inside  folder ,'public' or['disk' => 'public]
            $valideted['image'] = $path;
        }

        Volunteer::create($validated);
        return redirect()->back()->with('success', __('تمت اضافة المتطوع بنجاح'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Volunteer $volunteer)
    {
        return view('pages.volunteers.view' , compact('volunteer'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->route('volunteer.index')->with('success' , __(' تم حذف المتطوع بنجاح '));
    }
}
