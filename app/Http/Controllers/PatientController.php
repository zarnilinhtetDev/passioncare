<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientAddress;
use App\Models\HospitalBooking;
use App\Models\PatientInsurance;
use App\Models\PatientInitialTest;
use App\Models\PatientHealthRecord;
use App\Models\PatientEmergencyInfo;

class PatientController extends Controller
{
    //Profile View
    public function index()
    {
        $patient = Patient::where('user_id', auth()->user()->id)->first();
        $emergency = PatientEmergencyInfo::where('patient_id', auth()->user()->id)->first();
        $insurance = PatientInsurance::where('patient_id', auth()->user()->id)->first();
        $initial = PatientInitialTest::where('patient_id', auth()->user()->id)->first();
        $p_address = PatientAddress::where('patient_id', auth()->user()->id)->first();
        return view('patient.patient_data.index', compact('patient', 'emergency', 'insurance', 'initial', 'p_address'));
    }
    //Profile Edit
    public function profile_edit()
    {
        $patient = Patient::where('user_id', auth()->user()->id)->first();
        $emergency = PatientEmergencyInfo::where('patient_id', auth()->user()->id)->first();
        $insurance = PatientInsurance::where('patient_id', auth()->user()->id)->first();
        $initial = PatientInitialTest::where('patient_id', auth()->user()->id)->first();
        $p_address = PatientAddress::where('patient_id', auth()->user()->id)->first();
        $user = auth()->user();
        return view('patient.patient_data.profile_edit', compact('patient', 'emergency', 'insurance', 'initial', 'p_address'));
    }
    //Profile Update
    public function profile_update(Request $request, $id)
    {


        try {
            $patient = Patient::where('user_id', auth()->user()->id)->first();
            if ($patient) {
                $patient->delete();
            }
            $initial = PatientInitialTest::where('patient_id', $id)->first();
            if ($initial) {
                $initial->delete();
            }
            $insurance = PatientInsurance::where('patient_id', $id)->first();
            if ($insurance) {
                $insurance->delete();
            }
            $emergency = PatientEmergencyInfo::where('patient_id', $id)->first();
            if ($emergency) {
                $emergency->delete();
            }
            $p_address = PatientAddress::where('patient_id', $id)->first();
            if ($p_address) {
                $p_address->delete();
            }
            $user = User::find($id);
            $user->name = $request->name;
            $user->update();
            //Insert Data into patient
            $patient = new Patient();
            $patient->user_id = $id;
            $patient->name = $request->name;
            $patient->phno = $request->phno;
            $patient->nrc = $request->nrc;
            $patient->dob = $request->dob;
            $patient->gender = $request->gender;

            $patient->save();

            //Insert Data into patient_emergency_info
            $emergency = new PatientEmergencyInfo();
            $emergency->patient_id = $id;
            $emergency->contact_name = $request->contact_name;
            $emergency->contact_number = $request->contact_number;
            $emergency->contact_address = $request->contact_address;
            $emergency->save();

            //Insert Data into patient_insurance
            $insurance = new PatientInsurance();
            $insurance->patient_id = $id;
            $insurance->company_name = $request->company_name;
            $insurance->company_contact_number = $request->company_contact_number;
            $insurance->company_address = $request->company_address;
            $insurance->medical_plan = $request->medical_plan;
            $insurance->save();

            //Insert Data into PatientInitialtest

            $initial = new PatientInitialTest();
            $initial->patient_id = $id;
            $initial->height = $request->height;
            $initial->blood_type = $request->blood_type;
            $initial->save();

            //Insert Data into PatientAddress
            $p_address = new PatientAddress();
            $p_address->patient_id = $id;
            $p_address->address = $request->address;
            $p_address->city = $request->city;
            // $p_address->state=$request->state;
            $p_address->save();



            return redirect('profile')->with('success', 'Profile Updated Successfully');
        } catch (\Exception $e) {
            // Handle the exception
            // For example, you can log the error or return a response indicating failure
            return response()->json(['error' => 'Failed to insert data.' . $e], 500);
        }
    }

    public function patient_health_record_store(Request $request)
    {
        $patient_health_record = new PatientHealthRecord();
        $patient_health_record->patient_id = auth()->user()->id;
        $patient_health_record->description = $request->description;

        $files = $request->file('file_name');

        if ($files) {
            $imagename = time() . '.' . $files->getClientOriginalExtension();
            $files->move('HealthRecord', $imagename);
            $patient_health_record->file =  $imagename;
        }
        $patient_health_record->save();
        $ticket_no = '';
        $no = count(HospitalBooking::all());

        if ($no < 10) {
            $ticket_no = 'ERS00000' . $no + 1;
        }
        if ($no >= 10 && $no < 100) {
            $ticket_no = 'ERS0000' . $no + 1;
        }
        if ($no >= 100 && $no < 1000) {
            $ticket_no = 'ERS000' . $no + 1;
        }
        if ($no >= 1000 && $no < 10000) {
            $ticket_no = 'ERS00' . $no + 1;
        }
        if ($no >= 10000 && $no < 100000) {
            $ticket_no = 'ERS0' . $no + 1;
        }
        return view('patient.ticket.ticket', compact('ticket_no'));
    }
}
