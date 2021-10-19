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
        'service_id',
        'scheduled_date',
        'first_name',
        'middle_name',
        'last_name',
        'course_id',
        'email',
        'contact_number',
        'serving',
        'waiting'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }


    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('service_id', $search);
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
