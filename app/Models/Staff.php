<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'department_id'
    ];

    public function staff()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->whereHas('staff', function ($query) use ($search) {
                $query->where('first_name', 'LIKE', '%' . $search . '%');
            });
    }
}
