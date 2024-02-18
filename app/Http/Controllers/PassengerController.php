<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\horaires;
use App\Models\Bookings;
use App\Models\route;

class PassengerController extends Controller
{
    public function index(){        
        $usersWithPassenRole = User::role('passenger')->get(); 
        return view('admin.passengers.index')->with('usersWithPassenRole', $usersWithPassenRole);
        
        
    }

    public function home(){
        $Routes = route::all();
        $horaires = horaires::whereHas('driver_taxi', function ($query) {
            $query->where('status', 'available');
        })->get();
    
        return view('passenger.index', ['horaires' => $horaires, 'Routes' => $Routes]);
    }
    
    


    public function edit($userId) {
        $user = User::findOrFail($userId);
        return view('admin.passengers.edit')->with('user', $user);
    }

    public function destroy(User $user){

        $user->delete();
        return redirect(route('admin.passengers.index'))->with('success', 'User archived successfully');
    }


    public function reserve(horaires $horaire)
    {
    
        if ($horaire->available_seats <= 0) {
            return redirect()->back()->with('error', 'No available seats for this horaire.');
        }
    
        Bookings::create([
            'passenger_id' => auth()->user()->id,
            'schedule_id' => $horaire->id,
        ]);
    
        $horaire->decrement('available_seats');
    
        return redirect()->back()->with('success', 'Reservation successful!');
    }
    
    public function myreservation(){
        $bookings = Bookings::where('passenger_id', auth()->user()->id)
                            ->where('status', 'active')
                            ->get();
    
        return view('passenger.myreservation', ['bookings' => $bookings]);
    }
    

    public function cancelReservation(Bookings $booking, Request $request) {

        $schedule = horaires::find($booking->schedule_id);
    
        if ($schedule) {
            
            $schedule->available_seats++;
    
            
            $schedule->save();
        }
    
        $booking->status = $request->input('status');
        $booking->save();
    
        return redirect()->route('passenger.home')->with('success', 'User status updated successfully');
    }

    public function myhistory(){
        
        $bookings = Bookings::where('passenger_id', auth()->user()->id)
                            
                            ->get();
        // horaires::whereHas('driver_taxi', function ($query) {
        //                         $query->where('status', 'available');
        //                     })->get();
        
        return view('passenger.historique', ['bookings' => $bookings]);
    }

    public function search(Request $request){
        
        $request->validate([
            'route_id' => 'required',
            'date' => 'required|date',
        ]);
    
        $routeId = $request->input('route_id');
        $date = $request->input('date');
    
        $horaires = horaires::whereHas('driver_taxi', function ($query) {
            $query->where('status', 'available');
        })
        ->where('route_id', $routeId)
        ->whereDate('date', '=', $date)
        ->get();
    

        return view('passenger.search', compact('horaires'));
    }
    
    
}

