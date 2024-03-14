
    {{-- @php
        dd($query);
    @endphp --}}


    @extends('layouts.app')
    @extends('layouts.LinkScript')
    @section('title', 'TheraFlex')
    {{-- @extends('layouts.sideCart') --}}
    @section('header')
        @parent
    @stop

    @section('content')

    <div class="flex flex-col items-center justify-center min-h-screen" style="background: linear-gradient(180deg, rgba(180, 198, 198, 0.97), rgba(81, 183, 79));">
        <div class="text-4xl font-bold text-black mt-4 ml-4">{{ $date . '\'s Reservations' }}</div>
        <!-- Text "Employees Information" -->
        <div class="w-4/5 flex justify-start">

        </div>

        <!-- Beautified Table -->
        <div class="w-4/5 p-5 m-2 bg-white bg-opacity-50 shadow-xl rounded-xl">
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="px-4 py-2 border border-gray-400">Appointment Time</th>
                        <th class="px-4 py-2 border border-gray-400">Ending Time</th>
                        <th class="px-4 py-2 border border-gray-400">Total Session Hours</th>
                        <th class="px-4 py-2 border border-gray-400">Assigned Masseur</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($appointments as $appointment)
                    <tr>
                        @php
                            // dd($rate[0]->hours)

                            $employ = $assemployees[$i]->fname;
                            $apps = DB::table('appointments')
                            ->join('services', 'services.id', '=', 'appointments.service_id')
                            ->join('rates', 'services.id', '=', 'rates.service_id')
                            ->select('rates.hours', 'services.id', 'appointments.service_id')
                            ->where('appointments.targetdate', '=', $date)
                            ->where('appointments.id', '=', $appointment->id)
                            ->first();

                            $apps2 = DB::table('combos')
                            ->join('appointments', 'combos.id', '=', 'appointments.combo_id')
                            ->join('rates', 'rates.service_id', '=', 'combos.service_id')
                            ->select('rates.hours', 'combos.service_id')
                            ->where('appointments.targetdate', '=', $date)
                            ->where('appointments.id', '=', $appointment->id)
                            ->first();
                            // dd($apps2);

                            $apps = isset($apps->hours) ? $apps->hours : 0;


                            $apps2 = isset($apps2->hours) ? $apps2->hours : 0;
                            $tothr = $apps + $apps2;

                            $i++;
                            // dd($employ);
                            $appTime = strtotime($appointment->time);
                            $tothrInSeconds = $tothr * 3600;
                            $totalTime = $appTime + $tothrInSeconds;
                            $totalTimeString = date('H:i', $totalTime);


                            // dd($tothr);
                        @endphp
                        <td class="px-4 py-2 border border-gray-400">{{$appointment->time}}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $totalTimeString }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $tothr }}</td>
                        <td class="px-4 py-2 border border-gray-400">{{ $employ}}</td>
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
    <div class="w-4/5 flex justify-between items-center">
    <form action = "{{ route('appointments.store') }}" method = "POST">
        @csrf

            {{-- <div class="text-4xl font-bold text-black mt-4 ml-4">Services</div> --}}
            <input type="time" id="appointmentTime" name="appointmentTime" value="{{ old('appointmentTime') }}" class="px-4 py-2 mb-2 font-bold text-black bg-white border border-green-500 rounded-xl" min="10:00" max="20:00">
    </div>
        <div class="w-4/5 flex justify-between items-center">
            <select id="dropdown" name="employee" size="1" multiple>
                @foreach ($employees as $employee)
                    <option name = "employee" value="{{ $employee->id }}">{{ $employee->fname ." ". $employee->lname }}</option>
                @endforeach
            </select>
        </div>


            <input type = "hidden" name = "appointmentDate" value = "{{ $date }}">
            {{-- <input type = "hidden" name = "appointmentTime" value = " $date" > --}}
            {{-- <input type = "hidden" name = "appointmentDate" value = " $date" > --}}
            <div class="w-4/5 flex justify-between items-center">
                {{-- <div class="text-4xl font-bold text-black mt-4 ml-4">Services</div> --}}
                <button type = "submit" class="px-3 py-1 text-white bg-green-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-green-600">Set Appointment</button>

        </form>
    </div>

    @endsection
