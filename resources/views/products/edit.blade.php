{{--
@vite(['../../css/admin.css','../../js/admin.js'])
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
    @php
        dd($query);
    @endphp
    <h1>Create prod</h1>
    <form action="{{ route('products.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="id" value="{{ $query->id }}" />
        <input type="hidden" name="old" value="{{ $query->images }}" />
        <div class="form-group">
            <label for="fname">Product</label>
            <input type="text" class="form-control" id="Product" name="Product" value = "{{$query->productname}}" required>
        </div>

        <div class="form-group">
            <label for="ProdDescription">ProdDescription</label>
            <input type="text" class="form-control" id="ProdDescription" name="ProdDescription" value = "{{$query->description}}" required>
        </div>
        <div class="form-group">
            <label for="Quantity">Quantity:</label>
            <input type="text" class="form-control" id="Quantity" name="Quantity" value = "{{$query->quantity}}" required>
        </div>

        <div class="form-group">
            <label for="Price">Price:</label>
            <input type="text" class="form-control" id="Price" name="Price" value = "{{$query->price}}" required>
        </div>

        <div class="form-group">
            <label for="images">ProductImage:</label>
            <img src="{{ asset('productimage/' . $query->images) }}" alt="Profile Image" style="max-width: 50px;">
            <input type="file" class="form-control-file" id="ProductImage" name="ProductImage">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</body>
</html> --}}

@vite(['../../css/admin.css','../../js/admin.js'])
@extends( 'layouts.adminSidebar')
@extends('layouts.app')
@extends('layouts.LinkScript')

@parent

<div class="relative bg-center bg-cover" style="background-image:url('{{ asset('images/springfields.jpeg') }}'); height: 100vh;">
    <!-- Dim effect -->


    <div class="container flex justify-between px-40 py-40 ">
        <!-- Add Product Section -->
        <div class="w-1/2 p-5 m-2 bg-white shadow-xl rounded-xl">
            <h1 class="text-4xl font-bold text-black">Add Product</h1>
            <form action="{{ route('products.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="product-name">Product Name</label>
                    <input type="text" id="Product" name="Product" placeholder="Type Here" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" required >
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="product-description">Product Description</label>
                    <textarea id="ProdDescription" name="ProdDescription" placeholder="Type Here" class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" required></textarea>
                </div>

                <div class="flex justify-between">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="quantity">Quantity</label>
                        <input type="number" id="Quantity" name="Quantity"  placeholder="Type Here" class="px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="price">Price</label>
                        <input type="text" id="Price" name="Price" placeholder="Type Here" class="px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700">Product Image</label>
                    <input type="file" id="ProductImage" name="ProductImage" accept="image/*" class="px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>
                <button class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">
                    Submit
                </button>
            </form>
        </div>



    </div>
</div>


