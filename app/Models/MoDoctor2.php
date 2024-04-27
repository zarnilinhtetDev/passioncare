<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoDoctor2 extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function moDoctor()
    {
        $this->belongsTo(MoDoctor::class);
    }
}
