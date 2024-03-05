@vite(['../../css/admin.css','../../js/admin.js'])
@extends( 'layouts.adminSidebar')
{{-- <!DOCTYPE html>
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
</html> --}}
@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')

@section('header')
@parent
@stop

@section('content')
<!-- Services Information -->
<div class="flex flex-col items-center justify-center min-h-screen" style="background: linear-gradient(180deg, rgba(180, 198, 198, 0.97), rgba(81, 183, 79));">
    <!-- Products Information -->
    <div class="w-4/5 flex justify-between items-center">
        <div class="text-4xl font-bold text-black mt-4 ml-4">Services</div>
        <button class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Create</button>
    </div>

    <!-- Beautified Table for Services -->
    <div class="w-4/5 p-5 m-2 bg-white bg-opacity-50 shadow-xl rounded-xl">
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="px-4 py-2 border border-gray-400">Service Name</th>
                        <th class="px-4 py-2 border border-gray-400">Service Name</th>
                        <th class="px-4 py-2 border border-gray-400">Description</th>
                        <th class="px-4 py-2 border border-gray-400">Price per Hour</th>
                        <th class="px-4 py-2 border border-gray-400">Hours per Session</th>
                        <th class="px-4 py-2 border border-gray-400">Service Image</th>
                        <th class="px-4 py-2 border border-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border border-gray-400">Service Name 1</td>
                        <td class="px-4 py-2 border border-gray-400">Service Name 1</td>
                        <td class="px-4 py-2 border border-gray-400">Service Description 1</td>
                        <td class="px-4 py-2 border border-gray-400">$50</td>
                        <td class="px-4 py-2 border border-gray-400">2 hours</td>
                        <td class="px-4 py-2 border border-gray-400"><img src="path_to_image" alt="Service Image" class="w-16 h-16"></td>
                        <td class="px-4 py-2 border border-gray-400">
                            <button class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Edit</button>
                            <button class="px-3 py-1 ml-2 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Delete</button>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
