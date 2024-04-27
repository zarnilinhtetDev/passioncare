<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Models\HospitalBooking;
use App\Models\MoDoctor;
use App\Models\MoHospital;

class HospitalBookingController extends Controller
{
    public function index()
    {
        $doctors = MoDoctor::latest()->get();
        $hospitals = MoHospital::latest()->get();
        return view('patient.hospital_booking.index', compact('doctors', 'hospitals'));
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
        return view('patient.hospital_booking.booking_reason');
    }
}
