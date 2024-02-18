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

        
        <h1 class="text-center mt-5" style="font-size: 50px; color: rgb(0, 0, 0); font-weight: bold">Your History:</h1>

        <div>
            @if ($bookings->isEmpty())
                <div class="card mt-5 mb-5 p-5 text-center shadow bg-white rounded md bg-white p-6 rounded-md shadow-md dark:bg-gray-800 dark:border-gray-700 ">
                    <p class="alert alert-info">No bookings added yet for your history.</p>
                </div>
                
            @endif
            
            <div class="card-group ">
            @foreach ($bookings as $booking)
        
            <div class="card mb-3 mt-5 p-5 text-center shadow bg-white rounded md bg-white p-6 rounded-md shadow-md dark:bg-gray-800 dark:border-gray-700 " >
              <img src="{{ asset('storage/images/route.png') }}" class="card-img-top"
                alt="historique" style="height: 100px; width: 100%; object-fit: cover; object-position: center;"  />
              <div class="card-body">
                <h5 class="card-title">{{ $booking->schedule_id }} </h5>
                <p class="card-text">
                    {{ $booking->horaire_id }} 
                </p>
                <p class="card-text">
                    {{ $booking->passenger_id }}
                </p>
                <p class="card-text">
                  <small class="text-muted"> {{ $booking->created_at }} </small>
                </p>
                <button class="btn btn-success">{{ $booking->status }}</button>
              </div>
            </div>
            
          
        </div>
          @endforeach
        </div>
        </div>

       



        @include('layouts.footer')
        
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
    </html>
