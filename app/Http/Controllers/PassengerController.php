<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PassengerController extends Controller
{
    public function index(){

        $usersWithDriverRole = User::role('passenger')->get();

        // Pass the users to the view
        return view('passenger.index', ['users' => $usersWithDriverRole]);    }
}
