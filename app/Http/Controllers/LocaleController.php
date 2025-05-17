<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocaleController extends Controller
{
    public function changeLocale(string $locale){

        if(!in_array($locale, ['en', 'ar'])){
            abort(400);
        }

        $user = Auth::user();

        DB::table('users')
            ->where('id', $user->id)
            ->update(['locale' => $locale]);

        return redirect()->back();
    }

}
