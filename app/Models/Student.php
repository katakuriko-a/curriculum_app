<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'birth',
        'mail',
        'tel',
        'plan',
        'level_id',
    ];

    protected $guarded = ['id'];

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, "reserves")->withTimestamps()->withPivot('id', 'start_time','end_time');
    }
}
