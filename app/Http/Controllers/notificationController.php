<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function index(){
        $notifications = auth()->user()->notifications;
        return view('pages.notification' , compact('notifications'));
    }
}
