<?php

// app/Http/Controllers/DriverController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        // Retrieve users with the 'driver' role
        $usersWithDriverRole = User::role('driver')->get();

        // Pass the users to the view
        return view('driver.index', ['users' => $usersWithDriverRole]);
    }
}

