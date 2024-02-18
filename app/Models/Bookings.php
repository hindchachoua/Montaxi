<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        'passengers' ,
        'total_price',
        'status',
        'passenger_id',
        'schedule_id',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function horaire()
    {
        return $this->belongsTo(horaires::class);
    }
}
