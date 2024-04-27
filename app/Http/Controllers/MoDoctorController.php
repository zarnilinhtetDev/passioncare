<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Doctor2;
use App\Models\MoDoctor;
use App\Models\MoDoctor2;
use Illuminate\Http\Request;

class MoDoctorController extends Controller
{
    public function index()
    {
        $doctors = MoDoctor::latest()->get();
        $doctor2 = MoDoctor2::latest()->get();
        return view('mo.doctor.mo_doctor', compact('doctors', 'doctor2'));
    }

    public function store(Request $request)
    {
        $doctor = new MoDoctor();
        $doctor->doctor_name = $request->doctor_name;
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
        $doctor->save();
        $doctorid = $doctor->id;

        $count = count($request->hospitalname);
        for ($i = 0; $i < $count; $i++) {
            $doctor2 = new MoDoctor2();
            $doctor2->mo_doctor_id = $doctorid;
            $doctor2->hospitalname = $request->input('hospitalname')[$i];
            $doctor2->date = $request->input('date')[$i];
            $doctor2->time = $request->input('time')[$i];
            $doctor2->save();
        }
        return redirect()->back()->with('success', 'Doctor Register Is Successfully');
    }

    public function search(Request $request)
    {
        $query = MoDoctor::query();
        // $something = MoDoctor2::query();

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

        $doctors = $query->latest()->get();

        return view('mo.doctor.mo_doctor', compact('doctors'));
    }

    public function doctorDetail($id)
    {
        $doctors = MoDoctor::where('id', $id)->first();
        $doctor2 = MoDoctor2::where('mo_doctor_id', $id)->get();
        return view('mo.doctor.mo_doctor_detail', compact('doctors', 'doctor2'));
    }

    public function edit($id)
    {
        $doctors = MoDoctor::where('id', $id)->first();
        $doctor2 = MoDoctor2::where('mo_doctor_id', $id)->get();
        return view('mo.doctor.mo_doctorEdit', compact('doctors', 'doctor2'));
    }

    public function updateDoctor(Request $request, $id)
    {
        // dd($request->toArray());
        $doctor = MoDoctor::find($id);
        $doctor->doctor_name = $request->doctor_name;
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
        $doctor->save();
        $doctorid = $doctor->id;


        MoDoctor2::where('mo_doctor_id', $id)->delete();
        $updateDoctor = MoDoctor2::where('mo_doctor_id', $id)->get();
        $count = count($request->hospitalname);
        for ($i = 0; $i < $count; $i++) {
            if ($i < $updateDoctor->count()) {
                $updateDoctor = $updateDoctor[$i];
                $updateDoctor->hospitalname = $request->input('hospitalname')[$i];
                $updateDoctor->date = $request->input('date')[$i];
                $updateDoctor->time = $request->input('time')[$i];
                $updateDoctor->save();
            } else {
                $doctor2 = new MoDoctor2();
                $doctor2->mo_doctor_id = $doctorid;
                $doctor2->hospitalname = $request->input('hospitalname')[$i];
                $doctor2->date = $request->input('date')[$i];
                $doctor2->time = $request->input('time')[$i];
                $doctor2->save();
            }
        }
        return redirect()->route('doctor')->with('success', 'Doctor Update Is Successfully');
    }
    // delete customer
    public function deleteDocter($id)
    {
        MoDoctor::where('id', $id)->delete();
        MoDoctor2::where('mo_doctor_id', $id)->delete();
        return back()->with('delete_success', 'Customer Account Successfully Deleted!');
    }
}
