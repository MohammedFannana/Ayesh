<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index(){

        $user = Auth::user()->type;

        if($user === "registered" || $user === 'certified' || $user === 'references' || $user === 'financial_manager'){
            return view('pages.complaints.create');
        }elseif($user === "admin"){

            $complaints = Complaint::latest()->paginate(8);
            return view('pages.complaints.index' , compact('complaints'));
        }

    }

    public function create(){

        return view('pages.complaints.create');

    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => ['required' , 'string'],
            'phone' => ['required' , 'string'],
            'email' => ['required' , 'email'],
            'content' => ['required' , 'string']
        ]);



        Complaint::create($validated);

        return redirect()->back()->with('success' , ' تم ارسال الشكوى بنجاح ');

    }
}
