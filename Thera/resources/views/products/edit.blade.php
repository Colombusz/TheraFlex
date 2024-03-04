
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
    {{-- @php
        dd($query);
    @endphp --}}
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
</html>
