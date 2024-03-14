@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')
@extends('layouts.sideCart')
@section('header')
    @parent
@stop

@section('content')
<div class="absolute flex items-center justify-center px-56 pt-32">
    <h1 class="text-3xl">Ready to make an appointment?</h1>
</div>

<div class="object-left">

    <div class="flex flex-row items-center justify-start h-screen pt-20 pl-56 bg-gray-200">
        <!-- Card 1 -->
        <div class="w-3/12 p-10 mb-4 mr-10 bg-white rounded-lg shadow-md h-4/6">
            <!-- Icon Holder -->
            <div class="flex items-center justify-center mb-4">
                <div class="p-4 text-white rounded-full">
                    <img src="{{ asset('/icons/menubook.svg') }}" alt="Icon" class="w-20 h-20 object-non-scaling" style="fill: blue;">
                </div>
            </div>

            <!-- Phrase -->
            <div class="px-4 mb-4 text-center">
                <p class="text-xl">Select the products and <br>services that appeal to you.</p>
            </div>

            <!-- Button -->
            <div class="pt-16 pl-10 text-center py-28">
                <a href="{{ route('itemList') }}" class="block w-56 px-3 py-2 pl-5 font-bold text-center text-white rounded-xl bg-customcolor3 hover:bg-customcolor2 text-decoration-none">
                    Products and Services
                </a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="w-3/12 p-10 mb-4 mr-10 bg-white shadow-md rounded-xl h-4/6">
            <!-- Icon Holder -->
            <div class="flex items-center justify-center mb-4">
                <div class="p-4 text-white rounded-full">
                    <img src="{{ asset('icons/appointment.svg') }}" alt="Icon" class="w-20 h-20 object-non-scaling" style="fill: blue;">
                </div>
            </div>

            <!-- Phrase -->
            <div class="px-4 mb-4 text-center">
                <p class="text-xl">Set and schedule your<br> appointment.</p>
            </div>
            @error('appointmentDate')
            <div class="text-red-500">{{ $message }}</div>
            @enderror

            @error('appointmentTime')
            <div class="text-red-500">{{ $message }}</div>
            @enderror

            <!-- Date and Time Picker -->
<form method="POST" action="{{ route('appointments.create') }}">
                @csrf
            <div class="pt-0 text-center">
                <input type="date" id="appointmentDate" name="appointmentDate" value="{{ old('appointmentDate') }}" class="px-4 py-2 mb-2 font-bold text-black bg-white border border-green-500 rounded-xl">

                {{-- <input type="time" id="appointmentTime" name="appointmentTime" value="{{ old('appointmentTime') }}" class="px-4 py-2 mb-2 font-bold text-black bg-white border border-green-500 rounded-xl" min="10:00" max="20:00"> --}}
                <button action="submit" class="px-4 py-2 font-bold text-white bg-customcolor3 hover:bg-customcolor2 rounded-xl">
                    Choose Time Slot
                </button>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="w-3/12 p-10 mb-4 mr-10 bg-white rounded-lg shadow-md h-4/6">
            <!-- Icon Holder -->
            <div class="flex items-center justify-center mb-4">
                <div class="p-4 text-white rounded-full">
                    <img src="{{ asset('icons/done.svg') }}" alt="Icon" class="w-20 h-20 object-non-scaling" style="fill: blue;">
                </div>
            </div>

            <!-- Phrase -->
            <div class="px-4 mb-2 text-center">
                <p class="text-xl">Verify the details and go<br> schedule the <br> appointment.</p>
            </div>

            <!-- Button -->
            <div class="pt-10 mt-5 text-center py-28">
                <button type="submit" class="px-4 py-2 font-bold text-white bg-customcolor3 hover:bg-customcolor2 rounded-xl">
                    Set Appointment
                </button>
</form>
            </div>
        </div>
    </div>
</div>

@endsection
