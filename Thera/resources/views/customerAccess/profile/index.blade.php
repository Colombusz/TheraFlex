
@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')
@extends('layouts.sideCart')


<!--@parent this is removed to prove that you only need to remove this for the header not to appear on
    certain page you need to remove it and not to cmment out on the header section so that it wiill not load, because if only
commented out it will still sppear but without the design-->

@section('header')
@parent
@stop

@section('content')



<div class="absolute top-0 left-0 z-10 items-center justify-center w-2/6 py-5 m-4 mt-32 ml-20 bg-white border border-gray-300 rounded-md h-4/6">

    <h1 class="flex items-center justify-center pb-5 space-y-10 text-lg font-bold aboslute ">
        Customer Profile
    </h1>



    <!--profile holder-->
    <div class="flex items-center justify-center mb-10 ">
        <div class="w-48 h-48 border border-gray-400 rounded-full ">
            @php
                // dd($userinfo->images);
            @endphp
            <img src="{{asset('uploads/'. $userinfo->images)}}" alt="Profile Picture" class="w-48 h-48 rounded-full">
        </div>
    </div>


    <!-- Name-->

    <p class="flex items-center justify-center mb-1 text-2xl font-bold">{{$userinfo->fname . " ". $userinfo->lname}}</p>



    <!-- Username and Contact Number -->
    <!-- Username, Contact Number, and Address -->
    <div class="z-20 flex justify-center mt-10 mb-0 ml-0 text-xs">
        <!-- Username -->
        <div class="flex flex-col mr-6 text-center">
            <p style="margin-bottom: 0;" class="text-2xl font-bold">Username</p>
            <p style="margin-bottom: 0;">{{$userinfo->username}}</p>
        </div>

        <!-- Contact -->
        <div class="flex flex-col mt-16 ml-6 mr-6 text-center">
            <p style="margin-bottom: 0;" class="text-2xl font-bold">Contact</p>
            <p style="margin-bottom: 0;">{{$userinfo->phoneNum}}</p>
        </div>

        <!-- Address -->
        <div class="flex flex-col ml-6 text-center">
            <p style="margin-bottom: 0;" class="text-2xl font-bold">Address</p>
            <p style="margin-bottom: 0;">{{$userinfo->address}}</p>
        </div>
    </div>

    <!-- Edit Profile Link -->
    <div class="z-10 flex mt-0 space-x-4 text-center ml-36 py-20.">
        <a href="{{route('custom.edit', $userinfo->id)}}" class="text-lg text-green-500">
            <button class="px-4 py-2 text-white bg-green-500 rounded-full">Edit Profile</button>
        </a>

        <a href="{{ route('customer.logout') }}" class="text-lg text-green-500">
            <button class="px-4 py-2 text-white bg-green-500 rounded-full">Logout</button>
        </a>
    </div>


</div>


<!--Table Section-->
<!--Future Appointments-->


<div class="relative space-x-20 space-y-20 z-1">
    <div class="flex flex-col items-end justify-end flex-shrink-0 p-6 mt-40 mr-40 overflow-auto ">

        <div class="overflow-y-auto table-container max-h-96 ">

            <table class="w-full mt-4 text-left border border-red-600 table-auto mr-28 ">
                <caption class="justify-center mb-2 text-2xl font-bold text-blue-gray-900">Your Future Appointments</caption>
                <thead>
                    <tr>
                        <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                            <p class="flex items-center justify-center font-sans text-sm antialiased font-normal leading-none text-center justify-centergap-2 text-blue-gray-900 opacity-70"> Appointment ID <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                            <p class="flex items-center justify-center gap-2 font-sans text-sm antialiased font-normal leading-none text-center text-blue-gray-900 opacity-70">Subtotal<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                            <p class="flex items-center justify-center font-sans text-sm antialiased font-normal leading-none text-center justify-centergap-2 text-blue-gray-900 opacity-70">Date<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                            <p class="flex items-center justify-center font-sans text-sm antialiased font-normal leading-none text-center justify-centergap-2 text-blue-gray-900 opacity-70">Time<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                            <p class="flex items-center justify-center gap-2 font-sans text-sm antialiased font-normal leading-none text-center text-blue-gray-900 opacity-70">Actions</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($booked as $book)
                    <tr>
                        <td class="justify-center p-4 text-center border-b border-blue-gray-50"> <!--appoitment ID column-->
                            {{$book->id}}
                        </td>
                        <td class="p-4 text-center border-b border-blue-gray-50"> <!--Info  column-->
                            {{$book->subtotal}}
                        </td>
                        <td class="p-4 text-center border-b border-blue-gray-50"> <!--Date and Time ID column-->
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{$book->targetdate}}</p>
                        </td>
                        <td class="p-4 text-center border-b border-blue-gray-50"> <!--Date and Time ID column-->
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{$book->time}}</p>
                        </td>
                        <td class="p-4 text-center border-b border-blue-gray-50"> <!-- buttons ID column-->
                            <a href="" class="inline-block px-4 py-2 mr-2 text-center text-white bg-blue-500 rounded-full">
                                Resched
                            </a>
                            <button class="px-4 py-2 text-white bg-red-500 rounded-full">Cancel</button>
                        </td>
                    </tr>
                @endforeach

                    <!-- Add more rows as needed for additional projects -->
                </tbody>
            </table>
        </div>
    </div>









    <!--Past Apppointments-->
    <div class="relative space-y-20 ">
        <div class="flex flex-col items-end justify-end flex-shrink-0 p-6 py-0 mr-20 overflow-auto">
            <div class="mr-40 space-x-2 overflow-y-auto table-container max-h-96 ">
                <table class="text-left border border-red-600 table-auto w-fullmt-2 ">
                    <caption class="mb-2 text-2xl font-bold text-blue-gray-900">Your Past Appointments</caption>
                    <thead>
                        <tr>
                            <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                                <p class="flex items-center justify-center font-sans text-sm antialiased font-normal leading-none text-center justify-centergap-2 text-blue-gray-900 opacity-70"> Appointment ID <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                    </svg>
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                                <p class="flex items-center justify-center gap-2 font-sans text-sm antialiased font-normal leading-none text-center text-blue-gray-900 opacity-70">Information<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                    </svg>
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                                <p class="flex items-center justify-center font-sans text-sm antialiased font-normal leading-none text-center justify-centergap-2 text-blue-gray-900 opacity-70">Date and Time <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                    </svg>
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                                <p class="flex items-center justify-center gap-2 font-sans text-sm antialiased font-normal leading-none text-center text-blue-gray-900 opacity-70">Actions</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="justify-center p-4 text-center border-b border-blue-gray-50"> <!--appoitment ID column-->
                                1
                            </td>
                            <td class="p-4 text-center border-b border-blue-gray-50"> <!--Info  column-->
                                Eliseo Lim
                            </td>
                            <td class="p-4 text-center border-b border-blue-gray-50"> <!--Date and Time ID column-->
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">23/04/18</p>
                            </td>
                            <td class="p-4 text-center border-b border-blue-gray-50"> <!-- buttons ID column-->
                                <button class="px-4 py-2 mr-2 text-white bg-blue-500 rounded-full" onclick="window.location.href='/reviews'">Rate</button>
                            </td>


                        </tr>

                        <!-- Add more rows as needed for additional projects -->
                    </tbody>
                </table>
            </div>
        </div>



        <!--Canceled Apppointments-->
        <div class="relative z-10">
            <div class="flex flex-col items-end justify-end flex-shrink-0 p-6 py-0 pb-20 mr-20 overflow-auto">
                <table class="w-3/6 mt-4 text-left border border-red-600 table-auto">
                    <caption class="mb-2 text-2xl font-bold text-blue-gray-900">Your Canceled Appointments</caption>
                    <thead>
                        <tr>
                            <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                                <p class="flex items-center justify-center font-sans text-sm antialiased font-normal leading-none text-center justify-centergap-2 text-blue-gray-900 opacity-70"> Appointment ID <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                    </svg>
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                                <p class="flex items-center justify-center gap-2 font-sans text-sm antialiased font-normal leading-none text-center text-blue-gray-900 opacity-70">Information<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                    </svg>
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                                <p class="flex items-center justify-center font-sans text-sm antialiased font-normal leading-none text-center justify-centergap-2 text-blue-gray-900 opacity-70">Date and Time<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                    </svg>
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="justify-center p-4 text-center border-b border-blue-gray-50">
                                1
                            </td>
                            <td class="p-4 text-center border-b border-blue-gray-50">
                                Eliseo Lim
                            </td>
                            <td class="p-4 text-center border-b border-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">23/04/18</p>
                            </td>
                        </tr>

                        <!-- Add more rows as needed for additional projects -->
                    </tbody>
                </table>
            </div>
        </div>


        @stop
