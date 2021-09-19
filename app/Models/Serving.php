<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serving extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_id'
    ];
}
