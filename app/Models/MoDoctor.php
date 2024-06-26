<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ticket;
use App\Models\HospitalOngoing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoDoctor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, "doctor_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function moDoctor2s()
    {
        return $this->hasMany(MoDoctor2::class);
    }

    public function hospital_ongoings()
    {
        return $this->hasMany(HospitalOngoing::class);
    }
}
