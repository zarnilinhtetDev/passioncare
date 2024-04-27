<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoDoctor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function moDoctor2s()
    {
        return $this->hasMany(MoDoctor2::class);
    }
}
