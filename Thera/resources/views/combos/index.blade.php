@extends('layouts.app')
@extends('layouts.LinkScript')
@section('title', 'TheraFlex')
@extends( 'layouts.adminSidebar')
@section('header')
@parent
@stop

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen" style="background: linear-gradient(180deg, rgba(180, 198, 198, 0.97), rgba(81, 183, 79));">

    <div class="w-4/5 flex justify-between items-center">
        <div class="text-4xl font-bold text-black mt-4 ml-4">Combo Lists</div>
        <button class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Create</button>
    </div>


    <div class="w-4/5 p-5 m-2 bg-white bg-opacity-50 shadow-xl rounded-xl">
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="px-4 py-2 border border-gray-400">Product Type</th>
                        <th class="px-4 py-2 border border-gray-400">Service</th>
                        <th class="px-4 py-2 border border-gray-400">Service</th>
                        <th class="px-4 py-2 border border-gray-400">Images</th>
                        <th class="px-4 py-2 border border-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td class="px-4 py-2 border border-gray-400">Service Description 1</td>
                        <td class="px-4 py-2 border border-gray-400">$50</td>
                        <td class="px-4 py-2 border border-gray-400">$50</td>
                        <td class="px-4 py-2 border border-gray-400"><img src="path_to_image" alt="Service Image" class="w-16 h-16"></td>
                        <td class="px-4 py-2 border border-gray-400">
                        <button class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Edit</button>
                            <button class="px-3 py-1 ml-2 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Delete</button>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection