<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'contact_number',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function vice_pres()
    {
        return $this->hasOne(Department::class, 'vp_id');
    }
    public function chairman()
    {
        return $this->hasOne(Department::class, 'chairman_id');
    }
    public function department_staff()
    {
        return $this->hasOne(
            Staff::class
        );
    }


    public function getFullNameAttribute()
    {
        return sprintf(
            '%s %s',
            $this->first_name,
            $this->last_name
        );
    }


    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('first_name', 'like', '%' . $search . '%')
            ->OrWhere('last_name', 'like', '%' . $search . '%')
            ->OrWhere('email', 'like', '%' . $search . '%');
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->password = Hash::make($user->last_name);
        });
    }
}
