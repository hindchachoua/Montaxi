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

        <form action="{{ route('passenger.search')}}" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
            @csrf    
            <div class="mb-4">
                <label for="route" class="block text-sm font-medium text-gray-600">route:</label>
                <select name="route_id" required class="mt-1 p-2 border rounded-md w-full">
                    @foreach ($Routes as $item)
                        <option value="{{ $item->id }}">{{ $item->startcity->name }} to {{ $item->endcity->name }}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-600">date:</label>
                <input type="date" name="date" required class="mt-1 p-2 border rounded-md w-full">
            </div>
            <div class="mb-4 flex justify-center">
                <button class="ms-4 btn btn-success">
                    {{ __('Search') }}
                </button>   
            </div>
        </form>
        
       

        <div>
            <h1 style="font-family: bold; font-size: 50px; text-align: center; text-decoration: underline; margin-top: 50px; margin-bottom: 50px">All Schedules:</h1>
            
            @if($horaires->isEmpty())
            <div class="card">
                <div  class="card mt-5 mb-5 p-5 text-center shadow bg-white rounded md bg-white p-6 rounded-md shadow-md dark:bg-gray-800 dark:border-gray-700 ">
                    <p class="alert alert-info">No horaires added yet.</p>
                </div>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 g-4 " style="margin-bottom: 20px">
                @foreach ($horaires as $horaire)
                    <div class="col">
                        <div class="card " style="background-color: rgba(255, 255, 255, 0.452)">
                            <div class="card-body" style="background-color: rgba(84, 0, 99, 0.358); width: 50%; height: 50%;margin-left: 25%">
                                <h1 class="text-center" style="font-size: 30px; color: rgb(0, 104, 17); font-weight: bold">{{ $horaire->route->startcity->name }} to {{ $horaire->route->endcity->name }}</h1>
                                <h5 class="card-title text-center mt-2" style="font-weight: bold; text-decoration: underline">Date: {{ $horaire->date }} </h5>
                                <h1 class="card-text" style=" text-decoration: underline">Available Seats: </h1>
                                <p class="card-text ml-3">{{ $horaire->available_seats }}</p>
                                <div style="margin-left: 85%">
                                <h1 style="font-weight: bold; text-decoration: underline">price: </h1>
                                <p class="card-text" style="font-weight: bold;">{{ $horaire->getpriceAttribute() }} DH</p>
                                </div>
                                <img src="{{ asset('storage/images/route.png') }}" alt="">
                                                               
                                {{-- <a href="{{ route('horaire.edit', $horaire->id) }}" class="btn btn-primary" style="margin-left: 80%">Pause</a> --}}
                                
                                @if ( $horaire->available_seats == 0)
                                    <p class="alert alert-danger">No available seats</p>
                                    
                                @else
                                <form action="{{ route('passenger.reserve', $horaire->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success mt-2">Reserve</button>
                                </form>  
                                @endif
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
        </div>



        @include('layouts.footer')




        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
    </html>
