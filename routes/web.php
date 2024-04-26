<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TicketController;

use App\Http\Controllers\PatientController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\HospitalBookingController;
use App\Http\Controllers\HosptialBookingController;

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
    Route::get('/home', [LandingPageController::class, 'index'])->name('home');


    //Profile
    Route::get('profile', [PatientController::class, 'index']);
    Route::get('profile_edit', [PatientController::class, 'profile_edit']);
    Route::post('profile_update/{id}', [PatientController::class, 'profile_update']);


    //Doctor
    Route::get('/doctor', [DoctorController::class, 'index']);
    Route::get('/doctor_edit', [DoctorController::class, 'edit']);

    //Hospital
    Route::get('/hospital', [HospitalController::class, 'index']);
    Route::get('/hospital_edit', [HospitalController::class, 'edit']);

    //Booking
    Route::get('booking_req', [HospitalBookingController::class, 'index']);
    Route::post('booking_save', [HospitalBookingController::class, 'save']);

    Route::get('reason', [HospitalBookingController::class, 'booking_reason_view']);
    Route::post('patient_health_record_store', [PatientController::class, 'patient_health_record_store']);

    //Ticket
    Route::get('ticket_info', [TicketController::class, 'ticket_info']);
    Route::get('ticket', [TicketController::class, 'index']);


    //MO
    Route::get('mo_home', [HomeController::class, 'mo_home']);
});
