
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
    <div class="text-4xl font-bold text-black mt-4 ml-4">{{ 'Employee '. $employee->fname . '\'s Payrolls' }}</div>
    <!-- Text "Employees Information" -->
    <div class="w-4/5 flex justify-start">

    </div>
    <div class="w-4/5 flex justify-between items-center">
        {{-- <div class="text-4xl font-bold text-black mt-4 ml-4">Services</div> --}}
        <a href="{{ route('employees.create') }}" class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600 mb-3">Add Payroll</a>

    </div>
    <!-- Beautified Table -->
    <div class="w-4/5 p-5 m-2 bg-white bg-opacity-50 shadow-xl rounded-xl">
    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-700 text-white">
                    <th class="px-4 py-2 border border-gray-400">ID</th>
                    <th class="px-4 py-2 border border-gray-400">Worked Hours</th>
                    <th class="px-4 py-2 border border-gray-400">Pay Rate</th>
                    <th class="px-4 py-2 border border-gray-400">Gross Income</th>
                    <th class="px-4 py-2 border border-gray-400">SSS</th>
                    <th class="px-4 py-2 border border-gray-400">PagIbig</th>
                    <th class="px-4 py-2 border border-gray-400">Phil Health</th>
                    <th class="px-4 py-2 border border-gray-400">Income Tax</th>
                    <th class="px-4 py-2 border border-gray-400">Total Deduction</th>
                    <th class="px-4 py-2 border border-gray-400">Net Income</th>

                </tr>
            </thead>
            <tbody>
                @foreach($query as $Payinfo)
                <tr>
                    <td class="px-4 py-2 border border-gray-400">{{ $Payinfo->id }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{ $Payinfo->workedHours }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{ $Payinfo->payRate}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{ $Payinfo->grossIncome}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{ $Payinfo->sss }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$Payinfo->pagIbig }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$Payinfo->philHealth }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$Payinfo->incomeTax }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$Payinfo->Total }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$Payinfo->netIncome }}</td>

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
