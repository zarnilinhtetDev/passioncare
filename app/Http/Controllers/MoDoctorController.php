<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Doctor2;
use App\Models\MoDoctor;
use App\Models\MoDoctor2;
use App\Models\MoHospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MoDoctorController extends Controller
{
    public function index(Request $request)
    {
        $query = MoDoctor::query();
        if ($request->filled('doctor_name')) {
            $query->where('doctor_name', 'like', '%' . $request->doctor_name . '%');
        }

        if ($request->filled('doctor_specialities')) {
            $query->where('doctor_specialities', 'like', '%' . $request->doctor_specialities . '%');
        }

        if ($request->filled('hospitalname')) {
            $query->whereHas('modoctor2s', function ($q) use ($request) {
                $q->where('hospitalname', 'like', '%' . $request->hospitalname . '%');
            });
        }

        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        // if ($request->filled('doctor_charges_fees_from')) {
        //     $query->where('from_fees', '<=', $request->doctor_charges_fees_from);
        // }

        // if ($request->filled('doctor_charges_fees_to')) {
        //     $query->where('to_fees', '>=', $request->doctor_charges_fees_to);
        // }

        if ($request->filled('doctor_charges_fees_from') && $request->filled('doctor_charges_fees_to')) {
            $from = $request->doctor_charges_fees_from;
            $to = $request->doctor_charges_fees_to;

            $query->where(function ($q) use ($from, $to) {
                $q->where(function ($subQuery) use ($from) {
                    $subQuery->where('from_fees', '<=', $from)
                        ->where('to_fees', '>=', $from);
                })->orWhere(function ($subQuery) use ($to) {
                    $subQuery->where('from_fees', '<=', $to)
                        ->where('to_fees', '>=', $to);
                })->orWhere(function ($subQuery) use ($from, $to) {
                    $subQuery->where('from_fees', '>=', $from)
                        ->where('to_fees', '<=', $to);
                });
            });
        } elseif ($request->filled('doctor_charges_fees_from')) {
            $query->where('from_fees', '>=', $request->doctor_charges_fees_from);
        } elseif ($request->filled('doctor_charges_fees_to')) {
            $query->where('to_fees', '<=', $request->doctor_charges_fees_to)->orWhere('from_fees', '<', $request->doctor_charges_fees_to);
        }

        $doctors = $query->latest()->get();
        $doctor2 = MoDoctor2::latest()->get();
        $hospitals = MoHospital::latest()->get();
        $ticket_id = $request->ticket_id ?? "";

        // if($ticket_id){
        //     return redirect("assign/{{$ticket_id}}",compact('doctors', 'doctor2','ticket_id'));
        // }
        return view('mo.doctor.mo_doctor', compact('doctors', 'doctor2', 'ticket_id', 'hospitals'));
    }

    public function store(Request $request)
    {
        $rules = [
            'profile' => 'required|image|max:1024',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Profile is invalid. Please check the inputs.');
        }

        $phno = MoDoctor::where('phone_number', $request->phone_number)->get()->first();
        // dd($phno);
        if ($phno) {
            return redirect()->back()->with('phone', 'Phone number already exists!Use different number!');
        } else {

            $files = $request->file('profile');
            if ($files) {
                $imagename = time() . '.' . $files->getClientOriginalExtension();
                $files->move('profile', $imagename);
            }

            // user register mo type
            // if ((auth()->user()->type == "mo" && auth()->user()->level == "1") || auth()->user()->type == "hospital") {
            //     $user = new User();
            //     $user->name = $request->doctor_name;
            //     // $user->email = str_replace(' ', '', strtolower($request->email)) . "@gmail.com";
            //     $user->email = $request->email;
            //     $user->phno = $request->phone_number;
            //     $user->password = Hash::make($request->password);
            //     $user->type = $request->type;
            //     if ($files) {
            //         $user->profile = $imagename;
            //     }
            //     $user->save();
            //     $latest_user = User::latest()->first();
            // }

            // doctor register
            $doctor = new MoDoctor();
            // $doctor->user_id = $latest_user->id ?? null;
            $doctor->doctor_name = $request->doctor_name;
            if ($files) {
                $doctor->profile = $imagename;
            }
            $doctor->medical_license = $request->medical_license;
            $doctor->phone_number = $request->phone_number;
            $doctor->doctor_name = $request->doctor_name;
            $doctor->doctor_email = $request->email;
            // $doctor->user->update();
            $doctor->degree = $request->degree;
            $doctor->nrc_number = $request->nrc_number;
            $doctor->doctor_specialities = $request->doctor_specialities;
            $doctor->gender = $request->gender;
            $doctor->work_experiance = $request->work_experiance;
            $doctor->city = $request->city;
            $doctor->other_certification = $request->other_certification;
            $doctor->address = $request->address;
            $doctor->from_fees = $request->doctor_charges_fees_from;
            $doctor->to_fees = $request->doctor_charges_fees_to;
            $doctor->save();
            $doctorid = $doctor->id;

            if (isset($latest_user)) {
                $latest_user->doctor_id = $doctorid;
                $latest_user->update();
            }

            $count = count($request->hospitalname);
            for ($i = 0; $i < $count; $i++) {
                $doctor2 = new MoDoctor2();
                $doctor2->mo_doctor_id = $doctorid;
                $doctor2->hospitalname = $request->input('hospitalname')[$i];
                $doctor2->day = $request->input('day')[$i];
                $doctor2->start_time = $request->input('start_time')[$i];
                $doctor2->end_time = $request->input('end_time')[$i];
                $doctor2->save();
            }
        }
        return redirect()->back()->with('success', 'Doctor Register Is Successfully');
    }

    public function doctorDetail(MoDoctor $doctor)
    {
        // $doctor = MoDoctor::where('id', $id)->first();
        $modoctor2s = MoDoctor2::where('mo_doctor_id', $doctor->id)->get();
        $hospitals = MoHospital::all();
        $tickets = $doctor->tickets;
        // dd($tickets);
        return view('mo.doctor.mo_doctor_detail', compact('doctor', 'modoctor2s', 'hospitals', 'tickets'));
    }

    public function edit($id)
    {
        $doctors = MoDoctor::find($id);
        $doctor2 = MoDoctor2::where('mo_doctor_id', $id)->get();
        $hospitals = MoHospital::all();
        return view('mo.doctor.mo_doctorEdit', compact('doctors', 'doctor2', 'hospitals'));
    }

    public function updateDoctor(Request $request, $id)
    {
        $request->validate([
            'new_profile' => 'image|max:1024',
        ]);

        $doctor = MoDoctor::find($id);
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

            // dd($doctor->user);
            $doctor->profile = $imagename;
            // if ((auth()->user()->type == "mo" && auth()->user()->level == "1") || auth()->user()->type == "hospital") {
            //     $doctor->user->profile = $imagename;
            // }
        } else {
            $doctor->profile = $old_file;
            // if ((auth()->user()->type == "mo" && auth()->user()->level == "1") || auth()->user()->type == "hospital") {
            //     $doctor->user->profile = $old_file;
            // }
        }

        // dd($doctor->user->phno);
        // if ((auth()->user()->type == "mo" && auth()->user()->level == "1") || auth()->user()->type == "hospital") {
        //     $doctor->user->name = $request->doctor_name;
        //     $doctor->user->phno = $request->phone_number;
        //     $doctor->user->email = $request->doctor_email;
        //     $doctor->user->update();
        // }

        $doctor->doctor_name = $request->doctor_name;
        $doctor->doctor_email = $request->doctor_email;
        $doctor->medical_license = $request->medical_license;
        $doctor->phone_number = $request->phone_number;
        $doctor->degree = $request->degree;
        $doctor->nrc_number = $request->nrc_number;
        $doctor->doctor_specialities = $request->doctor_specialities;
        $doctor->gender = $request->gender;
        $doctor->work_experiance = $request->work_experiance;
        $doctor->city = $request->city;
        $doctor->other_certification = $request->other_certification;
        $doctor->address = $request->address;
        $doctor->from_fees = $request->doctor_charges_fees_from;
        $doctor->to_fees = $request->doctor_charges_fees_to;
        $doctor->save();
        $doctorid = $doctor->id;


        MoDoctor2::where('mo_doctor_id', $id)->delete();
        $updateDoctor = MoDoctor2::where('mo_doctor_id', $id)->get();
        $count = count($request->hospitalname);
        for ($i = 0; $i < $count; $i++) {
            if ($i < $updateDoctor->count()) {
                $updateDoctor = $updateDoctor[$i];
                $updateDoctor->hospitalname = $request->input('hospitalname')[$i];
                $updateDoctor->day = $request->input('day')[$i];
                $updateDoctor->start_time = $request->input('start_time')[$i];
                $updateDoctor->end_time = $request->input('end_time')[$i];
                $updateDoctor->save();
            } else {
                $doctor2 = new MoDoctor2();
                $doctor2->mo_doctor_id = $doctorid;
                $doctor2->hospitalname = $request->input('hospitalname')[$i];
                $doctor2->day = $request->input('day')[$i];
                $doctor2->start_time = $request->input('start_time')[$i];
                $doctor2->end_time = $request->input('end_time')[$i];
                $doctor2->save();
            }
        }
        return redirect()->route('doctor')->with('success', 'Doctor Update Is Successfully');
    }
    // delete customer
    public function deleteDoctor($id)
    {
        $doctor = MoDoctor::find($id);
        $oldImagePath = public_path('profile/' . $doctor->profile);
        if (file_exists($oldImagePath)) {
            if (is_file($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $user = User::where('doctor_id', $doctor->id)->get()->first();
        $oldImagePath1 = public_path('profile/' . $user->profile);
        if (file_exists($oldImagePath1)) {
            if (is_file($oldImagePath1)) {
                unlink($oldImagePath1);
            }
        }

        $user->delete();
        $doctor->delete();
        MoDoctor2::where('mo_doctor_id', $id)->delete();

        return back()->with('delete_success', 'Customer Account Successfully Deleted!');
    }

    public function getHospitalData()
    {
        $hospitals = MoHospital::all();
        return response()->json($hospitals);
    }

    public function getDoctorSpecilization(Request $request)
    {
        $result = MoDoctor::where('doctor_name', $request->doctor_name)
            ->first();
        if (!$result) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        return response()->json($result);
    }
    public function getHospitalAddressAndGoogleLink(Request $request)
    {
        $result = MoHospital::where('hospital_name', $request->hospital_name)
            ->first();
        if (!$result) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        return response()->json($result);
    }
}
