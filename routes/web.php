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
use App\Http\Controllers\MoDoctorController;
use App\Http\Controllers\MoHospitalController;

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
Route::get('/forget_password', [LoginController::class, 'forgetPassword'])->name('forget_password');

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
    Route::post('/doctor_search', [DoctorController::class, 'search'])->name('doctor_search');

    //Mo Doctor
    Route::get('/mo_doctor', [MoDoctorController::class, 'index'])->name('doctor');
    Route::post('/doctor_register', [MoDoctorController::class, 'store'])->name('doctor_register');
    Route::post('/mo_doctor_search', [MoDoctorController::class, 'search'])->name('mo_doctor_search');
    Route::get('/doctor_edit/{id}', [MoDoctorController::class, 'edit'])->name('doctor#doctor_edit');
    Route::get('/deleteDocter/{id}', [MoDoctorController::class, 'deleteDocter'])->name('doctor#deleteDocter');
    Route::post('/updateDoctor/{id}', [MoDoctorController::class, 'updateDoctor'])->name('updateDoctor');
    Route::get('/doctorDetail/{id}', [MoDoctorController::class, 'doctorDetail'])->name('doctorDetail');

    //User Hospital
    Route::get('/hospital', [HospitalController::class, 'index']);

    //MO Hospital
    Route::get('/mo_hospital', [MoHospitalController::class, 'index'])->name('hospital');
    Route::post('/hospital_register', [MoHospitalController::class, 'store']);
    Route::get('/hospital_edit/{hospital}', [MoHospitalController::class, 'edit'])->name('hospital.edit');
    Route::post('/hospital_update/{hospital}', [MoHospitalController::class, 'update'])->name('hospital.update');
    Route::get('/hospital_delete/{hospital}', [MoHospitalController::class, 'delete'])->name('hospital.delete');

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
