<?php

namespace App\Http\Controllers;

use App\Models\horaires;
use App\Models\route;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HoraireController extends Controller
{
    
    public function index(){

    }

    public function create(){
        $driver = User::where('id', Auth::user()->id)->first();
        $Routes = route::all();
        return view('horaire.addhoraire', compact('driver', 'Routes'));
    }

    public function store(Request $request){
        $request->validate([
            'date' => 'required',
            'available_seats' => 'required',
            'route_id' => 'required',
        ]);
    
        horaires::create([
            'date' => $request->date,
            'available_seats' => $request->available_seats,
            'driver_id' => $request->driver_id,
            'route_id' => $request->route_id,
        ]);
    
        return redirect(route('driver.index'));
    }
    
}
