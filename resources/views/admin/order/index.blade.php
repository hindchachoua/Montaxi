<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="margin-left: 300px">
                
                <h1 class="text-center mt-5 mb-5" style="font-size: 50px; color: rgb(0, 0, 0); font-weight: bold">All Orders Active:</h1>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-bordered table table-dark table-hover table-striped table-responsive w-full text-lg text-gray-500 dark:text-gray-400" style="background-color: rgb(58, 25, 61)">
                        <thead>
                            <tr>
                                <th>Name passenger</th>
                                <th>Date of order</th>
                                <th>Start City</th> 
                                <th>End City</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->passenger->name }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ optional(optional($order->schedule)->route->startcity)->name }}</td>
                                    <td> {{ optional(optional($order->schedule)->route->endcity)->name }}</td>
                                    
                                    <td>{{ $order->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
