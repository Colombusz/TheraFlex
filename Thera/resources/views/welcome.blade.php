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


            <!-- Right Side with Form -->
            <div class="flex flex-col justify-center w-1/3 px-12 ml-20 py-14" >
                <div class="flex justify-center mb-6">
                    <img src="images/TheraFlex.png" alt="TheraFlex Logo" class="w-48 ">
                </div>
                <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Login To Your Account</h2>
                <!-- Login Form and Social Media Login -->

              <!--login form-->
                <div class="flex items-center justify-center ">
                <form action="{{route('log')}}" method="POST" class="items-center justify-center space-y-6">
                    @csrf
                    @method("POST")
                    <input type="text" name = "username" placeholder="Login Username" class="justify-center w-full px-4 py-3 transition duration-300 bg-gray-200 border border-gray-300 rounded-xl focus:outline-none focus:border-green-500">
                    <input type="password" name = "password" placeholder="Password" class="w-full px-4 py-3 transition duration-300 bg-gray-200 border border-gray-300 rounded-xl focus:outline-none focus:border-green-500">
                    <div class="flex items-center justify-between">
                        <button type = "submit"  class="px-8 py-2 text-white transition duration-300 bg-green-500 rounded-xl hover:bg-green-600">Login</button>
                        {{-- <a href="#" class="text-sm text-green-600 hover:underline">Forgot Password?</a> --}}
                    </div>
                </form>
                </div>



                <!-- Sign Up Section -->
                <div class="mt-10 text-center">
                    <p class="text-lg text-gray-800">New To This Website?</p>
                    <button @click="showModal = true" class="font-bold text-green-500 hover:underline">Sign Up For Free</button>
                </div>
            </div>
        </div>

        <!--second page-->


        <!--modal section-->
        <div x-show="showModal" x-transition:enter="transition ease-out duration-150" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-md" @click.away="showModal = true">
            <div class="w-8/12 p-4 mx-auto bg-white rounded-lg shadow-md " @click.stop>
                <div class="text-right">
                    <button @click="showModal = false" class="text-xl font-semibold text-gray-800 hover:text-red-500">&times;</button>
                </div>
                <h2 class="text-lg font-semibold text-center text-gray-900">Sign Up</h2>
                <form action="{{ route('Customers.register') }}" method="POST" class="mt-4 space-y-4">
                    @csrf
                    @method("GET")
                    <!-- Sign Up Form Fields -->
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label for="firstName" class="block text-sm font-medium text-gray-700">First Name:</label>
                            <input type="text" id="firstName" name="firstName" class="block w-full h-8 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" class="block w-full h-8 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address:</label>
                            <input type="text" id="address" name="address" class="block w-full h-8 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 md:flex-row">
                        <!-- Column for Email and Phone Number -->
                        <div class="md:flex-1">
                            <div class="mb-4"> <!-- Email -->
                                <label for="email" class="block text-sm font-medium text-gray-700">Username</label>
                                <input  name="username" class="block w-full h-8 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                            <div> <!-- Phone Number -->
                                <label for="phoneNumber" class="block text-sm font-medium text-gray-700">Phone Number:</label>
                                <input type="tel" id="phoneNumber" name="phoneNumber" class="block w-full h-8 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <!-- Column for Birth Date and Gender -->
                        <div class="md:flex-1">

                            <div x-data="{ showPassword: false }" class="relative">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                                <input :type="showPassword ? 'text' : 'password'" id="password" name="password" class="block w-full h-8 pr-10 mt-1 bg-gray-200 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3" style="top: 1.5rem;"> <!-- Adjust the top value as needed -->
                                    <button type="button" @click="showPassword = !showPassword" class="text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <img src="icons/showpassword.svg" x-show="!showPassword" class="w-6 h-6" alt="Show Password" />
                                        <svg xmlns="http://www.w3.org/2000/svg" x-show="showPassword" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A9.953 9.953 0 0112 19c-5.523 0-10-4.477-10-10 0-.687.088-1.354.25-2H4m16 0h.75a9.953 9.953 0 01-.125 2 9.953 9.953 0 01-.625 2M9.172 9.172A4 4 0 0012 13a4 4 0 002.828-6.828M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 5.523-4.477 10-10 10a9.953 9.953 0 01-2-.175M1.196 1.196l22.607 22.607" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex justify-end space-x-2">
                                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Submit</button>
                                <button type="button" @click="showModal = false" class="px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600">Cancel</button>
                            </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for SignUp -->

    </div>

</body>


@stop
