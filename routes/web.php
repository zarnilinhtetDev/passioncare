<?php

use App\Models\HospitalBooking;
use App\Models\HospitalOngoing;
use App\Http\Middleware\CheckMo;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckPatient;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\MoDoctorController;
use App\Http\Controllers\MoOngoingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\MoHospitalController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HospitalBookingController;
use App\Http\Controllers\HospitalOngoingController;
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
Route::post('/user_login', [LoginController::class, 'userLogin'])->name('user_login');
Auth::routes();
Route::get('/forget_password', [LoginController::class, 'forgetPassword'])->name('forget_password');
Route::get('/terms_of_use', [LoginController::class, 'termOfUse'])->name('terms_of_use');
Route::get('/back', function () {
    return redirect("/");
});

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.auth');
Route::get('/google/callback', [GoogleController::class, 'callbackGoogle']);


Route::middleware('auth')->group(function () {

    Route::get('/home', [LandingPageController::class, 'index'])->name('home')->middleware(CheckMo::class);
    Route::get('/termsofuse', [LandingPageController::class, 'termsOfUse'])->name('termsofuse');
    //Profile
    Route::get('patientProfile', [PatientController::class, 'index'])->name('profile');
    Route::get('profile_edit', [PatientController::class, 'profile_edit']);
    Route::post('profile_update/{id}', [PatientController::class, 'profile_update']);

    //Doctor
    Route::get('/doctor', [DoctorController::class, 'index']);
    Route::post('/doctor', [DoctorController::class, 'index'])->name('doctor_search');

    //User Hospital
    Route::get('/hospital', [HospitalController::class, 'index']);

    //Booking
    Route::get('booking_req/{id}', [HospitalBookingController::class, 'index']);
    Route::post('booking_save/{id}', [HospitalBookingController::class, 'save']);
    Route::get('ticket_info/{hospitalBooking}', [HospitalBookingController::class, 'viewInfo'])->name('viewInfo');
    Route::get('ticket/{patientHealthRecord}', [HospitalBookingController::class, 'index_info'])->name('ticketInfo');

    // Route::get('booking_edit/{id}', [HospitalBookingController::class, 'edit'])->name('edit.booking');
    Route::post('booking_update/{hospitalBooking}', [HospitalBookingController::class, 'update'])->name('update.booking');
    Route::post('token_no/{hospitalBooking}', [HospitalBookingController::class, 'token_no'])->name('token_no');
    Route::get('/view_all_booking', [HospitalBookingController::class, 'viewAllBooking'])->name('all.booking');
    Route::get('view_all_booking_reason', [HospitalBookingController::class, 'booking_request_reason'])->name('booking_request_reason');

    Route::get('reason/{id}', [HospitalBookingController::class, 'booking_reason_view']);
    Route::post('patient_health_record_store/{patient}', [PatientController::class, 'patient_health_record_store']);
    // Route::get('patient_health_record_edit/{id}', [PatientController::class, 'patient_health_record_edit']);
    Route::post('patient_health_record_update/{healthRecord}', [PatientController::class, 'patient_health_record_update']);

    //Ticket
    Route::get('ticket_info', [TicketController::class, 'ticket_info'])->name("ticket_info");
    Route::get('ticket', [TicketController::class, 'index']);
    Route::get('view_ticket/{ticket}', [TicketController::class, 'view_ticket']);
    Route::get('create_ticket/{health_record}', [TicketController::class, 'createTicket']);
    Route::post('savePatient/{patientHealthRecord}', [TicketController::class, 'savePatient'])->name('savePatient');
    Route::post('save_medical_history/{patient}', [TicketController::class, 'saveMedicalHistory'])->name('saveMedicalHistory');
    Route::post('save_ticket_stage', [TicketController::class, 'saveTicketStage'])->name('saveTicketStage');
    Route::post('save_physical_examination', [TicketController::class, 'savePhysicalExamination'])->name('savePhysicalExamination');
    Route::post('save_physical_examination_finding', [TicketController::class, 'savePhysicalExaminationFinding'])->name('savePhysicalExaminationFinding');
    Route::post('save_physical_examination_finding_2', [TicketController::class, 'savePhysicalExaminationFinding2'])->name('savePhysicalExaminationFinding2');
    Route::post('save_diagnosis', [TicketController::class, 'saveDiagnosis'])->name('saveDiagnosis');
    Route::post('mo_remark/{patient}', [TicketController::class, 'mo_remark'])->name('mo_remark');
    Route::post('medical_visit/{patient}', [TicketController::class, 'medical_visit'])->name('medical_visit');
    Route::post('follow_up_plan/{patient}', [TicketController::class, 'follow_up_plan'])->name('follow_up_plan');
    Route::post('Referral_to_specialist/{patient}', [TicketController::class, 'Referral_to_specialist'])->name('Referral_to_specialist');
    Route::post('treatment_plan_procedure/{patient}', [TicketController::class, 'treatment_plan_procedure'])->name('treatment_plan_procedure');
    Route::post('treatment_plan_medical/{patient}', [TicketController::class, 'treatment_plan_medical'])->name('treatment_plan_medical');

    //update ticket
    Route::get('edit_ticket/{ticket}', [TicketController::class, 'editTicket'])->name('editTicket');
    Route::post('update_medical_history/{ticket}', [TicketController::class, 'updateMedicalHistory'])->name('updateMedicalHistory');
    Route::post('update_ticket_stage/{ticket}', [TicketController::class, 'updateTicketStage'])->name('updateTicketStage');
    Route::post('update_physical_examination/{ticket}', [TicketController::class, 'updatePhysicalExamination'])->name('updatePhysicalExamination');
    Route::post('update_physical_examination_finding/{ticket}', [TicketController::class, 'updatePhysicalExaminationFinding'])->name('updatePhysicalExaminationFinding');
    Route::post('update_physical_examination_finding_2/{ticket}', [TicketController::class, 'updatePhysicalExaminationFinding2'])->name('updatePhysicalExaminationFinding2');
    Route::post('update_diagnosis/{ticket}', [TicketController::class, 'updateDiagnosis'])->name('updateDiagnosis');
    Route::post('Update_Referral_to_specialist/{ticket}', [TicketController::class, 'updateReferal'])->name('updateReferal');
    Route::post('update_follow_up_plan/{ticket}', [TicketController::class, 'updateFollowup'])->name('updateFollowup');
    Route::post('update_mo_remark/{ticket}', [TicketController::class, 'updateMoremark'])->name('updateMoremark');
    Route::post('update_treatment_plan_medical/{ticket}', [TicketController::class, 'updateTreatmentMedical'])->name('updateTreatmentMedical');
    Route::post('update_treatment_plan_procedure/{ticket}', [TicketController::class, 'updateTreatmentProcedure'])->name('updateTreatmentProcedure');
    Route::post('update_medical_visit/{ticket}', [TicketController::class, 'updateMedicalVisit'])->name('updateMedicalVisit');

    Route::get('delete_ticket/{ticket}', [TicketController::class, 'ticketDelete'])->name('delete_ticket');
    Route::get('/view_all_ticket', [TicketController::class, 'viewAllTicket'])->name('view_all_tikcets');

    // Hospital
    Route::get('/hospitalProfile', [HospitalController::class, 'hospitalProfile'])->name('hospitalProfile');
    Route::get('/hospitalEdit/{hospital}', [HospitalController::class, 'hospitalEdit'])->name('hospitalEdit');
    Route::post('/hospitalUpdate/{id}', [HospitalController::class, 'hospitalUpdate'])->name('hospitalUpdate');
    Route::get('/call_hospital_patient/{hospitalOngoing}', [HospitalOngoingController::class, 'callHospital'])->name('callHospitalPatient');
    Route::get('/hospital_ongoing_complete/{hospitalOngoing}', [HospitalOngoingController::class, 'completeHospital'])->name('callHospitalPatient');
    Route::get('/hospital_incoming_patient', [HospitalOngoingController::class, 'viewHospitalIncoming'])->name('viewHospitalIncoming');

    Route::get('get_part_data_hospital', [MoDoctorController::class, 'getHospitalData'])->name('get.part.data_hospital');
    Route::post('get_part_data_doctor_specilization', [MoDoctorController::class, 'getDoctorSpecilization'])->name('get.part.data_doctor_specilization');
    Route::post('get_part_data_hospital', [MoDoctorController::class, 'getHospitalAddressAndGoogleLink'])->name('get.part.data_hospital');

    Route::middleware(CheckPatient::class)->group(function () {
        //mo setting
        Route::get('calculate_time_setting', [HomeController::class, 'calculateTime']);
        Route::post('save_time_setting', [HomeController::class, 'saveCalculateTime']);
        //MO
        Route::get('mo_home', [HomeController::class, 'mo_home'])->name('mo_home');
        Route::get('call_patient/{ticket}', [HomeController::class, 'callPatient'])->name('call_patient');
        Route::get('/view_moongoing', [HomeController::class, 'viewMoOngoing'])->name('viewMoOngoing');
        Route::get('/admin_review', [HomeController::class, 'adminReview'])->name('adminReview');
        Route::get('/view_completed', [HomeController::class, 'viewCompleted'])->name('viewCompleted');
        Route::get('/medical_record/{ticket}', [HomeController::class, 'viewMedicalRecord'])->name('viewMedicalRecord');
        Route::get('/health_record/{ticket}', [HomeController::class, 'viewHealthRecord'])->name('viewHealthRecord');

        Route::get('/assign/{ticket}', [HospitalOngoingController::class, 'assignView'])->name('assignView');
        Route::post('/assign_doctor/{doctor}', [HospitalOngoingController::class, 'assignDoctor'])->name('assign');
        Route::get('/view_hospital_ongoing', [HospitalOngoingController::class, 'viewOngoing'])->name('viewOngoing');
        Route::get('/hospital_completed', [HospitalOngoingController::class, 'hospitalCompleted'])->name('hospitalCompleted');

        //User
        Route::get('/user', [LandingPageController::class, 'user'])->name('user');
        Route::post('/userCreate', [LandingPageController::class, 'userCreate'])->name('userCreate');
        Route::get('/userDelete/{id}', [LandingPageController::class, 'userDelete'])->name('userDelete');
        Route::get('/userEdit/{id}', [LandingPageController::class, 'userEdit'])->name('userEdit');
        Route::post('/userUpdate/{user}', [LandingPageController::class, 'userUpdate'])->name('userUpdate');

        //Mo Doctor
        Route::get('/mo_doctor', [MoDoctorController::class, 'index'])->name('doctor');
        Route::post('/doctor_register', [MoDoctorController::class, 'store'])->name('doctor_register');
        Route::post('/mo_doctor', [MoDoctorController::class, 'index'])->name('mo_doctor_search');
        Route::get('/doctor_edit/{id}', [MoDoctorController::class, 'edit'])->name('doctor#doctor_edit');
        Route::get('/deleteDoctor/{id}', [MoDoctorController::class, 'deleteDoctor'])->name('doctor#deleteDoctor');
        Route::post('/updateDoctor/{id}', [MoDoctorController::class, 'updateDoctor'])->name('updateDoctor');
        Route::get('/doctorDetail/{doctor}', [MoDoctorController::class, 'doctorDetail'])->name('doctorDetail');

        //MO Hospital
        Route::get('/mo_hospital', [MoHospitalController::class, 'index'])->name('hospital');
        Route::post('/hospital_register', [MoHospitalController::class, 'store']);
        Route::get('/hospital_edit/{id}', [MoHospitalController::class, 'edit'])->name('hospital.edit');
        Route::post('/hospital_update/{id}', [MoHospitalController::class, 'update'])->name('hospital.update');
        Route::get('/hospital_delete/{hospital}', [MoHospitalController::class, 'delete'])->name('hospital.delete');

        //MO Patient

        Route::get('/patient_register', [PatientController::class, 'moPatient'])->name('patient.register');
        Route::post('/patient_register/{id}', [PatientController::class, 'store'])->name('patient.add');
        Route::get('/patient_edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
        Route::post('/patient_update/{id}', [PatientController::class, 'update'])->name('patient.update');
        Route::get('/patient_delete/{patient}', [PatientController::class, 'delete'])->name('patient.delete');
        Route::get('/view_all_patient', [PatientController::class, 'viewAllPatient'])->name('view.patients');
        Route::get('/view_incoming_patient', [PatientController::class, 'viewIncomingPatient'])->name('incoming.patients');
        Route::get('/hospital_view_all_patient', [HospitalOngoingController::class, 'hospital_view_all_patient'])->name('hospital_view_all_patient');
    });
});
