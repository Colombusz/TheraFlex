@if (auth()->guard('manager')->user()!==null || auth()->guard('customer')->user()!==null|| auth()->guard('employee')->user()!==null )
    @extends( 'layouts.sideCart')


    <!-- Content section -->
    @yield('content')

    <!-- Tailwind JS for interactive components like mobile menu -->
    <script>
    // JavaScript for mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        menuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
        });
    });
    </script>
@endif

</body>

</html>

@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')

@section('header')
@parent
@stop

@section('content')

<div class="relative flex items-center justify-center object-center w-full h-96">
    <h1 class="absolute z-10 py-20 text-3xl font-bold text-center text-white">Our Products And Services</h1>
    <img src="../images/springfields.jpeg" alt="alpine" class="object-cover w-full h-full">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
</div>



<div>

</div>


<div class="min-h-screen py-0 bg-gray-100 custom-font-body">
    <div class="menu-container ml-14">
        <div class="">
            <h1 class="p-10 py-0 mt-10 text-3xl font-bold text-startcustom-font-heading">Services</h1>
        </div>

            <div class="grid grid-cols-3 gap-8 px-5 pt-3" id="massage-section">
            @foreach ($services as $service)
                    {{-- @php
                    dd(asset('../comboimage/'.$service->images) );
                @endphp --}}
                <div class="transition duration-500 transform bg-white shadow-xl rounded-xl hover:scale-105">
                    <div class="flex items-start p-5"> <img src="{{asset('serviceimage/' . $service->images)}}" alt="Swedish Massage" class="w-32 h-32 mr-5 rounded-xl">
                        <div class="flex flex-col flex-grow">
                            <h2 class="pb-3 text-xl font-bold custom-font-heading">{{$service->servicetype}}</h2>
                            <p class="text-sm">{{$service->description}}</p>
                            <div class="flex items-center justify-between py-4 mt-auto">
                                <p class="text-2xl font-bold text-startcustom-font-heading">{{$service->price}}</p>
                                <form action="{{ route('summaries.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- @method("POST") --}}
                                    <input type = "hidden" value ="{{$service->id}}" name = "id" />
                                    <input type = "hidden" value ="{{$service->servicetype}}" name = "servicetype" />
                                    <input type = "hidden" value ="{{$service->description}}" name = "description" />
                                    <input type = "hidden" value ="{{$service->images}}" name = "images" />
                                    <input type = "hidden" value ="{{$service->price}}" name = "price" />
                                    <input type = "hidden" value ="service" name = "type" />
                                    <button type = "submit" class="flex items-center px-6 py-2 font-bold text-white transition duration-300 ease-in-out rounded-lg bg-customcolor3 hover:bg-customcolor4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                        </svg>
                                        <span class="ml-2">Add to Plan</span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>




        <div class=" pt-14">
            <h1 class="p-5 text-3xl font-bold py-0mt-10 text-startcustom-font-heading">Select Products</h1>
        </div>
        <div class="grid grid-cols-3 gap-8 px-5 pt-3" id="massage-section">
        @foreach ($products as $product)
            <div class="transition duration-500 transform bg-white shadow-xl rounded-xl hover:scale-105">
                <div class="flex items-start p-5">
                    <img src="{{asset('productimage/' . $product->images)}}" alt="Peppermint Oil" class="w-32 h-32 mr-5 rounded-xl">
                    <div class="flex flex-col flex-grow">
                        <h2 class="pb-3 text-xl font-bold custom-font-heading">{{$product->productname}}</h2>
                        <p class="text-sm">{{$product->description}}</p>
                        <div class="flex items-center justify-between py-4 mt-auto">
                            <p class="text-2xl font-semibold text-startcustom-font-heading">{{$product->price}}</p>
                            <form action="{{ route('summaries.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method("POST") --}}
                                <input type = "hidden" value ="{{$product->id}}" name = "id" />
                                <input type = "hidden" value ="{{$product->productname}}" name = "productname" />
                                <input type = "hidden" value ="{{$product->description}}" name = "description" />
                                <input type = "hidden" value ="{{$product->price}}" name = "price" />
                                <input type = "hidden" value ="{{$product->images}}" name = "images" />
                                <input type = "hidden" value ="product" name = "type" />
                                <button type = "submit" class="flex items-center px-6 py-2 font-bold text-white transition duration-300 ease-in-out rounded-lg bg-customcolor3 hover:bg-customcolor4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                    </svg>
                                    <span class="ml-2">Add to Plan</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Add similar code for other oils -->
        </div>

        <div class="">
            <h1 class="p-10 text-3xl font-bold py-0mt-10 text-startcustom-font-heading">Combos</h1>
        </div>

        <div class="grid grid-cols-3 gap-8 px-5 pt-3" id="massage-section">
            @foreach ($combos as $combo)
            <div class="transition duration-500 transform bg-white shadow-xl rounded-xl hover:scale-105">
                <div class="flex items-start p-5">
                    <img src="{{ asset('comboimage/' . $combo->images) }}" alt="Peppermint Oil" class="w-32 h-32 mr-5 rounded-xl">
                    <div class="flex flex-col flex-grow">
                        <h2 class="pb-3 text-xl font-bold custom-font-heading">{{$combo->productname}} & {{$combo->servicetype}}</h2>
                        <p class="text-sm">20% OFF!!!</p>
                        <div class="flex items-center justify-between py-4 mt-auto">
                            <p class="text-2xl font-semibold text-startcustom-font-heading">{{$combo->subtotal}}</p>
                            <form action="{{ route('summaries.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("POST")
                                <input type = "hidden" value ="{{$combo->id}}" name = "id" />
                                <input type = "hidden" value ="{{$combo->productname}}" name = "productname" />
                                <input type = "hidden" value ="{{$combo->servicetype}}" name = "servicetype" />
                                <input type = "hidden" value ="{{$combo->subtotal}}" name = "price" />
                                <input type = "hidden" value ="{{$combo->images}}" name = "images" />
                                <input type = "hidden" value ="combo" name = "type" />
                                <button type = "submit" class="flex items-center px-6 py-2 font-bold text-white transition duration-300 ease-in-out rounded-lg bg-customcolor3 hover:bg-customcolor4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                    </svg>
                                    <span class="ml-2">Add to Plan</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Add similar code for other oils -->
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

