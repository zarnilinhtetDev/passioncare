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
        if ($patient) {
            $emergency = PatientEmergencyInfo::where('patient_id', $patient->id)->first();
            $insurance = PatientInsurance::where('patient_id', $patient->id)->first();
            $initial = PatientInitialTest::where('patient_id', $patient->id)->first();
            $p_address = PatientAddress::where('patient_id', $patient->id)->first();
            return view('patient.patient_data.index', compact('patient', 'emergency', 'insurance', 'initial', 'p_address'));
        }
        return view('patient.patient_data.index', compact('patient'));
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
        // dd($id);
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
            $patient->save();

            $initial = PatientInitialTest::where('patient_id', $patient->id)->first();
            //Update Data into PatientInitialtest
            $initial->height = $request->height;
            $initial->blood_type = $request->blood_type;
            $initial->save();
            // $initial->delete();

            $insurance = PatientInsurance::where('patient_id', $patient->id)->first();
            $insurance->company_name = $request->company_name;
            $insurance->company_contact_number = $request->company_contact_number;
            $insurance->company_address = $request->company_address;
            $insurance->medical_plan = $request->medical_plan;
            $insurance->save();
            // $insurance->delete();

            $emergency = PatientEmergencyInfo::where('patient_id', $patient->id)->first();
            //update Data into patient_emergency_info
            $emergency->contact_name = $request->contact_name;
            $emergency->contact_number = $request->contact_number;
            $emergency->contact_address = $request->contact_address;
            $emergency->save();
            // $emergency->delete();

            $patientAddress = PatientAddress::where('patient_id', $patient->id)->first();
            //Update Data into PatientAddress
            $patientAddress->address = $request->address;
            $patientAddress->city = $request->city;
            $patientAddress->save();
            // $patientAddress->delete();

            // $patient->delete();
        } else {
            // dd("hit");
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
        // $initial = PatientInitialTest::where('patient_id', $patient->id)->first();
        // if ($initial) {
        //     $initial->delete();
        // }
        // $insurance = PatientInsurance::where('patient_id', $patient->id)->first();
        // if ($insurance) {
        //     $insurance->delete();
        // }
        // $emergency = PatientEmergencyInfo::where('patient_id', $patient->id)->first();
        // if ($emergency) {
        //     $emergency->delete();
        // }
        // $patientAddress = PatientAddress::where('patient_id', $patient->id)->first();
        // if ($patientAddress) {
        //     $patientAddress->delete();
        // }

        $user = User::find($id);
        $user->name = $request->name;
        $user->update();

        return redirect('profile')->with('success', 'Profile Updated Successfully');
        // } catch (\Exception $e) {
        // Handle the exception
        // For example, you can log the error or return a response indicating failure
        // return response()->json(['error' => 'Failed to insert data.' . $e], 500);
        // }
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

    /*************************/
    //MO patient
    public function moPatient()
    {
        // $patients = Patient::latest()->get();
        return view('mo.patient.patient');
    }

    public function store(Request $request, $id)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = str_replace(' ', '', strtolower($request->name)) . "@gmail.com";
        $user->save();
        $users = User::all();

        //Insert Data into patient
        $patient = new Patient();
        $patient->user_id = count($users);
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
        return redirect('mo_home')->with('success', 'Patient Registration Is Successful!');
    }

    public function edit($id)
    {
        $patient = Patient::where('id', $id)->first();
        $emergency = PatientEmergencyInfo::where('patient_id', $id)->first();
        $insurance = PatientInsurance::where('patient_id', $id)->first();
        $initial = PatientInitialTest::where('patient_id', $id)->first();
        $patientAddress = PatientAddress::where('patient_id', $id)->first();
        // dd($patient);
        return view('mo.patient.patient_edit', compact('patient', 'emergency', 'insurance', 'initial', 'patientAddress'));
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::where('id', $id)->first();
        $user = User::find($patient->user_id);
        $emergency = PatientEmergencyInfo::where('patient_id', $id)->first();
        $insurance = PatientInsurance::where('patient_id', $id)->first();
        $initial = PatientInitialTest::where('patient_id', $id)->first();
        $patientAddress = PatientAddress::where('patient_id', $id)->first();

        //update User name and email
        $user->name = $request->name;
        $user->email = str_replace(' ', '', strtolower($request->name)) . "@gmail.com";
        $user->update();

        //update Data into patient
        $patient->name = $request->name;
        $patient->phno = $request->phno;
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
        $initial->save();

        //Update Data into PatientAddress
        $patientAddress->address = $request->address;
        $patientAddress->city = $request->city;
        $patientAddress->save();

        return redirect('mo_home')->with('success', 'Patient Update Is Successful!');
    }

    public function delete(Patient $patient)
    {
        // dd($patient->id);
        $emergency = PatientEmergencyInfo::where('patient_id', $patient->id);
        $insurance = PatientInsurance::where('patient_id', $patient->id);
        $initial = PatientInitialTest::where('patient_id', $patient->id);
        $patientAddress = PatientAddress::where('patient_id', $patient->id);
        $patient->delete();
        $emergency->delete();
        $insurance->delete();
        $initial->delete();
        $patientAddress->delete();
        return redirect('mo_home')->with('delete', 'Patient Deletion Is Successful!');
    }
}
