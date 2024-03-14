{{-- @php
    dd($appointments);
@endphp --}}

    {{-- @php
        dd($query);
    @endphp --}}


    @extends('layouts.app')
    @extends('layouts.LinkScript')
    @section('title', 'TheraFlex')
    {{-- @extends('layouts.LinkScript') --}}
    @extends( 'layouts.adminSidebar')
    @section('header')

    @stop



    @section('content')

    <div class="flex flex-col items-center justify-center min-h-screen" style="background: linear-gradient(180deg, rgba(180, 198, 198, 0.97), rgba(81, 183, 79));">
        <div class="text-4xl font-bold text-black mt-4 ml-4">{{ 'Employee '. auth()->guard('employee')->user()->fname . '\'s Handled Appointments' }}</div>
        <!-- Text "Employees Information" -->
        <div class="w-4/5 flex justify-start">

        </div>
        <!-- Beautified Table -->
        <div class="w-4/5 p-5 m-2 bg-white bg-opacity-50 shadow-xl rounded-xl">
        <div class="overflow-x-auto">

            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="px-4 py-2 border border-gray-400">Appointment ID</th>
                        <th class="px-4 py-2 border border-gray-400">Date</th>
                        <th class="px-4 py-2 border border-gray-400">Time</th>
                        <th class="px-4 py-2 border border-gray-400">Status</th>
                        <th class="px-4 py-2 border border-gray-400">Customer Name</th>

                        <th class="px-4 py-2 border border-gray-400">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)

                    @php
                    $customer = DB::table('customers')
                    ->where('customers.id', $appointment->customer_id)
                    ->first();
                    // dd($customer->fname);
                     @endphp
                    <tr>

                        <td class="px-4 py-2 border border-gray-400">{{ $appointment->id }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $appointment->targetdate }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $appointment->time}}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $appointment->status}}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $customer->fname . ' '. $customer->lname}}</td>
                        <td class="px-4 py-2 border border-gray-400">
                            {{-- {{ $Payinfo->sss }} --}}
                            <a href="{{ route('employees.appointment_confirm', ['id' =>$appointment->id]) }}" class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600 mb-3">Confirm</a>
                            <a href="{{ route('employees.appointment_decline', $appointment->id) }}" class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600 mb-3">Decline</a>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
           {{-- <div class="flex justify-end mt-4">
                <button class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Update</button>
                <button class="px-3 py-1 ml-2 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Delete</button>
            </div> --}}
        </div>
    </div>


    @endsection
