<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\MoDoctor;
use App\Models\MoHospital;
use Illuminate\Http\Request;
use App\Models\HospitalBooking;
use App\Models\PatientHealthRecord;
use App\Models\PatientEmergencyInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class HospitalBookingController extends Controller
{
    public function index($id)
    {
        $patient = Patient::find($id);
        $doctors = MoDoctor::latest()->get();
        $hospitals = MoHospital::latest()->get();
        $patient_emergency = PatientEmergencyInfo::where('patient_id', $id)->first();
        // $patient = Patient::where('user_id', auth()->user()->id)->first();
        // $bookings = HospitalBooking::where('patient_id', auth()->user()->id)->get();
        // if ($patient)
        return view('patient.hospital_booking.index', compact('doctors', 'hospitals', 'patient', 'patient_emergency'));
        // else
        // return view('master.index',compact('patient','bookings'))->with('warning2', 'User information is not complete!');
    }
    public function save(Request $request, $id)
    {
        $patient = Patient::find($id);

        // $patient = new Patient();
        if ($patient->gender == null && $patient->nrc == null) {
            $patient->gender = $request->gender;
            $patient->nrc = $request->nrc;
            $patient->update();
        }

        $patient_emergency = PatientEmergencyInfo::where('patient_id', $id)->first();
        // dd($patient);
        // $patient_emergency =  PatientEmergencyInfo();
        if ($patient_emergency->contact_name == null && $patient_emergency->contact_number == null) {
            $patient_emergency->contact_name = $request->contact_name;
            $patient_emergency->contact_number = $request->contact_number;
            $patient_emergency->update();
        }
        // $hospital = MoHospital::where("hospital_name", "like", $request->hospital_name)->get()->first();
        // dd($hospital);
        $hospital_booking = new HospitalBooking();
        $hospital_booking->patient_id = $patient->id;
        $hospital_booking->name = $request->customer_name;
        $hospital_booking->hospital_name = $request->hospital_name;
        $hospital_booking->doctor_name = $request->doctor_name;
        $hospital_booking->hospital_address = $request->hospital_address;
        $hospital_booking->hospital_google_address_link = $request->google_link;
        $hospital_booking->specilist = $request->specilist;
        $hospital_booking->description = $request->description;
        $hospital_booking->chief_complaint = $request->chief_complaint;
        // dd($request->all());

        $ticket_no = '';
        $no = count(HospitalBooking::withTrashed()->get()) + 1;
        if ($no < 10) {
            $ticket_no = 'ERS-B00000' . $no;
        }
        if ($no >= 10 && $no < 100) {
            $ticket_no = 'ERS-B0000' . $no;
        }
        if ($no >= 100 && $no < 1000) {
            $ticket_no = 'ERS-B000' . $no;
        }
        if ($no >= 1000 && $no < 10000) {
            $ticket_no = 'ERS-B00' . $no;
        }
        if ($no >= 10000 && $no < 100000) {
            $ticket_no = 'ERS-B0' . $no;
        }
        $hospital_booking->booking_no = $ticket_no;
        $hospital_booking->save();
        $booking_data = HospitalBooking::latest()->first();
        $mo_hospitals = MoHospital::where('hospital_name', $booking_data->hospital_name)->first();
        // return view('patient.ticket.ticket_info', compact('booking_data', 'mo_hospitals', 'patient'));
        return redirect()->route('viewInfo', $booking_data->id);
    }

    public function edit($id)
    {
        $booking_data = HospitalBooking::where('id', $id)->first();
        return view('patient.hospital_booking.edit_hospital_booking', compact('booking_data'));
    }
    public function update(Request $request, HospitalBooking $hospitalBooking)
    {
        // $booking_data = HospitalBooking::where('id', $id)->first();
        // $booking_data->update($request->all());
        $hospitalBooking->date = $request->appointment_date;
        $hospitalBooking->update();

        $booking_data = $hospitalBooking;
        $date_format =  new \DateTime($hospitalBooking->date);
        return view('patient.ticket.ticket_info', compact('booking_data', 'date_format'));
    }
    public function booking_reason_view($id)
    {
        $patient = Patient::find($id);
        // $bookings = HospitalBooking::where('patient_id', auth()->user()->id)->get();
        // if ($patient)
        $patient_emergency = PatientEmergencyInfo::where('patient_id', $id)->first();
        return view('patient.hospital_booking.booking_reason', compact("patient", "patient_emergency"));
        // else
        // return view('master.index',compact('patient','bookings'))->with('warning', 'User information is not complete!');
    }

    public function token_no(Request $request, HospitalBooking $hospitalBooking)
    {
        $hospitalBooking->token_no = $request->token_no;
        $hospitalBooking->update();
        $booking_data = $hospitalBooking;
        $date_format =  new \DateTime($hospitalBooking->date);
        return view('patient.ticket.ticket_info', compact('booking_data', 'date_format'));
    }
    public function viewAllBooking()
    {
        if (Auth::user()->type == 'hospital') {
            $patients = Patient::latest()->get();
            $bookings = HospitalBooking::where('hospital_name', Auth::user()->name)->get();
            return view('patient.hospital_booking.view_all_booking', compact('patients', 'bookings'));
        } elseif (Auth::user()->type == 'patient') {
            $patients = Patient::latest()->get();
            $bookings = HospitalBooking::where("patient_id", auth()->user()->patient_id)->latest()->get();
            return view('patient.hospital_booking.view_all_booking', compact('patients', 'bookings'));
        } else {
            $patients = Patient::latest()->get();
            $bookings = HospitalBooking::latest()->get();
            return view('patient.hospital_booking.view_all_booking', compact('patients', 'bookings'));
        }
    }

    // public function booking_request_delete($id)
    // {
    //     $booking_delete = HospitalBooking::where('id', $id)->first();
    //     $booking_delete->delete();
    //     return redirect()->back()->with('delete_success', 'Booking Request Successfully Deleted!');
    // }

    public function booking_request_reason()
    {
        if (Auth::user()->type == 'patient') {
            $patients = Patient::latest()->get();
            $patient_records = PatientHealthRecord::where("patient_id", auth()->user()->patient_id)->latest()->get();
            // dd($patient_records);
            return view('patient.hospital_booking.view_all_booking_reason', compact('patients', 'patient_records'));
        } else {
            $patients = Patient::latest()->get();
            $patient_records = PatientHealthRecord::latest()->get();

            return view('patient.hospital_booking.view_all_booking_reason', compact('patients', 'patient_records'));
        }
    }

    public function index_info(PatientHealthRecord $patientHealthRecord)
    {
        // $patient_data = PatientHealthRecord::where('patient_id', $id)->get()->first();
        $ticket_no = $patientHealthRecord->booking_no;
        if ($patientHealthRecord->date) {
            $date_format = new \DateTime($patientHealthRecord->date);
        } else {
            $date_format = null;
        }
        return view('patient.ticket.ticket', compact('ticket_no', 'date_format'));
    }

    public function viewInfo(HospitalBooking $hospitalBooking)
    {
        $booking_data = $hospitalBooking;
        $mo_hospitals = MoHospital::where('hospital_name', $booking_data->hospital_name)->first();
        $patient = Patient::where('id', $hospitalBooking->patient_id)->get()->first();
        $date_format = $booking_data->date ? new \DateTime($booking_data->date) : null;

        return view('patient.ticket.ticket_info', compact('booking_data', 'mo_hospitals', 'date_format', 'patient'));
    }
}
