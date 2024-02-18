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

        <div  style="margin-top: 120px">
        

        <form action="{{ route('horaire.store')}}" method="POST"  class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">

            @csrf    
            <div class="mb-4">
                <label for="route" class="block text-sm font-medium text-gray-600">route:</label>
                <select name="route_id" required class="mt-1 p-2 border rounded-md w-full">
                 @foreach ($Routes as $item)
                 <option value="{{ $item->id }}">{{$item->startcity->name  }}  to  {{ $item->endcity->name }}</option>
                 @endforeach
                 <input type="number" name="driver_id" hidden value="{{ $driver->id }}" required class="mt-1 p-2 border rounded-md w-full">

        
                   
                </select>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-600">date:</label>
                <input type="date" name="date" required class="mt-1 p-2 border rounded-md w-full">
            </div>
            <div class="mb-4">
                <label for="available_seats" class="block text-sm font-medium text-gray-600">available_seats:</label>
                <input type="number" name="available_seats" required class="mt-1 p-2 border rounded-md w-full">
            </div>
            <div class="mb-4 flex justify-center">
                <button class="ms-4 btn btn-success">
                    {{ __('add my horaire') }}
                </button>   
            </div>
        
        </form>

    </div>

    @include('layouts.footer')




    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>