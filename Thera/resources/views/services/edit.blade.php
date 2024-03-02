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
    <form action="{{ route('services.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="id" value="{{ $query->id }}" />
        <input type="hidden" name="old" value="{{ $query->images }}" />
        <div class="form-group">
            <label for="fname">Service</label>
            <input type="text" class="form-control" id="Service" name="Service" value = "{{$query->servicetype}}" required>
        </div>

        <div class="form-group">
            <label for="ProdDescription">Description</label>
            <input type="text" class="form-control" id="Description" name="Description" value = "{{$query->description}}" required>
        </div>
        <div class="form-group">
            <label for="Quantity">Hours</label>
            <input type="text" class="form-control" id="Hours" name="Hours" value = "{{$query->hours}}" required>
        </div>

        <div class="form-group">
            <label for="Price">Price:</label>
            <input type="text" class="form-control" id="Price" name="Price" value = "{{$query->price}}" required>
        </div>

        <div class="form-group">
            <label for="images">ProductImage:</label>
            <img src="{{ asset('serviceimage/' . $query->images) }}" alt="Profile Image" style="max-width: 50px;">
            <input type="file" class="form-control-file" id="Image" name="Image">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</body>
</html>
