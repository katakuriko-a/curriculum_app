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
    ];

    public function progress() {
        return $this->hasMany(Progress::class);
    }
}
