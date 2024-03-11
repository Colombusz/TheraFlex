{{-- @vite(['../../css/admin.css','../../js/admin.js'])
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
</html> --}}

@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')

@section('header')
@extends( 'layouts.adminSidebar')
{{-- @parent --}}
@stop

@section('content')

<div class="relative bg-center bg-cover" style="background-image: url('images/employeebg.jpg'); height: 100vh;">

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-5 mt-16 bg-white shadow-xl rounded-xl">
            <h1 class="mb-6 text-4xl font-bold text-center text-black">Add Employee</h1>

        <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                @csrf
                 @method('POST')

                <!-- First Name -->
                <div class="mb-4">
                    <label for="fname" class="block mb-2 text-sm font-bold text-gray-700">First Name</label>
                    <input type="text" id="fname" name="fname" placeholder="John"  class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <!-- Last Name -->
                <div class="mb-4">
                    <label for="lname" class="block mb-2 text-sm font-bold text-gray-700">Last Name</label>
                    <input type="text" id="lname" name="lname" placeholder="Doe"  class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phone-num" class="block mb-2 text-sm font-bold text-gray-700">Phone
                        Number</label>
                    <input type="tel" id="phoneNum" name="phoneNum"   class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label for="address" class="block mb-2 text-sm font-bold text-gray-700">Address</label>
                    <input type="text" id="address" name="address" placeholder="1234 Main St" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="block mb-2 text-sm font-bold text-gray-700">Username</label>
                    <input type="text" id="username" name="username"   class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-bold text-gray-700">Password</label>
                    <input type="password" id="password" name="password"   class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
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
                    Add Employee
                </button>
            </form>
        </div>
    </div>
</div>

@if(isset($employeeData))
<div class="mt-16">
    <h2 class="mb-4 text-2xl font-bold">Employee Information</h2>
    <table class="w-full border border-collapse border-gray-400">
        <thead>
            <tr>
                <th class="px-4 py-2 border border-gray-400">First Name</th>
                <th class="px-4 py-2 border border-gray-400">Last Name</th>
                <th class="px-4 py-2 border border-gray-400">Phone Number</th>
                <th class="px-4 py-2 border border-gray-400">Address</th>
                <th class="px-4 py-2 border border-gray-400">Username</th>
                <th class="px-4 py-2 border border-gray-400">Password</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-2 border border-gray-400">{{$employeeData['fname']}}</td>
                <td class="px-4 py-2 border border-gray-400">{{$employeeData['lname']}}</td>
                <td class="px-4 py-2 border border-gray-400">{{$employeeData['phone_num']}}</td>
                <td class="px-4 py-2 border border-gray-400">{{$employeeData['address']}}</td>
                <td class="px-4 py-2 border border-gray-400">{{$employeeData['username']}}</td>
                <td class="px-4 py-2 border border-gray-400">{{$employeeData['password']}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endif

@stop
