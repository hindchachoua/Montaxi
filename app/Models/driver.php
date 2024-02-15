<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class driver extends User
{
    use HasFactory , HasRoles;

    // protected $table = 'users'; 
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'profilepicture',
    //     'phone',
    //     'description',
    //     'immatriculation',
    //     'car_type',
    //     'payment',
    //     'status',
    // ];
    

    
}
