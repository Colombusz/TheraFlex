@vite(['../../css/admin.css','../../js/admin.js'])
@extends( 'layouts.adminSidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <!-- Include Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<form action="{{ route('employees.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="form-group">
        <label for="fname">First Name:</label>
        <input type="hidden" name="id" value="{{$employee->id }}" />
        <input type="text" class="form-control" id="fname" name="fname" value="{{ $employee->fname }}" required>
    </div>

    <div class="form-group">
        <label for="lname">Last Name:</label>
        <input type="text" class="form-control" id="lname" name="lname" value="{{ $employee->lname }}" required>
    </div>

    <div class="form-group">
        <label for="phoneNum">Phone Number:</label>
        <input type="text" class="form-control" id="phoneNum" name="phoneNum" value="{{ $employee->phoneNum }}" required>
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ $employee->address }}" required>
    </div>

    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ $employee->username }}" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" value="{{ $employee->password }}" required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="showPasswordButton">Show</button>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="images">Profile Image:</label>
        <input type="file" class="form-control-file" id="images" name="images">
        @if($employee->images)
        <img src="{{ asset('uploads/' . $employee->images) }}" alt="Profile Image" style="max-width: 50px;">
        @else
                No Image
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Update Employee</button>
</form>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    // Function to toggle password visibility
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var showPasswordButton = document.getElementById("showPasswordButton");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            showPasswordButton.textContent = "Hide";
        } else {
            passwordField.type = "password";
            showPasswordButton.textContent = "Show";
        }
    }

    // Attach the function to the button click event
    document.getElementById("showPasswordButton").addEventListener("click", togglePassword);
</script>

</body>
</html>
