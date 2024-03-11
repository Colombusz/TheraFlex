@vite(['resource/css/admin.css','../../../js/admin.js'])
@extends('layouts.adminSidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    @php
            // dd(auth()->guard('manager')->user());
            $name = auth()->guard('manager')->user()->fname ." ". auth()->guard('manager')->user()->lname;
            $address = auth()->guard('manager')->user()->address;
            $phone = auth()->guard('manager')->user()->phoneNum;
            $username = auth()->guard('manager')->user()->username;
            $image = auth()->guard('manager')->user()->images;

        @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheraFlex</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="flex items-center justify-center h-screen bg-white">

    <div class="w-3/12 h-auto p-10 bg-white rounded-lg shadow-2xl">
        <header class="mb-4 text-center">
            <h1 class="text-xl font-bold">Manager Profile</h1>
        </header>

        <div class="flex flex-col items-center">
            <img class="object-cover w-48 h-48 mb-4 rounded-full" src={{asset('profiles/'. $image)}} alt="Profile Picture">

            <div class="mb-2 text-lg font-semibold">{{$name}}</div>

            <div class="flex flex-col items-start mr-40 space-y-4">
                <div class="info">
                    <label class="font-semibold">Address:</label>
                    <p>{{$address}}</p>
                </div>
                <div class="info">
                    <label class="font-bold">Phone Number:</label>
                    <p>{{$phone}}</p>
                </div>
                <div class="info">
                    <label class="font-bold">Username:</label>
                    <p>{{$username}}</p>
                </div>
                {{-- <div class="info">
                    <label class="font-bold">Job Title:</label>
                    <p>Manager</p>
                </div> --}}
                {{-- <div class="flex items-center justify-between info">
                    <label class="font-bold">Department:</label>
                    <p>Operations</p> --}}
                    <a href="#" class="px-3 py-1 text-white bg-blue-500 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Edit</a>
                </div>
            </div>
        </div>

    </div>

</body>
</html>

</body>
</html>
