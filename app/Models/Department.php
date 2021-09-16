<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
    ];

    public function vice_pres()
    {
        return $this->hasMany(User::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
