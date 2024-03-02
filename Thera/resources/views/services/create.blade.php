{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create prod</h1>
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="fname">Service</label>
            <input type="text" class="form-control" id="Service" name="Service" required>
        </div>

        <div class="form-group">
            <label for="ProdDescription">Service Desc</label>
            <input type="text" class="form-control" id="Description" name="Description" required>
        </div>
        <div class="form-group">
            <label for="Quantity">hours/session</label>
            <input type="text" class="form-control" id="hours" name="hours" required>
        </div>

        <div class="form-group">
            <label for="Price">rate/hour</label>
            <input type="text" class="form-control" id="rate" name="rate" required>
        </div>
        <div class="form-group">
            <label for="images">Service Image:</label>
            <input type="file" class="form-control-file" id="Image" name="Image">
        </div>

        <button type="submit" class="btn btn-success">Add Service</button>
    </form>
</body>
</html> --}}


@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')

@section('header')
@parent
@stop

@section('content')
<div class="relative bg-center bg-cover" style="background-image: url('../../images/springfields.jpeg'); height: 100vh;">
    <!-- Dim effect -->


    <div class="container flex justify-between px-40 py-40 ">

        <!-- Add Service Section -->
        <div class="w-1/2 p-5 m-2 bg-white shadow-xl rounded-xl">
    <h1 class="text-4xl font-bold text-black">Add Service</h1>

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="service-name">Service Name</label>
            <input type="text" id="Service" name="Service" placeholder="Type Here" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="service-description">Service Description</label>
            <textarea id="Description" name="Description" placeholder="Type Here" class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="flex mb-4">
            <div class="flex-1 mr-2">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="price-per-hour">Price per hour</label>
                <input type="text" id="rate" name="rate" placeholder="Type Here" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex-1 ml-2">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="hours-per-session">Hours per Session</label>
                <input type="text"  id="hours" name="hours"  placeholder="Type Here" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700">Service Image</label>
            <input type="file" id="Image" name="Image" class="px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
        </div>
        <button class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">
            Submit
        </button>
    </form>
</div>

    </div>
</div>
@endsection

