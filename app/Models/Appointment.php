<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'queuing_number',
        'department_id',
        'scheduled_date',
        'first_name',
        'middle_name',
        'last_name',
        'course_id',
        'email',
        'contact_number',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->contact_number;
    }

    public function getFullNameAttribute()
    {
        return sprintf(
            '%s %s',
            $this->first_name,
            $this->last_name
        );
    }
}
