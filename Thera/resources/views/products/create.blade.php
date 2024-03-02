<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create prod</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="fname">Product</label>
            <input type="text" class="form-control" id="Product" name="Product" required>
        </div>

        <div class="form-group">
            <label for="ProdDescription">ProdDescription</label>
            <input type="text" class="form-control" id="ProdDescription" name="ProdDescription" required>
        </div>
        <div class="form-group">
            <label for="Quantity">Quantity:</label>
            <input type="text" class="form-control" id="Quantity" name="Quantity" required>
        </div>

        <div class="form-group">
            <label for="Price">Price:</label>
            <input type="text" class="form-control" id="Price" name="Price" required>
        </div>
        <div class="form-group">
            <label for="images">ProductImage:</label>
            <input type="file" class="form-control-file" id="ProductImage" name="ProductImage">
        </div>

        <button type="submit" class="btn btn-success">Add Manager</button>
    </form>
</body>
</html>
