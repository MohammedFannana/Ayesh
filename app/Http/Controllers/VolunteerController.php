<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                                'mimes:png,jpg,JPEG', // يسمح فقط بملفات PNG و JPG/JPEG
                                'dimensions:min_width=100,min_height=100',
            ],
            'languages' => ['required', 'json'], // تحقق من أن القيمة JSON
            'area' => ['required', 'json'], // تحقق من أن القيمة JSON
        ]);



        if ($request->hasFile('selfie_image')) {    //to check if image file is exit
            $file = $request->file('selfie_image');
            $fileName = $request->input('name') . '.' . $file->getClientOriginalExtension();
            // $path = $file->storeAs("volunteers", $fileName, 'public');
            // $file->store()
            // $valideted['selfie_image'] = $path;
            $path = $file->store('volunteers', 'public');
            // استبدال اسم الملف الافتراضي باسم مخصص
            $newPath = "volunteers/{$fileName}";
            Storage::disk('public')->move($path, $newPath);

            $validated['selfie_image'] = $newPath;
            // dd($valideted['selfie_image']);
        }

        $validated['area'] = json_decode($validated['area'], true);
        $validated['languages'] = json_decode($validated['languages'], true);

        Volunteer::create($validated);
        return redirect()->route('volunteer.index')->with('success', __('تمت اضافة المتطوع بنجاح'));
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
