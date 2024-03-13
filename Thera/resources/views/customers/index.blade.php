{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Customer List</h2>
    <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">Add Customer</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Username</th>
                <th>Profile Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->fname }}</td>
                    <td>{{ $customer->lname }}</td>
                    <td>{{ $customer->phoneNum }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->username }}</td>
                    <td>
                        @if($customer->images)
                            <img src="{{ asset('uploads/' . $customer->images) }}" alt="Profile Image" style="max-width: 50px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('customers.delete', $customer->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Bootstrap JS and Popper.js scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html> --}}



    @extends('layouts.app')
    @extends('layouts.LinkScript')
    @section('title', 'TheraFlex')
    {{-- @extends('layouts.LinkScript') --}}
    @extends( 'layouts.adminSidebar')
    @section('header')

    @stop



    @section('content')

    <div class="flex flex-col items-center justify-center min-h-screen" style="background: linear-gradient(180deg, rgba(180, 198, 198, 0.97), rgba(81, 183, 79));">
        <div class="text-4xl font-bold text-black mt-4 ml-4">Customer Information</div>
        <!-- Text "Employees Information" -->
        <div class="w-4/5 flex justify-start">

        </div>
        <div class="w-4/5 flex justify-between items-center">
            {{-- <div class="text-4xl font-bold text-black mt-4 ml-4">Services</div> --}}
            <a href="{{ route('customers.create') }}}" class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600 mb-3">Add Employee</a>

        </div>
        <!-- Beautified Table -->
        <div class="w-4/5 p-5 m-2 bg-white bg-opacity-50 shadow-xl rounded-xl">
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="px-4 py-2 border border-gray-400">ID</th>
                        <th class="px-4 py-2 border border-gray-400">First Name</th>
                        <th class="px-4 py-2 border border-gray-400">Last Name</th>
                        <th class="px-4 py-2 border border-gray-400">Phone Number</th>
                        <th class="px-4 py-2 border border-gray-400">Address</th>
                        <th class="px-4 py-2 border border-gray-400">Username</th>
                        <th class="px-4 py-2 border border-gray-400">Profile Pic</th>
                        <th class="px-4 py-2 border border-gray-400">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td class="px-4 py-2 border border-gray-400">{{ $customer->id }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $customer->fname }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $customer->lname }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $customer->phoneNum }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $customer->address }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $customer->username }}</td>
                        <td class="px-4 py-2 border border-gray-400">
                            @if($customer->images)
                                <img src="{{ asset('uploads/' . $customer->images) }}" alt="Profile Image" style="max-width: 50px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="flex-items-center justify-end h-16 px-4 py-2 mt-5 ml-auto mr-40">
                            <div>
                                <a href="{{ route('customers.edit', $customer->id) }}" class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Edit</a>

                                <form action="{{ route('customers.delete', $customer->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 ml-2 text-white bg-red-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-red-600">Delete</button>
                                </form>
                                <a href="{{ route('customer_appointments.index', $customer->id )}}" class="px-3 py-1 ml-2 text-white bg-blue-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-blue-600">Appointments</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @endsection


