<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\MoDoctor;
use App\Models\MoHospital;
use Illuminate\Http\Request;
use App\Models\HospitalBooking;
use App\Models\PatientInsurance;
use App\Models\PatientEmergencyInfo;

class HospitalBookingController extends Controller
{
    public function index()
    {
        $doctors = MoDoctor::latest()->get();
        $hospitals = MoHospital::latest()->get();
        // $patient = Patient::where('user_id', auth()->user()->id)->first();
        // $bookings = HospitalBooking::where('patient_id', auth()->user()->id)->get();
        // if ($patient)
        return view('patient.hospital_booking.index', compact('doctors', 'hospitals'));
        // else
        // return view('master.index',compact('patient','bookings'))->with('warning2', 'User information is not complete!');
    }
    public function save(Request $request)
    {
        $hospital_booking = new HospitalBooking();
        $hospital_booking->patient_id = auth()->user()->id;
        $hospital_booking->hospital_name = $request->hospital_name;
        $hospital_booking->doctor_name = $request->doctor_name;
        $hospital_booking->specilist = $request->specilist;
        $hospital_booking->save();
        $ticket_no = '';
        $no = count(HospitalBooking::all()->get);
        if ($no < 10) {
            $ticket_no = 'ERS00000' . $no;
        }
        if ($no >= 10 && $no < 100) {
            $ticket_no = 'ERS0000' . $no;
        }
        if ($no >= 100 && $no < 1000) {
            $ticket_no = 'ERS000' . $no;
        }
        if ($no >= 1000 && $no < 10000) {
            $ticket_no = 'ERS00' . $no;
        }
        if ($no >= 10000 && $no < 100000) {
            $ticket_no = 'ERS0' . $no;
        }
        return view('patient.hospital_booking.ticket', compact('ticket_no'));
    }

    public function booking_reason_view()
    {
        // $patient = Patient::where('user_id', auth()->user()->id)->first();
        // $bookings = HospitalBooking::where('patient_id', auth()->user()->id)->get();
        // if ($patient)
        return view('patient.hospital_booking.booking_reason');
        // else
        // return view('master.index',compact('patient','bookings'))->with('warning', 'User information is not complete!');
    }
}
