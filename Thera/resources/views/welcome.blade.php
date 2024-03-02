@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')

@section('header')
@parent
@stop

@section('content')
<div class="relative bg-center bg-cover" style="background-image: url('images/springfields.jpeg'); height: 100vh;">
    <!-- Dim effect -->


    <div class="container flex justify-between px-40 py-40 ">
        <!-- Add Product Section -->

        <!-- Add Service Section -->
        <div class="w-1/2 p-5 m-2 bg-white shadow-xl rounded-xl">
    <h1 class="text-4xl font-bold text-black">Add Service</h1>
    <form>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="service-name">Service Name</label>
            <input type="text" id="service-name" placeholder="Type Here" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="service-description">Service Description</label>
            <textarea id="service-description" placeholder="Type Here" class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="flex mb-4">
            <div class="flex-1 mr-2">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="price-per-hour">Price per hour</label>
                <input type="text" id="price-per-hour" placeholder="Type Here" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex-1 ml-2">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="hours-per-session">Hours per Session</label>
                <input type="text" id="hours-per-session" placeholder="Type Here" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700">Service Image</label>
            <input type="file" accept="image/*" class="px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
        </div>
        <button class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">
            Submit
        </button>
    </form>
</div>

    </div>
</div>
@endsection
