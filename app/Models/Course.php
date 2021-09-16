<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'college_id'

    ];

    public function College()
    {
        return $this->belongsTo(College::class);
    }
}
