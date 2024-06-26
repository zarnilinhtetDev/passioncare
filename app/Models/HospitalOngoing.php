<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HospitalOngoing extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function modoctor()
    {
        return $this->belongsTo(MoDoctor::class, 'doctor_id');
    }
}
