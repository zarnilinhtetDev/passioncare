<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
<<<<<<< HEAD
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\GoogleController;
=======
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PatientController;
>>>>>>> 730457d32a10e8da83ba460e13d365284c3e39ac
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GoogleAuthController;
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

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.auth');
Route::get('/google/callback', [GoogleController::class, 'callbackGoogle']);


Route::middleware('auth')->group(function () {
    Route::get('/home', [LandingPageController::class, 'index']);


    //Profile
    Route::get('profile', [PatientController::class, 'index']);
    Route::get('profile_edit', [PatientController::class, 'profile_edit']);
    Route::post('profile_update/{id}', [PatientController::class, 'profile_update']);

    //
    Route::get('ticket', [TicketController::class, 'index']);
    Route::get('/reason', [TicketController::class, 'reason']);
});
