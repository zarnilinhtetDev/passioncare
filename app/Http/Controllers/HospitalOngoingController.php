<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Patient;
use App\Models\MoDoctor;
use App\Models\MoHospital;
use App\Models\TicketStage;
use App\Models\TimeSetting;
use Illuminate\Http\Request;
use App\Models\PatientAddress;
use App\Models\HospitalBooking;
use App\Models\HospitalOngoing;
use App\Models\PatientHealthRecord;

class HospitalOngoingController extends Controller
{
    public function assignView(Ticket $ticket)
    {
        return redirect()->route('doctor', [
            "ticket" => $ticket,
        ]);
    }
    //
    public function assignDoctor(Request $request, MoDoctor $doctor)
    {

        $ticket = Ticket::find($request->ticket_id);
        $ticket_stage = $ticket->ticketStage;
        $ticket_stage->ticket_stage = "BookingStageToHospital";
        $ticket_stage->update();
        // $ticket->waiting_time = (int) ceil($waiting_time);
        // $ticket->waiting_qty = $ticket_qty;
        // $ticket->update();

        $conservation = PatientHealthRecord::where("id", $ticket->conservation_id)->where("date", null)->get()->first();
        // dd($conservation);
        if ($conservation) {
            $conservation->date = $request->appointment_date;
            // $conservation->waiting_time = (int) ceil($waiting_time);
            // $conservation->waiting_qty = $ticket_qty;
            $conservation->update();
        }

        // $ticket->assigned = "yes";
        $ticket->doctor_id = $doctor->id;
        $ticket->appointment = $request->appointment_date;
        $ticket->ticket_stage = "BookingStageToHospital";
        $ticket->update();

        $hospital_ongoing = new HospitalOngoing();
        $hospital_ongoing->ticket_id = $ticket->id;
        $hospital_ongoing->doctor_id = $doctor->id;
        $hospital_ongoing->patient_id = $ticket->patient->id;
        $hospital_ongoing->patient_name = $ticket->patient->name;
        $hospital_ongoing->phno = $ticket->patient->phno;
        $hospital_ongoing->doctor_name = $doctor->doctor_name;
        $hospital_ongoing->appointment_date = $request->appointment_date;
        $hospital_ongoing->mo_remark = $ticket->ticketStage->mo_remark ?? null;
        $hospital_ongoing->hospital_names = $request->hospital_name;
        $hospital_ongoing->ticket_stage = "BookingStageToHospital";
        $hospital_ongoing->save();

        return redirect('mo_home');
    }

    public function viewOngoing()
    {
        if (auth()->user()->type == 'hospital') {
            // $hospital = MoHospital::latest()->first();
            $hospital_ongoings = HospitalOngoing::where('hospital_names', auth()->user()->name)->latest()->get();
        } else {
            $hospital_ongoings = HospitalOngoing::latest()->get();
        }
        return view('mo.home.hospital_ongoing', compact('hospital_ongoings'));
    }

    public function hospital_view_all_patient()
    {
        $patientAddresses = PatientAddress::latest()->get();
        $patients = Patient::where('mo_id', auth()->user()->id)->latest()->get();
        return view('mo.patient.hospital_view_all_patient', compact('patients', 'patientAddresses'));
    }

    public function callHospital(HospitalOngoing $hospitalOngoing)
    {
        // dd("hit");

        $hospitalOngoing->ticket->assigned = "yes";
        $hospitalOngoing->ticket->update();

        $hospitalOngoing->called = "yes";
        $hospitalOngoing->update();
        return redirect("/");
    }

    public function viewHospitalIncoming()
    {
        $hospital_ongoings = HospitalOngoing::where('hospital_names', auth()->user()->name)->latest()->get();
        return view('master.view_hospital_incoming', compact('hospital_ongoings'));
    }

    public function completeHospital(HospitalOngoing $hospitalOngoing)
    {
        $ticket_id = $hospitalOngoing->ticket->id;
        $ticketStage = TicketStage::where("ticket_id", $ticket_id)->get()->first();
        $ticketStage->ticket_stage = "MoReviewStage";
        $ticketStage->update();

        $hospitalOngoing->ticket->ticket_stage = "MoReviewStage";
        $hospitalOngoing->ticket->update();

        $hospitalOngoing->ticket_stage = "MoReviewStage";
        $hospitalOngoing->update();
        return redirect("/");
    }

    public function hospitalCompleted()
    {
        $hospital_ongoings = HospitalOngoing::where('hospital_names', auth()->user()->name)->latest()->get();
        return view('master.view_hospital_completed', compact('hospital_ongoings'));
    }
}
