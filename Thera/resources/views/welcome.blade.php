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
                <div class="flex flex-col justify-center w-1/2 h-screen p-20 overflow-hidden bg-black bg-center bg-no-repeat bg-cover item-center" style="background-image: url('images/massage2_shade.png') ">
                    <h1 class="mb-3 font-bold text-white font-poppins text-8xl" style="top: -280px;">Welcome To </h1>
                    <h1 class="mb-3 font-bold text-white font-poppins text-8xl" style="top: -280px;">
                                <span class="text-[#232b2b]">Thera</span>
                                 <span class="text-[#51B74F]">Flex</span>
                     </h1>

                    <div class="mt-10 mb-5 py-30">
                        <p class="font-thin text-white">The World's First leading Website for Massage and Parlor shops in the Philippines</p>
                        <p class="font-thin text-white"> aiming to make your life easier and better</p>
                    </div>

                    <button class="h-12 mt-0 font-bold text-white w-28 rounded-xl bg-customcolor3 hover:text-green-900">
                        <a>Learn More</a>
                    </button>
                </div>
                <div class="w-1/2 px-12 py-14">
                    <div class="flex items-center py-5">
                        <div class="mx-auto">
                            <img src="images/TheraFlex.png" alt="TheraFlex Logo" class="w-40 h-30">
                            <!-- Adjust the "h-30" class to set the desired height -->
                        </div>
                    </div>
                    <h2 class="mb-8  text-3xl font-bold text-center text-[#151b1f]">Login To Your Account</h2>
                    <div class="flex items-center justify-center h-10 gap-2 mb-5">
                        <button class="flex items-center justify-center p-2 font-serif font-bold text-white rounded-md">
                            <img src="logos/google.png" alt="Google Logo" class="w-20 h-20 mr-2">
                            <!--google-->
                        </button>
                        <button class="flex items-center justify-center p-2 font-serif font-bold text-white rounded-md">
                            <img src="logos/facebook.png" alt="Facebook Logo" class="h-24 mr-2 w-26">
                           <!--facebook-->
                        </button>
                    </div>
                    <form action="#">
                        <div class="flex items-center justify-center h-20 mb-5">
                            <input type="text" placeholder="Login Username" class="w-3/4 h-14 px-10 py-2 bg-#636363 border shadow-lg border-grey-400 rounded-xl placeholder-slate-800">
                        </div>
                        <div class="flex items-center justify-center">
                            <input type="password" placeholder="Password" class="w-3/4 px-10 h-14 py-2 bg-#636363 border shadow-lg border-grey-400 rounded-xl placeholder-slate-800">
                        </div>
                        <div class="flex justify-between py-5 mx-auto mt-3">
                            <button class="px-8 py-2 ml-32 text-white rounded-xl hover:text-green-900 bg-customcolor3">Login</button>
                            <a href="#" class="px-2 py-1 underline mr-28 hover:text-green-900">Forgot Password?</a>
                        </div>
                    </form>
                    <div class="py-32 ">
                        <div class="flex items-center py-3">
                            <div class="mx-auto">
                                <h2 class="text-xl font-bold text-[#151b1f]">New To This Website?</h2>
                            </div>
                        </div>
                        <div class="flex items-center justify-center py-0 text-white hover:text-green-900">
                            <div class="mx-auto">
                                <button class="w-40 h-12 rounded-xl bg-customcolor3 ">Sign Up For Free</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
