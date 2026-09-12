<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'teacher_id',
        'start_time',
        'end_time',
        'teacher_name',
        'student_name',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
