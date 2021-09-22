<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function serving()
    {
        return $this->hasOne(Serving::class, 'counter_id');
    }


    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('description', 'like', '%' . $search . '%');
    }
}
