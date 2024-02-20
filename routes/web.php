<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\passengerController;
use App\Http\Controllers\HoraireController;
use App\Http\Controllers\OrderController;
use App\Models\passenger;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\RateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/' , [passengerController::class , 'index'])->name('index');
    
    Route::get('/drivers' , [DriverController::class , 'showUsersWithDriverRole'])->name('drivers.index');
    Route::resource('/passengers' , PassengerController::class);

    Route::get('/passengers/{user}/edit', [PassengerController::class, 'edit'])->name('passengers.edit');

    Route::delete('/drivers/{user}', [DriverController::class, 'destroy'])->name('drivers.destroy');

 Route::post('/passengers/{user}', [passengerController::class, 'destroy'])->name('passengers.destroy');

 Route::get('/orders', [OrderController::class, 'index'])->name('order.index');

});



// Route::get('/admin',[RolesController::class ,'index'])->name('admin.index');

// Route::get('/driver/dashboard', function () {    
//      return view('driver.dashboard');
// })->middleware(['auth','role:driver'])->name('driver.dashboard');

Route::middleware(['auth', 'role:driver'])->prefix('driver')->group(function () {
    Route::get('/' , [DriverController::class , 'index'])->name('driver.index');
    Route::get('/driver', [DriverController::class, 'index']);
    Route::get('/completeprofile', [DriverController::class, 'completeprofile'])->name('driver.completeprofile');
    Route::resource('/horaire', HoraireController::class); 
    Route::get('/addhoraire', [HoraireController::class, 'create'])->name('driver.addhoraire');

    
Route::put('/{user}/update', [DriverController::class ,'updateuser'])->name('driver.update');

Route::put('/{user}/updatestatus', [DriverController::class ,'updatestatus'])->name('driver.updatestatus');
    // Route::put('/{user}/update', [DriverController::class ,'updateuser'])->name('driver.update');
});







// Route::get('/driver',[DriverController::class ,'index'])->name('driver.index');

Route::middleware(['auth', 'role:passenger'])->name('passenger.')->prefix('passenger')->group(function () {
    Route::get('/' , [PassengerController::class , 'home'])->name('home');
    Route::get('/myreservation' , [PassengerController::class , 'myreservation'])->name('myreservation');
    Route::put('/{booking}/updatestatus', [PassengerController::class ,'cancelReservation'])->name('updatestatus');

    Route::get('/myhistory' , [PassengerController::class , 'myhistory'])->name('myhistory');

    Route::post('/search', [PassengerController::class, 'search'])->name('search');


    Route::get('/rate/{rate}',[RateController::class,'index'])->name('rate.index');
});

Route::post('/passenger/reserve/{horaire}', [PassengerController::class, 'reserve'])->name('passenger.reserve');


// Route::get('/driver', [DriverController::class, 'showUsersWithDriverRole']);

require __DIR__.'/auth.php';
