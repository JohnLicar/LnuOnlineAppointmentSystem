<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'description',
        'vp_id',
        'chairman_id'
    ];

    public function vice_pres()
    {
        return $this->belongsTo(User::class, 'vp_id');
    }

    public function chairman()
    {
        return $this->belongsTo(User::class, 'chairman_id');
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('description', 'like', '%' . $search . '%');
    }
}
