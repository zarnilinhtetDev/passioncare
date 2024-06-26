<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function health_records()
    {
        return $this->hasMany(PatientHealthRecord::class);
    }

    public function hospital_ongoings()
    {
        return $this->hasMany(HospitalOngoing::class);
    }

    public function hospital_bookings()
    {
        return $this->hasMany(HospitalBooking::class);
    }
}
