{{-- @vite(['../../css/admin.css','../../js/admin.js'])
@extends( 'layouts.adminSidebar')

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
                <th>product name</th>
                <th>product description</th>
                <th>Quantity</th>
                <th>price per piece</th>
                <th>Image</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            @foreach($query as $somth)

                <tr>
                    <td>{{$somth->id}}</td>
                    <td>{{$somth->productname}}</td>
                    <td>{{$somth->description}}</td>
                    <td>{{$somth->quantity}}</td>
                    <td>{{$somth->price}}</td>
                    <td>
                        @if($somth->images)
                        <img src="{{ asset('productimage/' . $somth->images) }}" alt="Profile Image" style="max-width: 50px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>

                        <a href="{{ route('products.edit', ['id'=>$somth->id]) }}">EDIT</a>
                    </td>
                    <td>

                        <form method="POST" action="{{ route('products.delete', ['id' => $somth->id]) }}" >
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
{{--
@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')
@vite(['../../css/admin.css','../../js/admin.js'])
@extends( 'layouts.adminSidebar')
@section('header')
@parent


@section('content')
<div class="flex flex-col items-center justify-center min-h-screen" style="background: linear-gradient(180deg, rgba(180, 198, 198, 0.97), rgba(81, 183, 79));">
    <!-- Products Information -->
    <div class="w-4/5 flex justify-between items-center">
        <div class="text-4xl font-bold text-black mt-4 ml-4">Products Information</div>
        <button class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Create</button>
    </div>

    <!-- Beautified Table for Products -->
    <div class="w-4/5 p-5 m-2 bg-white bg-opacity-50 shadow-xl rounded-xl">
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="px-4 py-2 border border-gray-400">Product ID</th>
                        <th class="px-4 py-2 border border-gray-400">Product Name</th>
                        <th class="px-4 py-2 border border-gray-400">Description</th>
                        <th class="px-4 py-2 border border-gray-400">Quantity</th>
                        <th class="px-4 py-2 border border-gray-400">Price</th>
                        <th class="px-4 py-2 border border-gray-400">Product Image</th>
                        <th class="px-4 py-2 border border-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($query as $somth)
                        <td class="px-4 py-2 border border-gray-400">{{$somth->id}}</td>
                        <td class="px-4 py-2 border border-gray-400">{{$somth->productname}}</td>
                        <td class="px-4 py-2 border border-gray-400">{{$somth->description}}</td>
                        <td class="px-4 py-2 border border-gray-400">{{$somth->quantity}}</td>
                        <td class="px-4 py-2 border border-gray-400">{{$somth->price}}</td>
                        <td class="px-4 py-2 border border-gray-400"><img src="{{ asset('productimage/' . $somth->images) }}" alt="Product Image" class="w-16 h-16"></td>
                        <td class="px-4 py-2 border border-gray-400">
                        <button href="{{ route('products.edit', ['id'=>$somth->id]) }}" class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Edit</button>
                        <form method="POST" action="{{ route('products.delete', ['id' => $somth->id]) }}" >
                            @csrf
                            @method('DELETE')
                            <button type = "submit" class="px-3 py-1 ml-2 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Delete</button>
                        </form>

                        </td>
                        @endforeach
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>


@endsection --}}

 @extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')
@extends( 'layouts.adminSidebar')

@section('header')
@parent
@stop

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen" style="background: linear-gradient(180deg, rgba(180, 198, 198, 0.97), rgba(81, 183, 79));">
    <!-- Products Information -->
    <div class="w-4/5 flex justify-between items-center">
        <div class="text-4xl font-bold text-black mt-4 ml-4">Products Information</div>
        <a href="{{ route('products.create') }}" class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">
            <button type="button">Create</button>
        </a>>
    </div>

    <!-- Beautified Table for Products -->
    <div class="w-4/5 p-5 m-2 bg-white bg-opacity-50 shadow-xl rounded-xl">
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="px-4 py-2 border border-gray-400">Product ID</th>
                        <th class="px-4 py-2 border border-gray-400">Product Name</th>
                        <th class="px-4 py-2 border border-gray-400">Description</th>
                        <th class="px-4 py-2 border border-gray-400">Quantity</th>
                        <th class="px-4 py-2 border border-gray-400">Price</th>
                        <th class="px-4 py-2 border border-gray-400">Product Image</th>
                        <th class="px-4 py-2 border border-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($query as $somth)
                        <tr>
                            <td class="px-4 py-2 border border-gray-400">{{$somth->id}}</td>
                            <td class="px-4 py-2 border border-gray-400">{{$somth->productname}}</td>
                            <td class="px-4 py-2 border border-gray-400">{{$somth->description}}</td>
                            <td class="px-4 py-2 border border-gray-400">{{$somth->quantity}}</td>
                            <td class="px-4 py-2 border border-gray-400">{{$somth->price}}</td>
                            <td class="px-4 py-2 border border-gray-400">
                                <img src="{{ asset('productimage/' . $somth->images) }}" alt="Product Image" class="w-16 h-16">
                            </td>
                            <td class="px-4 py-2 border border-gray-400">
                                <form method="GET" action="{{ route('products.edit', ['id'=>$somth->id]) }}">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">EDIT</button>
                                </form>

                                <form method="POST" action="{{ route('products.delete', ['id' => $somth->id]) }}" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 ml-2 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>


@endsection

