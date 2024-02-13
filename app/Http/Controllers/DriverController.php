<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index()
    {
        // Retrieve users with the 'driver' role
        $usersWithDriverRole = User::role('driver')->get();

        // Pass the users to the view
        return view('driver.index', ['users' => $usersWithDriverRole]);
    }

    public function completeprofile()
    {
        $user = Auth::user(); // Retrieve the authenticated user (driver)

        return view('driver.complete', ['user' => $user]);
    }
}

