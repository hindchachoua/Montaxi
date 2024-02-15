<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class route extends Model
{
    use HasFactory;
    
    public function startcity()
    {
        return $this->belongsTo(City::class, 'start_city');
    }

    public function endcity()
    {
        return $this->belongsTo(City::class, 'arrive_city');
    }
}
