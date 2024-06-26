<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Patient;
use App\Models\PatientAddress;
use App\Models\PatientInsurance;
use App\Models\PatientInitialTest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PatientEmergencyInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phno' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    // return User::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'phno' => $data['phno'],
    //     'password' => Hash::make($data['password']),
    // ]);

    protected function create(array $data)
    {
        // Start a database transaction
        DB::beginTransaction();
        try {
            // Create the user
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phno' => $data['phno'],
                'password' => Hash::make($data['password']),
            ]);
            // Create the profile (or another related record)
            // $user = User::latest()->get()->first();
            // dd($user->id);
            $user_id = new Patient;
            $user_id->user_id = $user->id;
            $user_id->name = $user->name;
            $user_id->email = $user->email;
            $user_id->phno = $user->phno;
            $user_id->save();

            $patientInitialTest = new PatientInitialTest;
            $patientInitialTest->user_id = $user->id;
            $patientInitialTest->patient_id = $user_id->id;
            $patientInitialTest->save();

            $patientInsurance = new PatientInsurance;
            $patientInsurance->user_id = $user->id;
            $patientInsurance->patient_id = $user_id->id;
            $patientInsurance->save();

            $patientEmergencyInfo = new PatientEmergencyInfo;
            $patientEmergencyInfo->user_id = $user->id;
            $patientEmergencyInfo->patient_id = $user_id->id;
            $patientEmergencyInfo->save();

            $patientAddress = new PatientAddress;
            $patientAddress->user_id = $user->id;
            $patientAddress->patient_id = $user_id->id;
            $patientAddress->save();

            // Commit the transaction
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            // Rollback the transaction if anything fails
            DB::rollBack();
            throw $e;
        }
    }
}
