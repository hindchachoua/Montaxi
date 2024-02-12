<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class passenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'password',
        'role' => 'passenger',
        'profilepicture',
        'phone',
        'description',
    ];
}
