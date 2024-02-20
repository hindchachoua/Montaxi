<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Bookings::with('horaire.driver_taxi')->where('status', 'active')->get();
        return view('admin.order.index', compact('orders'));
    }
}
