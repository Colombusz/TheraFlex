@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')

@section('header')
<!-- Include your header content here -->
@stop

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@section('content')

<div class="flex items-center justify-center h-screen pt-0">

    <!-- profile card holder -->
    <div class="relative flex justify-center w-4/6 mr-10 space-x-4 bg-white shadow-2xl">

        <!--Button Return-->
        <a href="/your-target-page">
            <button class="absolute right-0 z-10 w-20 px-4 py-2 text-white bg-green-500 rounded">
                Return
            </button>
        </a>

        <div class="absolute z-0 flex items-center justify-center object-cover object-center w-full p-4 transform bg-top bg-cover rounded-lg h-52" style="background-image: url('images/profile.png');"></div>

        <!-- main content -->
        <div class="relative z-10 flex flex-col items-start flex-1 pl-5 mt-20">
            <!-- profile picture holder -->
            <div class="flex items-center justify-center px-10">
                <!-- Image -->
                <img src="images/muztafa.jpg" class="border-green-500 rounded-full w-60 h-60 border-thin">
            </div>

            <!-- name holder -->
            <div class="px-4 pt-3 space-y-2">
                <h1 class="justify-center text-4xl font-medium font-inter">Muztafa Yousaffe</h1>
                <div class="flex flex-row justify-center">
                    <p class="text-xl font-bold">Specialization:</p>
                    <span class="inline pl-3 text-xl">Kamasutra</span>
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
                    <p class="justify-center ml-8 text-xl">Employee Profile</p>
                </div>
            </div>

            <div class="absolute z-10 flex items-end w-5/6 h-20 px-40 py-24 transform left-60 center-0 mt-72">
                <div class="w-5/6 mx-auto ml-auto bg-white shadow-lg rounded-xl shadow-slate-600">
                    <div class="w-11/12 mt-3 h-60">
                        <p class="px-10 py-10">Muztafa Yousaffe is a dedicated and skilled Licensed Massage Therapist with a passion for providing therapeutic and relaxing massage experiences. With a commitment to holistic well-being, Muztafa combines technical expertise with a compassionate approach to ensure clients receive personalized care tailored to their unique needs.</p>
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
                        <p class="px-10 py-10 text-sm"><strong>Swedish Massage:</strong> Proficient in the art of Swedish massage, Muztafa utilizes long, flowing strokes to induce deep relaxation and improve circulation.<br>
                            <strong>Deep Tissue Massage:</strong> Experienced in applying firm pressure to release tension in deeper muscle layers, addressing chronic pain and muscle tightness.<br>
                            <strong>Point Therapy:</strong> Skilled in identifying and targeting specific trigger points to alleviate pain and discomfort effectively.<br>
                            <strong>Myofascial Release:</strong> Utilizes gentle pressure to release restrictions in the connective tissue, promoting flexibility and reducing pain.</p><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop
