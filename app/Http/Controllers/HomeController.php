<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientAddress;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function mo_home()
    {
        $patients = Patient::latest()->get();
        $patientAddresses = PatientAddress::latest()->get();
        return view('mo.home.index', compact('patients', 'patientAddresses'));
    }
}
