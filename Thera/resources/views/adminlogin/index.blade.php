@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')

@section('header')
@parent
@stop

@section('content')

<body>
    <div class="min-h-screen py-0" x-data="{ showModal: false }">

        <div class="flex w-full h-screen">
            <div class="relative w-7/12 h-screen bg-center bg-cover " style="background-image: url('images/massage3.png');">
                <div class="absolute inset-0 bg-black bg-opacity-75"></div> <!-- Overlay with semi-transparent black background -->
                <div class="relative flex flex-col items-center justify-center h-full px-20 text-center bg-gradient-to-r from-black to-transparent">
                    <h1 class="mb-3 text-6xl font-bold text-white">Welcome To TheraFlex</h1>
                    <p class="mb-5 text-lg font-thin text-white">The World's First leading Website for Massage and Parlor shops in the Philippines aiming to make your life easier and better.</p>
                    <a href="#" class="inline-block px-6 py-3 font-bold text-white transition duration-300 bg-green-500 rounded-xl hover:bg-green-600">Learn More</a>
                </div>
            </div>


            <!-- Right Side with Form -->
            <div class="flex flex-col justify-center w-1/3 px-12 ml-20 py-14" >
                <div class="flex justify-center mb-6">
                    <img src="images/TheraFlex.png" alt="TheraFlex Logo" class="w-48 ">
                </div>

                <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Login To Your Account</h2>

              <!--login form-->
                <div class="flex items-center justify-center ">
                <form action="{{route('adminlogin.auth')}}" method = "POST" class="items-center justify-center space-y-6">
                    @csrf
                    @method("POST")
                    <input type="text" name = "username" placeholder="Login Username" class="justify-center w-full px-4 py-3 transition duration-300 bg-gray-200 border border-gray-300 rounded-xl focus:outline-none focus:border-green-500">
                    <input type="password" name = "password" placeholder="Password" class="w-full px-4 py-3 transition duration-300 bg-gray-200 border border-gray-300 rounded-xl focus:outline-none focus:border-green-500">
                    <div class="flex items-center justify-between">
                        <button type = "submit" class="px-8 py-2 text-white transition duration-300 bg-green-500 rounded-xl hover:bg-green-600">Login</button>
                        {{-- <a href="#" class="text-sm text-green-600 hover:underline">Forgot Password?</a> --}}
                    </div>
                </form>
                </div>

            </div>
        </div>

        <!--second page-->


    </div>

    <!-- Modal for SignUp -->

    </div>

</body>


@stop
