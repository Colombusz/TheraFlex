@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')
{{-- @extends('layouts.LinkScript') --}}
@extends( 'layouts.adminSidebar')
@section('header')

@stop



@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



<div class="flex items-center justify-center h-screen pt-0">

    <!-- profile card holder -->
    <div class="relative flex justify-center w-4/6 mr-10 space-x-4 bg-white shadow-2xl">

        <!--Button Return-->
        {{-- <a href="/your-target-page">
            <button class="absolute right-0 z-10 w-20 px-4 py-2 text-white bg-green-500 rounded">
                Return
            </button>
        </a> --}}
        <a href="{{ route('employees.skillcard_create', auth()->guard('employee')->user()->id) }}">
            <button class="absolute left-0 z-10 w-20 px-4 py-2 text-white bg-green-500 rounded">
                Create
            </button>
        </a>

        <a href="/your-target-page">
            <button class="absolute right-0 z-10 w-20 px-4 py-2 text-white bg-green-500 rounded">
                Edit
            </button>
        </a>

        <div class="absolute z-0 flex items-center justify-center object-cover object-center w-full p-4 transform bg-top bg-cover rounded-lg h-52" style="background-image: url('images/profile.png');"></div>

        <!-- main content -->
        <div class="relative z-10 flex flex-col items-start flex-1 pl-5 mt-20">
            <!-- profile picture holder -->
            <div class="flex items-center justify-center px-10">
                <!-- Image -->

                <img src="{{ asset('profiles/'. auth()->guard('employee')->user()->images) }}" class="border-green-500 rounded-full w-60 h-60 border-thin">
            </div>

            <!-- name holder -->
            <div class="px-4 pt-3 space-y-2">
                <h1 class="justify-center text-4xl font-medium font-inter">{{ auth()->guard('employee')->user()->fname . " " . auth()->guard('employee')->user()->lname }}</h1>
                <div class="flex flex-row justify-center">
                    <p class="text-xl font-bold">Specialization:</p>
                    @if(isset($skill))
                        <span class="inline pl-3 text-xl">{{ $skill->specialization }}</span>
                    @else
                        <span class="inline pl-3 text-xl">null</span>
                    @endif
                    </div>
            </div>

            <!-- Overall Rating -->
            <div class="flex flex-col items-center py-40 ml-8">
                <div id="stars1" class="mb-2">
                    <span class="mr-2 text-gray-400 fa fa-star"></span>
                    <span class="mr-2 text-gray-400 fa fa-star"></span>
                    <span class="mr-2 text-gray-400 fa fa-star"></span>
                    <span class="mr-2 text-gray-400 fa fa-star"></span>
                    <span class="mr-2 text-gray-400 fa fa-star"></span>
                    <span class="mr-2 text-gray-400 fa fa-star"></span>
                    <span class="mr-2 text-gray-400 fa fa-star"></span>
                    <span class="mr-2 text-gray-400 fa fa-star"></span>
                    <span class="mr-2 text-gray-400 fa fa-star"></span>
                    <span class="mr-2 text-gray-400 fa fa-star"></span>
                </div>
                <label class="text-2xl font-bold text-gray-700" for="rating">Skill</label>
            </div>
        </div>

        <!-- skill card1 -->
        <div>
            <div class="absolute z-20 flex items-end w-5/6 h-20 px-64 py-40 mt-0 transform left-60 center-0">
                <div class="flex items-center h-12 bg-white border-green-500 shadow-2xl rounded-xl w-52 border-thin">
                    <p class="justify-center ml-8 text-xl">Short description</p>
                </div>
            </div>

            <div class="absolute z-10 flex items-end w-5/6 h-20 px-40 py-24 transform left-60 center-0 mt-72">
                <div class="w-5/6 mx-auto ml-auto bg-white shadow-lg rounded-xl shadow-slate-600">
                    <div class="w-11/12 mt-3 h-60">
                        @if(isset($skill))
                        <p class="px-10 py-10">{{ $skill->description }}</p>
                        @else
                        <p class="px-10 py-10">null</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- skill card2 -->
        <div class="mt-60">
            <div class="absolute z-20 flex items-end w-5/6 h-20 px-64 py-56 mt-0 transform left-60 center-0">
                <div class="flex items-center h-12 bg-white border-green-500 shadow-2xl rounded-xl w-52 border-thin">
                    <p class="justify-center ml-8 text-xl">Acquired Skills</p>
                </div>
            </div>

            <div class="absolute z-10 flex items-end w-5/6 h-20 px-40 py-40 transform left-60 center-0 mt-72">
                <div class="w-5/6 mx-auto ml-auto bg-white shadow-lg rounded-xl shadow-slate-600">
                    <div class="w-11/12 mt-3 h-60">
                        @if(isset($skill))
                        <p class="px-10 py-10 text-sm">{{ $skill->knowledges }}</p>
                        @else
                        <p class="px-10 py-10 text-sm">null</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop
