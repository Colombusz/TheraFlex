{{-- <!DOCTYPE html>
<html>
<head>
    <title>Dropdown Example</title>
</head>
<body>

    @php
        // dd($service, $product);
    @endphp

    <form action="{{route('combos.store')}}" method="post">
        @csrf
        <label for="product">Select a product:</label>
        <select name="product" id="dropdown">

            @foreach ($product as $prod)
                <option value= {{$prod->id}} >{{$prod->productname}}</option>
            @endforeach
        </select>

        <label for="service">Select a service:</label>
        <select name="service" id="dropdown">
            @foreach ($service as $serv)
                <option value= {{$serv->id}} >{{$serv->servicetype}}</option>
            @endforeach

        </select>
        <div class="form-group">
            <label for="images">Profile Image:</label>
            <input type="file" class="form-control-file" id="images" name="images">
        </div>
        <button type="submit">Submit</button>
    </form>

</body>
</html> --}}

@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')
@extends( 'layouts.adminSidebar')
@section('header')
@parent
@stop

@section('content')

{{-- @php
    dd($combo);
@endphp --}}
<div class="flex flex-col items-center justify-center min-h-screen" style="background: linear-gradient(180deg, rgba(180, 198, 198, 0.97), rgba(81, 183, 79));">
    @csrf
    <!-- Text "Employees Information" -->    <div class="w-4/5 flex justify-start">
        <div class="text-4xl font-bold text-black mt-4 ml-4">Edit Combos</div>
    </div>

    <div class="w-4/5 p-8 mt-8 bg-white shadow-xl rounded-xl">

        <form action="{{route('combos.update')}}" method="post" class="mt-4" enctype="multipart/form-data">

            @csrf
            @method("post")
            <!-- Product Type Dropdown -->
            <div class="flex flex-col">
                <label for="productType" class="ml-2 text-black">Product Type:</label>
                <select name="product" class="h-10 px-4 mt-2 ml-2 text-black bg-gray-100 shadow-md focus:outline-none w-52 rounded-xl">
                    @foreach ($product as $prod)
                        <option value= {{$prod->id}} >{{$prod->productname}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="id" value="{{$combo->id }}" />

            <!-- Service Dropdown -->
            <div class="flex flex-col mt-4">
                <label for="serviceType" class="ml-2 text-black">Service:</label>
                <select name="service" class="h-10 px-4 mt-2 ml-2 text-black bg-gray-100 shadow-md focus:outline-none w-52 rounded-xl">
                    @foreach ($service as $serv)
                        <option value= {{$serv->id}} >{{$serv->servicetype}}</option>
                     @endforeach
                </select>
            </div>
            <input type="file" id="images" id="images" name="images" class="mt-2 ml-2 text-black bg-gray-100 shadow-md focus:outline-none w-52 rounded-xl">
            <!-- File Attachment/Input -->
            {{-- <div class="flex flex-col mt-4">
                <label for="fileAttachment" class="ml-2 text-black">File Attachment/Image Attachment:</label>
                <input type="file" id="images" id="images" name="images" class="mt-2 ml-2 text-black bg-gray-100 shadow-md focus:outline-none w-52 rounded-xl">
            </div> --}}

            <!-- Submit Button -->
            <button type="submit" class="px-4 py-2 mt-4 ml-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:shadow-outline">
                Update
            </button>
        </form>
    </div>
</div>


@endsection

