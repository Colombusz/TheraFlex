@extends('layouts.header')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')

@section('header')
    @parent
@stop

@section('content')
    <div class="min-h-screen py-0">
        <div class="container w-screen h-screen">
            <div class="flex w-screen h-screen overflow-hidden bg-white shadow-lg rounded-xl">
                <div class="flex flex-col justify-center w-1/2 h-screen p-20 overflow-hidden bg-center bg-no-repeat bg-cover item-center">
                    <h1 class="mb-3 font-bold text-white font-poppins text-8xl" style="top: -280px;">Welcome To </h1>
                    <h1 class="mb-3 font-bold text-white font-poppins text-8xl" style="top: -280px;">
                                <span class="text-[#232b2b]">Appointments</span>
                                 <span class="text-[#51B74F]">Service</span>

                     </h1>
                     <button class="h-12 mt-0 font-bold text-white w-28 rounded-xl bg-customcolor3 hover:text-green-900">
                        <a>Learn More</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@stop
