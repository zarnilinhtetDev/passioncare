<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Ticket;
use App\Models\Patient;
use App\Models\MoDoctor;
use App\Models\MoDoctor2;
use App\Models\MoHospital;
use App\Models\TicketStage;
use App\Models\TimeSetting;
use Illuminate\Http\Request;
use App\Models\PatientAddress;
use App\Models\HospitalBooking;
use App\Models\HospitalOngoing;
use Illuminate\Support\Facades\DB;
use App\Models\PatientHealthRecord;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function mo_home()
    {
        $patients = Patient::latest()->get();
        $patientAddresses = PatientAddress::latest()->get();
        $bookings = HospitalBooking::latest()->get();
        $patient_records = PatientHealthRecord::latest()->get();
        // dd($patient_records);
        $tickets = Ticket::latest()->get();
        // dd($tickets->ticketStage->ticket_stage);
        $hospital_ongoings = HospitalOngoing::latest()->get();
        // $ticket_stages = TicketStage::latest()->get();
        $time_setting = TimeSetting::latest()->first();
        // dd($time_setting);
        if ($time_setting == null) {
            return redirect("calculate_time_setting");
        } else {
            return view('mo.home.index', compact('patients', 'patientAddresses', 'bookings', 'patient_records', 'tickets', 'hospital_ongoings'));
        }
    }

    public function callPatient(Ticket $ticket)
    {
        // $health_record = PatientHealthRecord::where("id", $ticket->conservation_id)->get()->first();
        // $health_record->ticket_created = "yes";
        // $health_record->update();

        $ticket->called = "yes";

        $ticket->update();
        return redirect("mo_home");
    }

    public function viewMoOngoing()
    {
        $patients = Patient::latest()->get();
        $tickets = Ticket::latest()->get();
        return view('mo.patient.view_moongoing', compact('patients', 'tickets'));
    }

    public function adminReview()
    {
        $tickets = Ticket::latest()->get();
        return view('mo.home.admin_review', compact('tickets'));
    }

    public function viewCompleted()
    {
        $tickets = Ticket::latest()->get();
        return view('mo.home.view_completed', compact('tickets'));
    }

    public function viewMedicalRecord(Ticket $ticket)
    {
        $patient = $ticket->patient;
        $medical_records = HospitalOngoing::where("patient_id", $patient->id)->where("ticket_stage", "CompleteStage")->latest()->get();
        $tickets = Ticket::where("patient_id", $patient->id)->where("ticket_stage", "CompleteStage")->latest()->get();
        return view('mo.home.medical_record', compact('medical_records','tickets'));
    }
    public function viewHealthRecord(Ticket $ticket)
    {
        $patient = $ticket->patient;
        $tickets = Ticket::where("patient_id", $patient->id)->where("ticket_stage", "CompleteStage")->latest()->get();
        $medical_records = HospitalOngoing::where("patient_id", $patient->id)->where("ticket_stage", "CompleteStage")->latest()->get();
        // dd($tickets);
        return view('mo.home.health_record', compact('patient', 'tickets','medical_records'));
    }

    public function calculateTime()
    {
        $time = TimeSetting::latest()->first();
        return view('mo.home.time_setting', compact("time"));
    }

    public function saveCalculateTime(Request $request)
    {
        DB::table('time_settings')->delete();
        DB::statement('ALTER TABLE time_settings AUTO_INCREMENT = 1;');

        TimeSetting::create($request->all());
        return redirect('/')->with("success", "Time Setting Save!");
    }
}
