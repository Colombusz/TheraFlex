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
{{--
@php
    dd($appointments);
@endphp --}}

@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')
{{-- @extends('layouts.LinkScript') --}}
@extends( 'layouts.adminSidebar')
@section('header')

@stop



@section('content')

<div class="flex flex-col items-center justify-center min-h-screen" style="background: linear-gradient(180deg, rgba(180, 198, 198, 0.97), rgba(81, 183, 79));">
    <div class="text-4xl font-bold text-black mt-4 ml-4">{{ $customer->fname }}'s Appointment Information</div>
    <!-- Text "Employees Information" -->
    <div class="w-4/5 flex justify-start">

    </div>
    <!-- Beautified Table -->
    <div class="w-4/5 p-5 m-2 bg-white bg-opacity-50 shadow-xl rounded-xl">
    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-700 text-white">
                    <th class="px-4 py-2 border border-gray-400">ID</th>
                    <th class="px-4 py-2 border border-gray-400">Date</th>
                    <th class="px-4 py-2 border border-gray-400">Time</th>
                    <th class="px-4 py-2 border border-gray-400">Status</th>
                    <th class="px-4 py-2 border border-gray-400">Subtotal</th>


                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr>
                    <td class="px-4 py-2 border border-gray-400">{{ $appointment->id }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{ $appointment->targetdate }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{ $appointment->time }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{ $appointment->status }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{ $appointment->subtotal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection


