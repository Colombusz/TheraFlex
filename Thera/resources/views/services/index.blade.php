<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Services
    </h1>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>service name</th>
                <th>service description</th>
                <th>hours per session</th>
                <th>price per hout</th>
                <th>Image</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            @foreach($query as $somth)

                <tr>
                    <td>{{$somth->id}}</td>
                    <td>{{$somth->servicetype}}</td>
                    <td>{{$somth->description}}</td>
                    <td>{{$somth->hours}}</td>
                    <td>{{$somth->price}}</td>
                    <td>
                        @if($somth->images)
                        <img src="{{ asset('serviceimage/' . $somth->images) }}" alt="Profile Image" style="max-width: 50px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>

                        <a href="{{ route('services.edit', ['id'=>$somth->id]) }}">EDIT</a>
                    </td>
                    <td>

                        <form method="POST" action="{{ route('services.delete', ['id' => $somth->id]) }}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
{{-- @extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')

@section('header')
@parent
@stop

@section('content')
<div class="relative flex items-center justify-center bg-center bg-cover" style="background-image: url('images/springfields.jpeg'); height: 100vh;">

    <!-- Beautified Table -->
    <div class="w-1/2 p-5 m-2 bg-white shadow-xl rounded-xl">
        <h1 class="text-4xl font-bold text-black">Employee Information (Mockup)</h1>
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 border border-gray-400">First Name</th>
                        <th class="px-4 py-2 border border-gray-400">Last Name</th>
                        <th class="px-4 py-2 border border-gray-400">Phone Number</th>
                        <th class="px-4 py-2 border border-gray-400">Address</th>
                        <th class="px-4 py-2 border border-gray-400">Username</th>
                        <th class="px-4 py-2 border border-gray-400">Password</th>
                        <th class="px-4 py-2 border border-gray-400">Actions</th> <!-- New column for actions -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border border-gray-400">John</td>
                        <td class="px-4 py-2 border border-gray-400">Doe</td>
                        <td class="px-4 py-2 border border-gray-400">+1234567890</td>
                        <td class="px-4 py-2 border border-gray-400">1234 Main St</td>
                        <td class="px-4 py-2 border border-gray-400">johndoe123</td>
                        <td class="px-4 py-2 border border-gray-400">********</td>
                        <td class="px-4 py-2 border border-gray-400">
                            <button class="px-3 py-1 text-white bg-blue-500 rounded-md">Update</button>
                            <button class="px-3 py-1 ml-2 text-white bg-red-500 rounded-md">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection --}}
