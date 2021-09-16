<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'code',
        'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('description', 'like', '%' . $search . '%')
            ->OrWhere('code', 'like', '%' . $search . '%')
            ->orWhereHas('department', function ($query) use ($search) {
                $query->where('description', 'LIKE', '%' . $search . '%');
            });
    }

    public function getCodeAttribute($code)
    {
        return strtoupper($code);
    }
}
