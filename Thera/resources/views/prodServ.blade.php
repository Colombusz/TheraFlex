@extends('layout.app')
@extends('layout.LinkScript')
@section('title', 'TheraFlex')

@section('header')
@parent
@stop

@section('content')
<div class="relative bg-center bg-cover" style="background-image: url('images/springfields.jpeg'); height: 100vh;">

    <!-- Dim effect -->
    <div class="absolute inset-0 bg-black opacity-50 blur-"></div>

    <div class="relative z-10 flex flex-col items-start justify-between">

        <div class="pb-8 ml-20 mt-52">
            <h1 class="text-4xl font-bold text-white">Add Product</h1>
            <button class="px-4 py-2 mt-4 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:shadow-outline">
                Submit
            </button>
        </div>

    </div>

    <!-- Product Description Section -->
    <div class="absolute z-20 flex flex-col w-2/5 py-4 ml-20 bg-white shadow-xl rounded-xl relevant mt-">
        <h2 class="mb-4 ml-5 text-xl font-semibold text-black">Product Basic Information</h2>
        <form action="#" class="">
            <div class="flex flex-col">
                <h1 class="mt-2 ml-5 text-black from-neutral-500">Product Name</h1>
                <input type="text" placeholder="Type Here" class="h-10 pl-4 mt-2 ml-5 text-black bg-gray-100 shadow-2xl w-90 focus:outline-none w-38 rounded-xl focus:border-green-500 relevant">
                <h1 class="mt-4 ml-5 text-black from-neutral-500">Enter the product description here</h1>
                <textarea placeholder="Type Here" class="h-48 pt-8 pb-40 pl-4 mt-2 ml-5 bg-gray-100 shadow-2xl w-90 focus:outline-none rounded-xl focus:border-green-500 text-start"></textarea>
            </div>
        </form>
    </div>

    <!-- Quantity and Price section -->
    <div class="relative flex mt-4 px-96 mr-96">
        <!-- Quantity Container -->
        <div class="flex flex-col p-3 ml-auto bg-gray-500 rounded-lg">
            <h1 class="ml-5">Quantity</h1>
            <input type="number" placeholder="Type Here" class="h-10 pl-4 mt-2 ml-5 text-black bg-gray-100 shadow-2xl w-90 focus:outline-none w-38 rounded-xl focus:border-green-500">
            <h1 class="ml-5">Price</h1>
            <input type="text" placeholder="Type Here" class="h-10 pl-4 mt-2 ml-5 text-black bg-gray-100 shadow-2xl w-90 focus:outline-none w-38 rounded-xl focus:border-green-500">
        </div>
    </div>

    <!-- Image Container -->
    <div x-data="{ imagePreview: null }" class="relative flex-col w-2/5 h-48 ml-auto bg-gray-400 shadow-xl relativeflex mr-60 rounded-xl">
        <h1 class="mt-5 ml-5 text-xl text-black">Product Image</h1>

        <!-- File input for image selection -->
        <input @change="previewImage" type="file" accept="image/*" class="px-4 py-2 mt-5 ml-5 text-gray-800 bg-gray-200 rounded-md cursor-pointer w-60 hover:bg-gray-300 focus:outline-none focus:shadow-outline">

        <!-- Image preview container -->
        <div x-show="imagePreview" class="mt-4 ml-5">
            <img x-bind:src="imagePreview" class="w-32 h-32" alt="Image Preview">
        </div>

        <script>
            function previewImage(event) {
                const input = event.target;
                const reader = new FileReader();

                reader.onload = function () {
                    Alpine.data['x-data'].imagePreview = reader.result;
                };

                if (input.files.length > 0) {
                    reader.readAsDataURL(input.files[0]);
                } else {
                    Alpine.data['x-data'].imagePreview = null;
                }
            }
        </script>
    </div>

</div>

@endsection
