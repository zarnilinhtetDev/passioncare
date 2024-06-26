<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Patient;
use App\Models\MoDoctor;
use App\Models\MoHospital;
use Illuminate\Http\Request;
use App\Models\PatientAddress;
use App\Models\HospitalBooking;
use App\Models\HospitalOngoing;
use App\Models\PatientInsurance;
use App\Models\PatientInitialTest;
use Illuminate\Support\Facades\DB;
use App\Models\PatientHealthRecord;
use App\Models\PatientEmergencyInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Contracts\Validation\Validator;

class LandingPageController extends Controller
{
    public function index()
    {
        if (Auth::user()->type == 'patient') {
            $patient = Patient::where('user_id', auth()->user()->id)->get()->first();
            // dd($patient);
            if ($patient == null) {
                return view('master.index', compact('patient'));
            } else {
                $today = Carbon::today()->toDateString();
                $bookings = HospitalBooking::where('patient_id', $patient->id)->latest()->get();
                $patient_records = PatientHealthRecord::where('patient_id', $patient->id)->latest()->get();
                $patient_record = PatientHealthRecord::where('patient_id', $patient->id)->where("ticket_created", "no")->latest()->get()->first();
                // $tickets = Ticket::where('patient_id', $patient->id)->latest()->get();
                // dd($tickets);
                return view('master.index', compact('patient', 'bookings', 'patient_records', 'patient_record'));
            }
        } elseif (Auth::user()->type == 'hospital') {
            $patients = Patient::where('mo_id', Auth::user()->id)->latest()->get();
            // $all_patients = Patient::latest()->get();
            $patientAddresses = PatientAddress::latest()->get();
            $bookings = HospitalBooking::latest()->get();
            $tickets = Ticket::latest()->get();
            $hospital_ongoings = HospitalOngoing::where('hospital_names', Auth::user()->name)->latest()->get();
            return view('master.index', compact('patients', 'patientAddresses', 'bookings', 'tickets', 'hospital_ongoings'));
        }
    }

    public function user()
    {
        $userData = User::latest()->get();
        return view('user.user', compact('userData'));
    }

    public function userCreate(Request $request, User $user)
    {
        $rules = [
            'phno' => 'required|unique:users,phno',
            'profile' => 'required|image|max:1024',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Profile or Phone number is invalid. Please check the inputs.');
        }

        $files = $request->file('profile');
        if ($files && $files->isValid()) {
            $imagename = time() . '.' . $files->getClientOriginalExtension();
            $files->move('profile', $imagename);
        } else {
            return back()->with('img_error', 'Please upload a valid image file');
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phno = $request->phno;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;
        $user->level = $request->level;
        if ($files) {
            $user->profile = $imagename;
        }
        $user->save();
        return redirect()->back()->with('success', 'User Registration Success!');
    }

    public function userDelete($id)
    {
        $patient = Patient::where('user_id', $id)->first();
        $mo_doctor = MoDoctor::where('user_id', $id)->first();
        $mo_hospital = MoHospital::where('user_id', $id)->first();
        // dd($patient);
        if ($patient != null) {
            $patient->delete();
            $old_file_path = public_path('profile/' . $patient->profile);
            if (file_exists($old_file_path)) {
                if (is_file($old_file_path)) {
                    unlink($old_file_path);
                }
            }
            $mo_hospital->delete();
            PatientAddress::where('patient_id', $patient->id)->delete();
            PatientInsurance::where('patient_id', $patient->id)->delete();
            PatientEmergencyInfo::where('patient_id', $patient->id)->delete();
            PatientInitialTest::where('patient_id', $patient->id)->delete();
        }
        if ($mo_doctor != null) {
            $old_file_path = public_path('profile/' . $mo_doctor->profile);
            if (file_exists($old_file_path)) {
                if (is_file($old_file_path)) {
                    unlink($old_file_path);
                }
            }
            $mo_hospital->delete();
            $mo_doctor->delete();
        }
        if ($mo_hospital != null) {
            $old_file_path = public_path('profile/' . $mo_hospital->image);
            if (file_exists($old_file_path)) {
                if (is_file($old_file_path)) {
                    unlink($old_file_path);
                }
            }
            $mo_hospital->delete();
            $mo_hospital->delete();
        }
        User::where('id', $id)->delete();
        return redirect()->back()->with('delete', 'User Account Deletion Success!');
    }

    public function userEdit($id)
    {
        $userData = User::where('id', $id)->first();
        return view('user.edit', compact('userData'));
    }

    // public function userUpdate(Request $request, User $user)
    // {
    //     if ($request->filled('password')) {
    //         $user->password = Hash::make($request->input('password'));
    //     }

    //     $user->name = $request['name'];
    //     $user->email = $request['email'];
    //     $user->phno = $request['phno'];
    //     $user->type = $request['type'];
    //     $user->level = $request['level'];
    //     $user->save();
    //     return redirect()->route('user')->with('success', 'User Account Updated Successfully!');
    // }

    public function userUpdate(Request $request, $id)
    {

        $request->validate([
            'phno' => 'required',
            'new_profile' => 'image|max:1024',
        ]);

        $old_file = $request->old_profile;

        if ($request->hasFile('new_profile')) {
            // Get the old image name and construct its path
            if (isset($old_file)) {
                $oldImagePath = public_path('profile/' . $old_file);
                // Check if the old image file exists and delete it
                if (is_file($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            // Handle the new image file upload
            $file = $request->file('new_profile');
            // dd($file);
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move("profile", $imageName);
        }
        // dd($imageName);

        $user = User::where('id', $id)->first();
        $patient = Patient::where('user_id', $user->id)->first();
        $mo_hospital = MoHospital::where('user_id', $user->id)->first();
        $mo_doctor = MoDoctor::where('user_id', $user->id)->first();
        // dd($patient);
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phno = $request['phno'];
        $user->type = $request['type'];
        if (auth()->user()->type == "mo" && auth()->user()->level == "1") {
            $user->profile = $imageName ?? $old_file;
        }

        $user->level = $request['level'];
        // $user->patient_id = $patient->id;
        $user->update();

        if ($patient != null) {
            $patient->name = $request->name;
            $patient->email = $request->email;
            $patient->phno = $request->phno;
            $patient->profile = $imageName ?? $old_file;
            $patient->update();
        }

        if ($mo_hospital != null) {        // dd($mo_hospital);
            $mo_hospital->hospital_name = $request->name;
            $mo_hospital->hospital_email = $request->email;
            $mo_hospital->hospital_phone_number = $request->phno;
            $mo_hospital->image = $imageName ?? $old_file;
            $mo_hospital->update();
        }

        if ($mo_doctor != null) {
            $mo_doctor->doctor_name = $request['name'];
            $mo_doctor->doctor_email = $request['email'];
            $mo_doctor->phone_number = $request['phno'];
            $mo_doctor->profile = $imageName ?? $old_file;
            $mo_doctor->update();
        }
        if (auth()->user()->type == "mo" && auth()->user()->level == "1") {
            return redirect()->route('user')->with('success', 'User Account Updated Successfully!');
        } else {
            return redirect()->back()->with('success', 'User Account Updated Successfully!');
        }
    }


    public function termsOfUse()
    {
        return view('landing_page.term_of_use');
    }
}
