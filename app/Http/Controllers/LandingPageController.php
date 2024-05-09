<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use App\Models\MoHospital;
use Illuminate\Http\Request;
use App\Models\PatientAddress;
use App\Models\HospitalBooking;
use App\Models\PatientInsurance;
use App\Models\PatientEmergencyInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LandingPageController extends Controller
{
    public function index()
    {
        // if(Auth::user()->type == 'patient'){
            $patient = Patient::where('user_id', auth()->user()->id)->first();
            $bookings = HospitalBooking::where('patient_id', auth()->user()->id)->get();
            return view('master.index', compact('patient', 'bookings'));
        // }
        // else if(Auth::user()->type == 'mo'){
        //     $patients = Patient::latest()->get();
        //     $patientAddresses = PatientAddress::latest()->get();
        //     return view('mo.home.index', compact('patients', 'patientAddresses'));
        // }else {
        //     $hospitals = MoHospital::latest()->get();
        // return view('mo.hospital.mo_hospital', compact('hospitals'));
        // }
    }

    public function user(){
        $userData = User::latest()->get();
        return view('user.user',compact('userData'));
    }

    public function userCreate(Request $request,User $user){
        $user->create($request->all());
        return redirect()->back()->with('success' , 'User Registration Success!');
    }

    public function userDelete($id) {
        User::where('id',$id)->delete();
        return redirect()->back()->with('delete_success','User Account Delete Success!');
    }

    public function userEdit($id){
        $userData = User::where('id',$id)->first();
        return view('user.edit',compact('userData'));
    }

    public function userUpdate(Request $request,User $user){
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->type = $request['type'];
        $user->level = $request['level'];
        $user -> save();
        return redirect()->route('user')->with('update_success','User Account Update Success');
    }
}
