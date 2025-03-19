<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Orphan;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
        $orphan_count = Orphan::where('status' , 'sponsored')->count();
        $volunteer_count = Volunteer::count();
        $donor_count = Donor::count();
        return view('pages.files.index' , compact('orphan_count' , 'volunteer_count' , 'donor_count'));
    }

    public function store(){

    }
}
