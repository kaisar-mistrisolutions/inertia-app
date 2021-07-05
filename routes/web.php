<?php

use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\PersonalInformationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// });

Route::get('/about', function () {
    return Inertia::render('About');
});

Route::get('/contact', function () {
    return Inertia::render('Contact');
});

Route::get('/',[PersonalInformationController::class,'index'])->name('pi.home');

Route::get('personal/information/create',[PersonalInformationController::class,'create'])->name('pi.create');
Route::post('personal/information/submit',[PersonalInformationController::class,'store'])->name('pi.store');
