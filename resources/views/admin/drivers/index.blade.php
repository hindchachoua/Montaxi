<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
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
                            @foreach($usersWithDriverRole as $user)
                                @if(!$user->hasRole('admin'))
                                    <tr>
                                        <td><img src="{{ $user->profilepicture }}" alt="{{ $user->name }}" class="rounded-full h-8 w-8"></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->description }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success"><a href="">Edit</a></button>
                                            <form action="{{ route('admin.drivers.destroy', $user) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
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
