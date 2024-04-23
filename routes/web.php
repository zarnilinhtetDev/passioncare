<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\LandingPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('landing_page.index');
// });

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [LandingPageController::class, 'index']);

    //Doctor
    Route::get('/doctor', [DoctorController::class, 'index']);
    Route::get('/doctor_edit', [DoctorController::class, 'edit']);

    //Hospital
    Route::get('/hospital', [HospitalController::class, 'index']);
    Route::get('/hospital_edit', [HospitalController::class, 'edit']);
});
