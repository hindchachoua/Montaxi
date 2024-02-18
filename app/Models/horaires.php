<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horaires extends Model
{
    use HasFactory;

    protected $table = 'driver_schedules';
    protected $fillable = [
        'date',
        'available_seats',
        'driver_id',
        'route_id',
    ];

    public function driver_taxi()
{
    return $this->belongsTo(User::class,'driver_id');
}
// public function routes()
//     {
//         return $this->belongsTo(route::class, 'route');
//     } 


public function schedules()
    {
        return $this->hasMany(horaires::class, 'driver_id', 'user_id');
    }

public function route()
{
    return $this->belongsTo(route::class, 'route_id');
}

    public function getStartCityNameAttribute()
    {
        return optional(optional($this->route)->startcity)->name;
    }

    public function getEndCityNameAttribute()
    {
        return optional(optional($this->route)->endcity)->name;
    }

    public function getpriceAttribute()
    {
        return $this->route->price;
    }
    
}
