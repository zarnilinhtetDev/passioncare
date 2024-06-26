<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalVisit extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
