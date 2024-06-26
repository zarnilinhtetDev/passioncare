<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hospital;
use App\Models\MoHospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = MoHospital::latest()->get();
        return view('patient.hospital.hospital', compact('hospitals'));
    }

    public function hospitalProfile()
    {
        $hospital = MoHospital::where("hospital_name", auth()->user()->name)->get()->first();
        // dd($hospital);
        return view('patient.hospital.hospital_profile', compact('hospital'));
    }
    public function hospitalEdit(MoHospital $hospital)
    {
        return view('patient.hospital.hospital_profile_edit', [
            'hospital' => $hospital
        ]);
    }

    public function hospitalUpdate(Request $request, $id)
    {

        $request->validate([
            'new_profile' => 'image|max:1024',
        ]);

        $user = User::where('hospital_id', $id)->get()->first();
        // dd($user);
        $old_file = $request->old_profile;
        // dd($old_file);
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
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move("profile", $imageName);
            // Update the hospital record with the new image name
        }

        $user->name = $request->hospital_name;
        $user->phno = $request->hospital_phone_number;
        $user->email = $request->hospital_email;
        $user->profile = $imageName ?? $old_file;
        $user->update();

        // dd($request->toArray());
        $hospital = MoHospital::find($id);
        $hospital->hospital_name = $request->hospital_name;
        $hospital->hospital_email = $request->hospital_email;
        $hospital->image = $imageName ?? $old_file;
        $hospital->hospital_type = $request->hospital_type;
        $hospital->hospital_google_address_link = $request->hospital_google_address_link;
        $hospital->bed_capacity = $request->bed_capacity;
        $hospital->facility_and_services = $request->facility_and_services;
        $hospital->hospital_br_number = $request->hospital_br_number;
        $hospital->hospital_phone_number = $request->hospital_phone_number;
        $hospital->hospital_address = $request->hospital_address;
        $hospital->password = $request->password;
        $hospital->specialities = $request->specialities;
        $hospital->number_of_physicians = $request->number_of_physicians;
        $hospital->number_of_nurses = $request->number_of_nurses;
        $hospital->other_staff = $request->other_staff;
        $hospital->emergency_contact = $request->emergency_contact;
        $hospital->emergency_services = $request->emergency_services;
        $hospital->update();
        return redirect()->route("hospitalProfile", compact("hospital"))->with("success", "Hospital Updated Successfully!");
    }
}
