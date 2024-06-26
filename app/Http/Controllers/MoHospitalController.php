<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MoHospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MoHospitalController extends Controller
{
    public function index()
    {
        $hospitals = MoHospital::latest()->get();
        return view('mo.hospital.mo_hospital', compact('hospitals'));
    }

    public function store(Request $request, MoHospital $hospital)
    {

        $phone = MoHospital::where("hospital_phone_number", $request->hospital_phone_number)->get()->first();
        // dd($phone);
        if ($phone) {
            return redirect()->back()->with("phone", "Phone number already exists!Use different number!");
        }
        // dd($request->all());
        $rules = [
            'hospital_image' => 'required|image|max:1024',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error', 'Profile is invalid. Please check the inputs.');
        }

        $files = $request->file('hospital_image');
        if ($files) {
            $imagename = time() . '.' . $files->getClientOriginalExtension();
            $files->move('profile', $imagename);
        }

        if (Auth::user()->type == 'mo' && Auth::user()->level == '1') {
            $user = new User();
            $user->name = $request->hospital_name;
            $user->email = $request->hospital_email;
            $user->phno = $request->hospital_phone_number;
            $user->password = Hash::make($request->password);
            $user->type = 'hospital';
            $user->profile = $imagename;
            $user->save();
            $users = User::latest()->first();
        }
        // Hospital::create($request->all());
        $hospital = new MoHospital();
        $hospital->user_id = $users->id;
        $hospital->hospital_name = $request->hospital_name;
        $hospital->hospital_email = $request->hospital_email;
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
        $hospital->image =  $imagename;
        $hospital->save();

        $hospitalId = $hospital->id;
        $users->hospital_id = $hospitalId;
        $users->update();
        return redirect()->back()->with('success', 'Hospital Registration Is Successful!');
    }
    public function edit($id)
    {
        $hospital = MoHospital::where('id', $id)->first();
        return view('mo.hospital.mo_hospitalEdit', compact('hospital'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'hospital_phone_number' => 'required|unique:mo_hospitals,hospital_phone_number',
            'hospital_image' => 'image|max:1024',
        ]);

        $user = User::where('hospital_id', $id)->first();

        $old_file = $request->old_file;
        // dd($old_file);
        if ($request->hasFile('hospital_image')) {

            $oldImagePath = public_path('profile/' . $old_file);

            if (file_exists($oldImagePath)) {
                if (is_file($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            // Handle the new image file upload
            $file = $request->file('hospital_image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move("profile", $imageName);
            // Update the hospital record with the new image name
        }

        $user->phno = $request->hospital_phone_number;
        $user->name = $request->hospital_name;
        $user->email = $request->hospital_email;
        $user->profile = $imageName ?? $old_file;
        // $user->phno = $request->hospital_phone_number;
        // $user->update()
        $user->update();
        // dd($request->toArray());
        $hospital = MoHospital::find($id);

        $hospital->hospital_name = $request->hospital_name;
        $hospital->hospital_email = $request->hospital_email;
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
        $hospital->image = $imageName ?? $old_file;
        $hospital->save();
        return redirect()->route('hospital')->with('success', 'Hospital Updated Successfully!');
    }

    public function delete(MoHospital $hospital)
    {
        $oldImagePath = public_path('profile/' . $hospital->image);
        if (file_exists($oldImagePath)) {
            if (is_file($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $user = User::where('hospital_id', $hospital->id)->get()->first();
        $oldUserProfile = public_path('profile/' . $user->profile);
        if (file_exists($oldUserProfile)) {
            if (is_file($oldUserProfile)) {
                unlink($oldUserProfile);
            }
        }

        $user->delete();
        $hospital->delete();
        return redirect()->route('hospital')->with('delete', 'Hospital Deleted Successfully!');
    }
}
