<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-left: 250px">
                <h1 class="text-center mt-5 mb-5" style="font-size: 50px; color: rgb(0, 0, 0); font-weight: bold">All Passengers:</h1>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-bordered table table-dark table-hover table-striped table-responsive w-full text-lg text-gray-500 dark:text-gray-400" style="background-color: rgb(58, 25, 61)">
                        <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Description</th>
                                <th>Actions</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usersWithPassenRole as $user)
                                @if(!$user->hasRole('admin'))
                                    <tr>
                                        <td><img src="{{ $user->profilepicture }}" alt="{{ $user->name }}" class="rounded-full h-8 w-8"></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->description }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success"><a href="{{ route('admin.passengers.edit', $user->id) }}">Edit</a></button>
                                            <form action="{{ route('admin.passengers.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-danger">Archive</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

@include('layouts.footer')
