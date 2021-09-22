<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serving extends Model
{
    use HasFactory;
    protected $fillable = [
        'counter_id',
        'appointment_id'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
    public function counter()
    {
        return $this->belongsTo(Counter::class);
    }
}
