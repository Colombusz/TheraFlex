@vite(['../../css/admin.css','../../js/admin.js'])
@extends( 'layouts.adminSidebar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <!-- Include Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
    @if($errors->any())
                    <div class="alert alert-danger text-red-500">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
    @csrf
    @method('POST')

    <div class="form-group">
        <label for="fname">First Name:</label>
        <input type="text" class="form-control" id="fname" name="fname" required>
    </div>

    <div class="form-group">
        <label for="lname">Last Name:</label>
        <input type="text" class="form-control" id="lname" name="lname" required>
    </div>

    <div class="form-group">
        <label for="phoneNum">Phone Number:</label>
        <input type="text" class="form-control" id="phoneNum" name="phoneNum" required>
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>

    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="form-group">
        <label for="images">Profile Image:</label>
        <input type="file" class="form-control-file" id="images" name="images">
    </div>

    <button type="submit" class="btn btn-success">Add Employee</button>
</form>



<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
