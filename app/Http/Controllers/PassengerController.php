<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PassengerController extends Controller
{
    public function index(){        
        $usersWithPassenRole = User::role('passenger')->get(); 
        return view('admin.passengers.index')->with('usersWithPassenRole', $usersWithPassenRole);
        
    }

    public function home(){
        
        $usersWithDriverRole = User::role('passenger')->get();

        // Pass the users to the view
        return view('passenger.index', ['users' => $usersWithDriverRole]);
    }
    public function edit($userId) {
        $user = User::findOrFail($userId);
        return view('admin.passengers.edit')->with('user', $user);
    }
    
}

