<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class driver extends Model
{
    use HasFactory , HasRoles;
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'role' => 'driver',
        'profilepicture',
        'phone',
        'description',
        'immatriculation',
        'car_type',
        'payment',
        'status',
    ];
}
