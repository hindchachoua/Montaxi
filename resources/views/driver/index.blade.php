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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(84, 0, 99, 0.211)">

                    @if ($profileIncomplete)
                    <div class="card-body" style="margin-bottom: 50px">
                        <div class="alert alert-success" role="alert">
                          <h4 class="alert-heading" style="text-decoration: underline; font-weight: bold; margin-bottom: 20px">complete your profile:</h4>
                          <p>click on the button below to complete your profile</p>
                          <hr style="margin-top: 20px">
                          <a class="btn btn-primary" style="margin-top: 30px" href="{{ route('driver.completeprofile')}}">complete your profile</a>
                        </div>
                    </div>

                        
                    @else
                </div>
                <div class="">
                    <div class="d-flex justify-content-between align-items-center my-5 mx-4">
                        <a href="{{ route('driver.addhoraire') }}" class="btn bg-blue-800 text-white p-2 rounded">
                            Add Horaire
                        </a>
                    
                        <div>
                            <h1 style="font-family: bold; font-size: 30px">Status</h1>
                            <form action="{{ route('driver.updatestatus', $user->id)}}" method="POST" class="d-flex align-items-center">
                                @csrf
                                @method('PUT')
                                <select name="status" id="status" onchange="this.form.submit()" class="mx-2">
                    
                                    <option value="available" {{ ($user->status == 'available') ? 'selected' : '' }}> Available</option>
                                    <option value="driving" {{ ($user->status == 'driving') ? 'selected' : '' }}> Driving</option>                                    
                                    <option value="unavailable" {{ ($user->status == 'unavailable') ? 'selected' : '' }}> Unavailable</option>
                    
                                </select>
                            </form>
                        </div>
                    </div>
                    
                        <div>
                            <h1 style="font-family: bold; font-size: 50px; text-align: center; text-decoration: underline; margin-bottom: 20px">Your Schedules</h1>
                            
                            @if($horaires->isEmpty())
                            <div class="card">
                                <div class="card-body">
                                    <p class="alert alert-info">No horaires added yet.</p>
                                </div>
                            </div>
                        @else
                            <div class="row row-cols-1 row-cols-md-2 g-4 " style="margin-bottom: 20px">
                                @foreach ($horaires as $horaire)
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
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
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        
                        </div>
                    @endif
                
                
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')




    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
