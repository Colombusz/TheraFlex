@extends('../layouts.app')
@extends('../layouts.LinkScript')
@section('title', 'TheraFlex')

@section('header')
@parent
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
<style>


    .custom-font-heading {
        font-family: 'Playfair Display', serif;
    }

    .custom-font-body {
        font-family: 'Montserrat', sans-serif;
    }

    .menu-container {
        max-height: calc(200vh - 100px);
        /* Adjust the height as needed */
        overflow-y: auto;
        scroll-padding-top: 100px;
        /* Offset to account for fixed buttons */
        padding-top: 120px;
        /* Add padding to the top */
    }

    .button-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 999;
        background-color: transparent;
        /* Initial transparent background */
        transition: background-color 0.3s ease;
    }

    .button-wrapper:hover {
        background-color: rgba(0, 0, 0, 0.1);
        /* Change color upon hover */
    }

    .clicked {
        border: 2px solid #4CAF50;
        /* Green border color */
    }
</style>
@stop

@section('content')

<div class="relative flex items-center justify-center object-center w-full h-96">
    <h1 class="absolute z-10 py-20 text-3xl font-bold text-center text-white">Our Products And Services</h1>
    <img src="images/field.jpg" alt="alpine" class="object-cover w-full h-full">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
</div>

{{-- @php
    dd(auth()->guard('customer')->user()->id);
@endphp --}}



<div class="min-h-screen py-0 bg-gray-100 custom-font-body">
    <div class="menu-container ml-14">
        <div class="">
            <h1 class="p-10 py-0 mt-10 text-3xl font-bold text-startcustom-font-heading">Massage Services</h1>
        </div>
        <div class="grid grid-cols-3 gap-8 px-5 pt-3" id="massage-section">
            <!-- Existing Product Cards -->
            <!-- Massage Section -->
            <!-- Swedish Massage -->
            <div class="transition duration-500 transform bg-white shadow-xl rounded-xl hover:scale-105">
                <div class="flex items-start p-5"> <img src="images/swedish.jpg" alt="Swedish Massage" class="w-32 h-32 mr-5 rounded-xl">
                    <div class="flex flex-col flex-grow">
                        <h2 class="pb-3 text-xl font-bold custom-font-heading">Swedish Massage</h2>
                        <p class="text-sm">Description: A gentle, full-body massage...<br>Intensity: Low<br>Duration: 60 minutes</p>
                        <div class="flex items-center justify-between py-4 mt-auto">
                            <p class="text-2xl font-bold text-startcustom-font-heading">₱250</p>
                            <button class="flex items-center px-6 py-2 font-bold text-white transition duration-300 ease-in-out rounded-lg bg-customcolor3 hover:bg-customcolor4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="ml-2">Cart</span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class=" pt-14">
            <h1 class="p-5 text-3xl font-bold py-0mt-10 text-startcustom-font-heading">Select Products</h1>
        </div>

        <div class="grid grid-cols-3 gap-8 px-5" id="oil-section">
            <!-- Lavender Oil -->
            <div class="transition duration-500 transform bg-white shadow-xl rounded-xl hover:scale-105">
                <div class="flex items-start p-5">
                    <img src="oils/Lavender.jpg" alt="Lavender Oil" class="w-32 h-32 mr-5 rounded-xl">
                    <div class="flex flex-col flex-grow">
                        <h2 class="pb-3 text-xl font-bold custom-font-heading">Lavender Oil</h2>
                        <p class="text-sm">Known for its calming properties, it’s often used in stress relief and relaxation massages.</p>
                        <div class="flex items-center justify-between py-4 mt-auto">
                            <p class="text-2xl font-semibold text-startcustom-font-heading">Price: ₱50</p>
                            <button class="flex items-center px-6 py-2 font-bold text-white transition duration-300 ease-in-out rounded-lg bg-customcolor3 hover:bg-customcolor4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="ml-2">Add to Cart</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="">
            <h1 class="p-10 text-3xl font-bold py-0mt-10 text-startcustom-font-heading">Combos</h1>
        </div>

        <div class="grid grid-cols-3 gap-8 px-5" id="oil-section">
            <!-- Lavender Oil -->
            <div class="transition duration-500 transform bg-white shadow-xl rounded-xl hover:scale-105">
                <div class="flex items-start p-5">
                    <img src="oils/Lavender.jpg" alt="Lavender Oil" class="w-32 h-32 mr-5 rounded-xl">
                    <div class="flex flex-col flex-grow">
                        <h2 class="pb-3 text-xl font-bold custom-font-heading">Lavender Oil</h2>
                        <p class="text-sm">Known for its calming properties, it’s often used in stress relief and relaxation massages.</p>
                        <div class="flex items-center justify-between py-4 mt-auto">
                            <p class="text-2xl font-semibold text-startcustom-font-heading">Price: ₱50</p>
                            <button class="flex items-center px-6 py-2 font-bold text-white transition duration-300 ease-in-out rounded-lg bg-customcolor3 hover:bg-customcolor4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="ml-2">Add to Cart</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Rest of your HTML code -->


        <template x-for="item in JSON.parse(localStorage.getItem('cart'))"></template>
        @stop

        @section('scripts')
        <script>
            // JavaScript code to handle button clicks
            document.addEventListener('DOMContentLoaded', function() {
                // Get references to the buttons
                const buttons = document.querySelectorAll('.button-wrapper a');

                // Add event listeners to the buttons
                buttons.forEach(button => {
                    button.addEventListener('click', function(event) {
                        event.preventDefault(); // Prevent default link behavior
                        const targetId = button.getAttribute('href'); // Get the href attribute
                        const targetElement = document.querySelector(targetId); // Get the target element
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        }); // Scroll to the target element
                    });
                });
            });
        </script>
        @stop
