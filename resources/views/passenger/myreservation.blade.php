<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="background-image: linear-gradient(to left, rgb(210, 210, 210), rgb(171, 87, 199));">
    
        @include('layouts.navigation')
        
        <h1 class="text-center mt-5" style="font-size: 50px; color: rgb(0, 0, 0); font-weight: bold;font-family: 'Times New Roman', Times, serif">Your Reservation:</h1>

        <div class="container " style="justify-content: space-between; display: flex; flex-wrap: wrap;">
            @if ($bookings->isEmpty())
                <div class="card mt-5 mb-5 p-5 text-center shadow bg-white rounded md bg-white p-6 rounded-md shadow-md dark:bg-gray-800 dark:border-gray-700 ">
                    <p class="alert alert-info" style="font-family: 'Times New Roman', Times, serif">No bookings added yet.</p>
                </div>
                
            @endif
            @foreach ($bookings as $booking)
        
            <div class="card-group">
            <div class="card mb-3 mt-5 p-5 text-center shadow bg-white rounded md bg-white p-6 rounded-md shadow-md dark:bg-gray-800 dark:border-gray-700 ">
              <img src="{{ asset('storage/images/route.png  ') }}" class="card-img-top"
                alt="historique" style="height: 200px; width: 100%; object-fit: cover; object-position: center;"  />
              <div class="card-body">
                {{-- <h5 class="card-title">{{ $booking->}} to {{ $booking->getEndCityNameAttribute }} </h5>
                <p class="card-text"> --}}
                    {{ $booking->horaire_id }} 
                </p>
                <p class="card-text" style="font-family: 'Times New Roman', Times, serif">
                  Your Name:  {{ $booking->passenger->name }}
                </p>
                <p class="card-text" style="font-family: 'Times New Roman', Times, serif"><a href="">
                  Name of Driver: {{ optional($booking->horaire->driver_taxi)->name ?? 'No Driver'}}
                </a>
              </p>
                <p class="card-text">
                  <small class="text-muted">Date of Order: {{ $booking->created_at }} </small>
                </p>

                <h3 style="margin-top: 20px; text-decoration: underline; margin-bottom: 10px;font-family: 'Times New Roman', Times, serif; font-weight: bold">Status:</h3>
                <form action="{{ route('passenger.updatestatus', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" id="status" onchange="this.form.submit()">
                    <option value="active" {{ ($booking->status == 'active') ? 'selected' : '' }}>{{ $booking->status }}</option>
                    <option value="canceled" {{ ($booking->status == 'canceled') ? 'selected' : '' }}>canceled</option>
                    {{-- <option value="valid" {{ ($booking->status == 'valid') ? 'selected' : '' }}>valid</option> --}}

                    </select>
                </form>
              </div>
            </div>
            
          
        
          </div>
          @endforeach
          
        </div>

       



        @include('layouts.footer')
        
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
    </html>
