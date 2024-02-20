<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rate extends Model
{
    use HasFactory;
    protected $fillable=[
      
        'driver_id',
        'rate',
        'passenger_id',
    ];
    use SoftDeletes;

    
    public function driver_taxi()
    {
        return $this->belongsTo(User::class,'driver_id');
    }
    public function rate()
    {
        return $this->hasMany(rate::class,'driver_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}