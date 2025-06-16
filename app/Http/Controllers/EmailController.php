<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;
use App\Notifications\ContactMessageNotification;
use Illuminate\Support\Facades\Notification;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // الإيميل الثابت الذي سيستلم الإشعار
        $adminEmail = 'support@ayesh.org';

        // إرسال إشعار إلى بريد إلكتروني معيّن
        Notification::route('mail', $adminEmail)
            ->notify(new ContactMessageNotification($request->message, $request->email));

        return back()->with('success', 'تم إرسال الرسالة بنجاح.');
    }
}
