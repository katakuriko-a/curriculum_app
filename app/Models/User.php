<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'birth',
        'mail',
        'tel',
        'plan',
        'experience_month',
        'skill',
        'roles_id',
        'fee',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    
}
