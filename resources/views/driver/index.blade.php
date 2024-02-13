<!-- resources/views/driver/index.blade.php -->

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
    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Drivers') }}</div>

                    @if (empty($user->phone) || empty($user->profilepicture) || empty($user->description) || empty($user->immatriculation) || empty($user->car_type) || empty($user->payment))
                    <div>
                        <div class="alert alert-success" role="alert">
                          <h4 class="alert-heading">complete your profile</h4>
                          <p>click on the button below to complete your profile</p>
                          <hr>
                          <a class="btn btn-primary" href="{{ route('driver.completeprofile')}}">complete your profile</a>
                        </div>
                    </div>
                        
                    @endif
                
                






    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
