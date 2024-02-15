<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\horaires; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
;

class DriverController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Retrieve users with the 'driver' role
        $usersWithDriverRole = User::role('driver')->get();

        $profileIncomplete = empty($user->phone) || empty($user->description) || empty($user->immatriculation) || empty($user->car_type) || empty($user->payment);

        // Retrieve horaires for the authenticated driver
        $horaires = horaires::where('driver_id', $user->id)->get();

        // Pass the users and horaires to the view
        return view('driver.index', ['user' => $user, 'profileIncomplete' => $profileIncomplete, 'horaires' => $horaires]);
    }

    public function completeprofile(User $user)
    {
        $user = Auth::user();

        return view('driver.complete', ['user' => $user]);
    }



public function updateuser(User $user, Request $request)
{
    $data = $request->all();

    $user->update($data);

    return redirect(route('driver.index'))->with('success', 'User updated successfully');
    

}

public function showUsersWithDriverRole(){
    $usersWithDriverRole = User::role('driver')->get();
    return view('admin.drivers.index')->with('usersWithDriverRole', $usersWithDriverRole);
}

public function destroy(User $user){

    $user->delete();
    return redirect(route('admin.drivers.index'))->with('success', 'User archived successfully');
}

public function updatestatus(User $user, Request $request){
    // dd($user);
    $user->status = $request->input('status');
    $user->save();
    return redirect(route('driver.index'))->with('success', 'User status updated successfully');

}


}

