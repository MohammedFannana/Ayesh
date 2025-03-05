<?php

use App\Http\Controllers\DonorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredOrphanController;
use App\Http\Controllers\SupporterController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Route;

Route::resource('/supporter' , SupporterController::class);
Route::resource('/donor' , DonorController::class);
Route::resource('/volunteer' , VolunteerController::class);

Route::prefix('orphans')->name('orphan.')->group(function(){

    Route::resource('/registered' , RegisteredOrphanController::class);
    Route::get('/registered/details/{registered}' , [RegisteredOrphanController::class , 'details'])->name('registered.details');

});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
