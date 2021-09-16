<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'service_id',
        'queuing_number',
        'scheduled_date',
        'first_name',
        'middle_name',
        'last_name',
        'course_id',
        'email',
        'contact_number',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    public function routeNotificationForNexmo($notification)
    {
        return $this->contact_number;
    }
}
