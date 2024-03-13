{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <!-- Include Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <form action="{{ route('customers.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 @method('POST')

        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" id="fname" name="fname" value="{{ $customer->fname }}" required>
        </div>

        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" id="lname" name="lname" value="{{ $customer->lname }}" required>
        </div>

        <div class="form-group">
            <label for="phoneNum">Phone Number:</label>
            <input type="text" class="form-control" id="phoneNum" name="phoneNum" value="{{ $customer->phoneNum }}" required>
        </div>

        <input type="hidden" name="id" value="{{$customer->id }}" />

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}" required>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $customer->username }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" value="{{ $customer->password }}" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="showPasswordButton">Show</button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="images">Profile Image:</label>
            <input type="file" class="form-control-file" id="images" name="images">
            @if($customer->images)
                <img src="{{ asset('uploads/' . $customer->images) }}" alt="Profile Image" style="max-width: 50px;">
            @else
                No Image
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Customer</button>
    </form>
</div>

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
</html> --}}

@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')
@extends( 'layouts.adminSidebar')
@section('header')

@stop

@section('content')

<div class="relative bg-center bg-cover" style="background-image: url('images/employeebg.jpg'); height: 100vh;">

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-5 mt-16 bg-white shadow-xl rounded-xl">
            <h1 class="mb-6 text-4xl font-bold text-center text-black">Edit Customer</h1>

        <form method="POST" action="{{ route('customers.update') }}" enctype="multipart/form-data">
                @csrf
                 @method('POST')

                <!-- First Name -->
                <div class="mb-4">
                    <input type="hidden" name="id" value="{{$customer->id }}" />
                    <label for="fname" class="block mb-2 text-sm font-bold text-gray-700">First Name</label>
                    <input type="text" id="fname" name="fname" value="{{ $customer->fname }}"  class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <!-- Last Name -->
                <div class="mb-4">
                    <label for="lname" class="block mb-2 text-sm font-bold text-gray-700">Last Name</label>
                    <input type="text" id="lname" name="lname" value="{{ $customer->lname }}"  class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phone-num" class="block mb-2 text-sm font-bold text-gray-700">Phone
                        Number</label>
                    <input type="tel" id="phoneNum" name="phoneNum" value="{{ $customer->phoneNum }}"  class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label for="address" class="block mb-2 text-sm font-bold text-gray-700">Address</label>
                    <input type="text" id="address" name="address" value="{{ $customer->address }}" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="block mb-2 text-sm font-bold text-gray-700">Username</label>
                    <input type="text" id="username" name="username" value="{{ $customer->username }}"  class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-bold text-gray-700">Password</label>
                    <input type="password" id="password" name="password" value="{{ $customer->password }}"  class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <div class="relative flex justify-center mx-auto my-4">
                    <label for="profile-pic">
                        {{-- <img class="w-32 h-32 rounded-full" src="https://via.placeholder.com/128" alt="Profile Picture Placeholder"> --}}
                        <span class="block text-sm font-medium text-gray-700">
                            Upload Photo:
                        </span>
                    </label>
                    <div class="form-group">
                        <label for="images">Profile Image:</label>
                        <input type="file" class="form-control-file" id="images" name="images">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>


@stop
