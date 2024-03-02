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
</html>
