<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientHealthRecord extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class,'conservation_id');
    }
}
