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

        <div class="max-w-7xl mx-auto py-6 px-4 " >
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div>
                    <label class="form-label" style="font-family: Georgia, serif; text-decoration: underline">Profile Picture</label>
                    @if($user->profilepicture)
                        <img src="{{ asset($user->profilepicture) }}" alt="Profile Picture" width="200" height="200" style="margin-left: 100px" >
                    @else
                        <p>No image available</p>
                    @endif
                </div>
                <div>
                    <label class="form-label" style="font-family: Georgia, serif;">Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Name" value="{{ $user->name }}">
                </div>
                <div>
                    <label class="form-label" style="font-family: Georgia, serif;">Email</label>
                    <input class="form-control" type="text" name="email" placeholder="Email" value="{{ $user->email }}">
                </div>
                <div>
                    <label class="form-label" style="font-family: Georgia, serif;">Phone</label>
                    <input class="form-control" type="text" name="phone" placeholder="Phone" value="{{ $user->phone }}">
                </div>
                <div>
                    <label class="form-label" style="font-family: Georgia, serif;">Description</label>
                    <input class="form-control" type="text" name="description" placeholder="Description" value="{{ $user->description }}">
                </div>
                <div>
                    <label class="form-label" style="font-family: Georgia, serif;">immatriculation</label>
                    <input class="form-control" type="text" name="immatriculation" placeholder="immatriculation" value="{{ $user->immatriculation }}">
                </div>
                <div>
                    <label class="form-label" style="font-family: Georgia, serif;">car_type</label>
                    <input class="form-control" type="text" name="car_type" placeholder="car_type" value="{{ $user->car_type }}">
                </div>
                <div>
                    <label class="form-label" style="font-family: Georgia, serif;">payment</label>
                    <input class="form-control" type="checkbox" name="payment" placeholder="payment" value="{{ $user->payment }}">
                </div>
                <div>
                    <label class="form-label" style="font-family: Georgia, serif;">New Image for profile</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div style="font-family: Georgia, serif; margin-top: 20px">
                    <input class="btn btn-primary" type="submit" value="Done" />
                </div>
            </form>
        </div>
    

        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>