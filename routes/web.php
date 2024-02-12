<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\passengerController;


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
    Route::get('/' , [IndexController::class , 'index'])->name('index');
    // Route::resource('/roles' , RolesController::class);
    // Route::resource('/permissions' , PermissionController::class);
});

// Route::get('/driver/dashboard', function () {    
//      return view('driver.dashboard');
// })->middleware(['auth','role:driver'])->name('driver.dashboard');

Route::middleware(['auth', 'role:driver'])->name('driver.')->prefix('driver')->group(function () {
    Route::get('/' , [DriverController::class , 'index'])->name('index');
Route::get('/driver', [DriverController::class, 'index']);

});


// Route::get('/driver',[DriverController::class ,'index'])->name('driver.index');
Route::middleware(['auth', 'role:passenger'])->name('passenger.')->prefix('passenger')->group(function () {
    Route::get('/' , [PassengerController::class , 'index'])->name('index');
});
// Route::get('/driver', [DriverController::class, 'showUsersWithDriverRole']);

require __DIR__.'/auth.php';
