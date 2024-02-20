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

    public function passenger()
    {
        return $this->belongsTo(User::class, 'passenger_id', 'id');
    }

    public function horaire()
    {
        return $this->belongsTo(horaires::class, 'schedule_id');
    }

    public function schedule(){

        return $this->belongsTo(horaires::class, 'schedule_id');
    }

    

}
