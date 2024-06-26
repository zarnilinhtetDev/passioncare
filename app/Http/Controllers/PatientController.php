<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Patient;
use App\Models\TimeSetting;
use Illuminate\Http\Request;
use App\Models\PatientAddress;
use App\Models\HospitalBooking;
use App\Models\PatientInsurance;
use App\Models\PatientInitialTest;
use App\Models\PatientHealthRecord;
use App\Models\PatientEmergencyInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    //Profile View
    public function index()
    {
        $patient_id = count(Patient::withTrashed()->get()) + 1;

        $patient = Patient::where('user_id', auth()->user()->id)->first();
        if ($patient) {
            $emergency = PatientEmergencyInfo::where('patient_id', $patient->id)->first();
            $insurance = PatientInsurance::where('patient_id', $patient->id)->first();
            $initial = PatientInitialTest::where('patient_id', $patient->id)->first();
            $p_address = PatientAddress::where('patient_id', $patient->id)->first();
            return view('patient.patient_data.index', compact('patient', 'emergency', 'insurance', 'initial', 'p_address'));
        }
        return view('patient.patient_data.index', compact('patient', 'patient_id'));
    }
    //Profile Edit
    public function profile_edit()
    {
        $patient = Patient::where('user_id', auth()->user()->id)->first();
        if ($patient) {
            $emergency = PatientEmergencyInfo::where('patient_id', $patient->id)->first();
            $insurance = PatientInsurance::where('patient_id', $patient->id)->first();
            $initial = PatientInitialTest::where('patient_id', $patient->id)->first();
            $p_address = PatientAddress::where('patient_id', $patient->id)->first();
            $user = auth()->user();
            return view('patient.patient_data.profile_edit', compact('patient', 'emergency', 'insurance', 'initial', 'p_address'));
        }
        return view('patient.patient_data.profile_edit', compact('patient'));
    }
    //Profile Update
    public function profile_update(Request $request, $id)
    {
        $patient_id = count(Patient::withTrashed()->get()) + 1;

        $request->validate([
            'phno' => 'required',
            'profile' => 'required|image|max:1024',
        ]);

        $old_file = $request->old_profile;

        if ($request->hasFile('new_profile')) {

            $new_file = $request->file('new_profile');

            $old_file_path = public_path('profile/' . $old_file);

            if (file_exists($old_file_path)) {
                if (is_file($old_file_path)) {
                    unlink($old_file_path);
                }
            }

            $imagename = time() . '.' . $new_file->getClientOriginalExtension();
            $new_file->move('profile', $imagename);
        } else {
            $imagename = $old_file;
            // $doctor->profile = $old_file;
            // $doctor->user->profile = $old_file;
        }

        // try {
        $patient = Patient::where('user_id', auth()->user()->id)->first();
        // dd($patient);
        if ($patient) {
            // dd("hit");
            //update Data into patient
            $patient->name = $request->name;
            $patient->phno = $request->phno;
            $patient->nrc = $request->nrc;
            $patient->dob = $request->dob;
            $patient->gender = $request->gender;
            $patient->profile = $imagename;
            $patient->update();

            $initial = PatientInitialTest::where('patient_id', $patient->id)->first();
            //Update Data into PatientInitialtest
            $initial->height = $request->height;
            $initial->blood_type = $request->blood_type;
            $initial->weight = $request->weight;
            $initial->bmi = $request->bmi;
            $initial->update();
            // $initial->delete();

            $insurance = PatientInsurance::where('patient_id', $patient->id)->first();
            $insurance->company_name = $request->company_name;
            $insurance->company_contact_number = $request->company_contact_number;
            $insurance->company_address = $request->company_address;
            $insurance->medical_plan = $request->medical_plan;
            $insurance->update();
            // $insurance->delete();

            $emergency = PatientEmergencyInfo::where('patient_id', $patient->id)->first();
            //update Data into patient_emergency_info
            $emergency->contact_name = $request->contact_name;
            $emergency->contact_number = $request->contact_number;
            $emergency->contact_address = $request->contact_address;
            $emergency->update();
            // $emergency->delete();

            $patientAddress = PatientAddress::where('patient_id', $patient->id)->first();
            //Update Data into PatientAddress
            $patientAddress->address = $request->address;
            $patientAddress->city = $request->city;
            $patientAddress->state = $request->state;
            $patientAddress->update();
        } else {
            //Insert Data into patient
            $patient = new Patient();
            $patient->user_id = $id;
            $patient->name = $request->name;
            $patient->phno = $request->phno;
            $patient->nrc = $request->nrc;
            $patient->dob = $request->dob;
            $patient->gender = $request->gender;

            $patient->save();

            $patientId = Patient::latest()->get()->first()->id;

            //Insert Data into patient_emergency_info
            $emergency = new PatientEmergencyInfo();
            $emergency->patient_id = $patientId;
            $emergency->contact_name = $request->contact_name;
            $emergency->contact_number = $request->contact_number;
            $emergency->contact_address = $request->contact_address;
            $emergency->save();

            //Insert Data into patient_insurance
            $insurance = new PatientInsurance();
            $insurance->patient_id = $patientId;
            $insurance->company_name = $request->company_name;
            $insurance->company_contact_number = $request->company_contact_number;
            $insurance->company_address = $request->company_address;
            $insurance->medical_plan = $request->medical_plan;
            $insurance->save();

            //Insert Data into PatientInitialtest
            $initial = new PatientInitialTest();
            $initial->patient_id = $patientId;
            $initial->height = $request->height;
            $initial->blood_type = $request->blood_type;
            $initial->save();

            //Insert Data into PatientAddress
            $patientAddress = new PatientAddress();
            $patientAddress->patient_id = $patientId;
            $patientAddress->address = $request->address;
            $patientAddress->city = $request->city;
            // $patientAddress->state=$request->state;
            $patientAddress->save();
        }


        $user = User::find($id);
        $user->patient_id = $patientId ?? $patient->id;
        $user->name = $request->name;
        $user->phno = $request->phno;
        $user->email = $request->email;
        $user->profile = $imagename;
        $user->update();

        return redirect('patientProfile')->with('success', 'Profile Updated Successfully');
    }

    public function patient_health_record_store(Request $request, Patient $patient)
    {

        $request->validate([
            'file_name' => 'required|image|max:1024',
        ]);
        
        //calculate waiting time
        $time_setting = TimeSetting::latest()->first();

        if ($time_setting) {
            $ticket_qty = PatientHealthRecord::where("ticket_created", "no")->get()->count();
            // dd($ticket_qty);
            if ($ticket_qty) {
                if ($ticket_qty > $time_setting->mo_number) {
                    $waiting_time = ((int) $time_setting->call_time * $ticket_qty) / (int) $time_setting->mo_number;
                } else {
                    $waiting_time = 0;
                }
            } else {
                $waiting_time = 0;
            }
        } else {
            if (auth()->user()->type == "mo") {
                return redirect("mo_home")->with("delete", "You need to assign Mo number and estimated time!");
            } else {
                return back()->with("error", "Mo number and estimated time is empty,Contact to mo!");
            }
        }
        // dd((int) ceil($waiting_time));

        $patient = Patient::find($patient->id);

        if ($patient->gender == null && $patient->nrc == null) {
            $patient->gender = $request->gender;
            $patient->nrc = $request->nrc;
            $patient->update();
        }

        $patient_emergency = PatientEmergencyInfo::where('patient_id', $patient->id)->first();

        if ($patient_emergency->contact_name == null && $patient_emergency->contact_number == null) {
            $patient_emergency->contact_name = $request->contact_name;
            $patient_emergency->contact_number = $request->contact_number;
            $patient_emergency->update();
        }

        $patient_health_record = new PatientHealthRecord();
        $patient_health_record->patient_id = $patient->id;
        $patient_health_record->description = $request->description;
        $patient_health_record->waiting_time = (int) ceil($waiting_time);
        $patient_health_record->waiting_qty = $ticket_qty ?? 0;

        $files = $request->file('file_name');

        if ($files) {
            $imagename = time() . '.' . $files->getClientOriginalExtension();
            $files->move('HealthRecord', $imagename);
            $patient_health_record->file =  $imagename;
        }
        $ticket_no = '';
        $no = count(PatientHealthRecord::withTrashed()->get());
        if ($no < 10) {
            $ticket_no = 'ERS-C00000' . $no + 1;
        }
        if ($no >= 10 && $no < 100) {
            $ticket_no = 'ERS-C0000' . $no + 1;
        }
        if ($no >= 100 && $no < 1000) {
            $ticket_no = 'ERS-C000' . $no + 1;
        }
        if ($no >= 1000 && $no < 10000) {
            $ticket_no = 'ERS-C00' . $no + 1;
        }
        if ($no >= 10000 && $no < 100000) {
            $ticket_no = 'ERS-C0' . $no + 1;
        }
        $patient_health_record->booking_no = $ticket_no;

        $patient_health_record->save();

        return view('patient.ticket.ticket', compact('ticket_no'));
    }

    public function patient_health_record_edit($id)
    {
        // $patient = Patient::find($patient);
        $patient_health_record = PatientHealthRecord::where('id', $id)->first();
        return view('patient.hospital_booking.edit_booking_reason', compact('patient_health_record'));
    }
    public function patient_health_record_update(Request $request, PatientHealthRecord $healthRecord)
    {
        $healthRecord->date = $request->appointment_date;
        $healthRecord->update();
        $ticket_no = $healthRecord->booking_no;
        $date_format =  $healthRecord->date;
        return view('patient.ticket.ticket', compact('date_format', 'ticket_no'));
    }

    /*************************/
    //MO patient
    public function moPatient()
    {
        // $patients = Patient::latest()->get();
        return view('mo.patient.patient');
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'phno' => 'required|unique:patients,phno',
            'profile' => 'required|image|max:1024',
        ]);


        $files = $request->file('profile');
        if ($files) {
            $imagename = time() . '.' . $files->getClientOriginalExtension();
            $files->move('profile', $imagename);
        }

        $user = new User();
        $user->name = $request->name;
        // str_replace(' ', '', strtolower($request->email)) . "@gmail.com"
        $user->email = $request->email;
        $user->phno = $request->phno;
        $user->password = Hash::make($request->password);
        $user->profile = $imagename;
        $user->save();
        $users = User::latest()->first();

        //Insert Data into patient
        $patient = new Patient();
        $patient->user_id = $users->id;
        $patient->mo_id = $request->mo_id;
        $patient->name = $request->name;
        $patient->phno = $request->phno;
        $patient->email = $request->email;
        $patient->profile = $imagename;
        $patient->nrc = $request->nrc;
        $patient->dob = $request->dob;
        $patient->gender = $request->gender;

        $patient->save();

        $patientId = Patient::latest()->get()->first()->id;
        $user->patient_id = $patientId;
        $user->update();
        //Insert Data into patient_emergency_info
        $emergency = new PatientEmergencyInfo();
        $emergency->patient_id = $patientId;
        $emergency->contact_name = $request->contact_name;
        $emergency->contact_number = $request->contact_number;
        $emergency->contact_address = $request->contact_address;
        $emergency->save();

        //Insert Data into patient_insurance
        $insurance = new PatientInsurance();
        $insurance->patient_id = $patientId;
        $insurance->company_name = $request->company_name;
        $insurance->company_contact_number = $request->company_contact_number;
        $insurance->company_address = $request->company_address;
        $insurance->medical_plan = $request->medical_plan;
        $insurance->save();

        //Insert Data into PatientInitialtest

        $initial = new PatientInitialTest();
        $initial->patient_id = $patientId;
        $initial->height = $request->height;
        $initial->blood_type = $request->blood_type;
        $initial->weight = $request->weight;
        $initial->bmi = $request->BMI;
        $initial->save();

        //Insert Data into PatientAddress
        $patientAddress = new PatientAddress();
        $patientAddress->patient_id = $patientId;
        $patientAddress->address = $request->address;
        $patientAddress->city = $request->city;
        $patientAddress->state = $request->state;
        $patientAddress->save();
        if (Auth::user()->type == 'mo') {
            return redirect('mo_home')->with('success', 'Patient Registration Is Successful!');
        } elseif (Auth::user()->type == 'hospital') {
            return redirect('home')->with('success', 'Patient Registration Is Successful!');
        }
        // return redirect('/')->with('success', 'Patient Registration Is Successful!');
    }

    public function edit($id)
    {
        $patient = Patient::where('id', $id)->first();
        $emergency = PatientEmergencyInfo::where('patient_id', $patient->id)->first();
        $insurance = PatientInsurance::where('patient_id', $patient->id)->first();
        $initial = PatientInitialTest::where('patient_id', $patient->id)->first();
        $patientAddress = PatientAddress::where('patient_id', $patient->id)->first();
        // dd($patient);
        return view('mo.patient.patient_edit', compact('patient', 'emergency', 'insurance', 'initial', 'patientAddress'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'phno' => 'required',
            'profile' => 'image|max:1024',
        ]);

        $patient = Patient::where('id', $id)->first();
        $user = User::find($patient->user_id);
        $emergency = PatientEmergencyInfo::where('patient_id', $id)->first();
        $insurance = PatientInsurance::where('patient_id', $id)->first();
        $initial = PatientInitialTest::where('patient_id', $id)->first();
        $patientAddress = PatientAddress::where('patient_id', $id)->first();

        $old_file = $request->old_profile;

        if ($request->hasFile('profile')) {

            $new_file = $request->file('profile');

            $old_file_path = public_path('profile/' . $old_file);

            if (file_exists($old_file_path)) {
                if (is_file($old_file_path)) {
                    unlink($old_file_path);
                }
            }

            $imagename = time() . '.' . $new_file->getClientOriginalExtension();
            $new_file->move('profile', $imagename);

            $patient->profile = $imagename;
            $user->profile = $imagename;
        } else {
            $patient->profile = $old_file;
            $user->profile = $old_file;
        }

        //update User name and email
        $user->name = $request->name;
        // $user->email = str_replace(' ', '', strtolower($request->name)) . "@gmail.com";
        $user->email = $request->email;
        $user->phno = $request->phno;
        $user->patient_id = $patient->id;
        $user->update();

        //update Data into patient
        $patient->name = $request->name;
        $patient->phno = $request->phno;
        $patient->email = $request->email;
        $patient->nrc = $request->nrc;
        $patient->dob = $request->dob;
        $patient->gender = $request->gender;
        $patient->save();

        //update Data into patient_emergency_info
        $emergency->contact_name = $request->contact_name;
        $emergency->contact_number = $request->contact_number;
        $emergency->contact_address = $request->contact_address;
        $emergency->save();

        //Update Data into patient_insurance
        $insurance->company_name = $request->company_name;
        $insurance->company_contact_number = $request->company_contact_number;
        $insurance->company_address = $request->company_address;
        $insurance->medical_plan = $request->medical_plan;
        $insurance->save();

        //Update Data into PatientInitialtest
        $initial->height = $request->height;
        $initial->blood_type = $request->blood_type;
        $initial->weight = $request->weight;
        $initial->bmi = $request->BMI;
        $initial->save();

        //Update Data into PatientAddress
        $patientAddress->address = $request->address;
        $patientAddress->city = $request->city;
        $patientAddress->state = $request->state;
        $patientAddress->save();

        return redirect('/')->with('success', 'Patient Update Is Successful!');
    }

    public function delete(Patient $patient)
    {
        $emergency = PatientEmergencyInfo::where('patient_id', $patient->id)->first();
        $initial = PatientInitialTest::where('patient_id', $patient->id)->first();
        $patientAddress = PatientAddress::where('patient_id', $patient->id)->first();
        $insurance = PatientInsurance::where('patient_id', $patient->id)->first();
        $booking = HospitalBooking::where('patient_id', $patient->id)->first();
        $healthRecord = PatientHealthRecord::where('patient_id', $patient->id)->first();
        $user = User::where('patient_id', $patient->id)->get()->first();
        // dd($user);
        // $oldImagePath = public_path('profile/' . $user->profile);
        // if (file_exists($oldImagePath)) {
        //     if (is_file($oldImagePath)) {
        //     unlink($oldImagePath);
        // }
        // }

        $oldImagePath = public_path('profile/' . $patient->profile);
        if (file_exists($oldImagePath)) {
            if (is_file($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $patient->delete();
        $emergency->delete();
        $insurance->delete();
        $initial->delete();
        $patientAddress->delete();

        if ($booking != null) {
            $booking->delete();
        }

        if ($booking != null) {
            $healthRecord->delete();
        }

        $user->delete();
        return redirect()->back()->with('delete', 'Patient Deletion Is Successful!');
    }

    public function viewAllPatient()
    {
        $patients = Patient::latest()->get();
        $patientAddresses = PatientAddress::latest()->get();
        return view('mo.patient.view_all_patient', compact('patients', 'patientAddresses'));
    }
    public function viewIncomingPatient()
    {
        $patients = Patient::latest()->get();
        $bookings = HospitalBooking::latest()->get();
        $tickets = Ticket::latest()->get();
        return view('mo.patient.view_incoming_patient', compact('patients', 'bookings', 'tickets'));
    }
}
