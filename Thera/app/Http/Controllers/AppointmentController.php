<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class AppointmentController extends Controller
{
    public function store(request $request)
    {
        // dd($request);
        // dd(session());

        $currentDate = Carbon::now()->format('Y-m-d'); // Current date in 'Y-m-d' format
        $inputDate = $request->input('appointmentDate');
        // dd($currentDate);
        if ($inputDate < $currentDate) {
            // Invalid date, handle the validation error
            return redirect()->back()->withInput()->withErrors(['appointmentDate' => 'Invalid appointment date. Please select a date on or after today.']);
        }
        $currentTime = Carbon::now()->format('H:i'); // Current time in 24-hour format
        $inputTime = $request->input('appointmentTime');

        if ($inputTime < '10:00' || $inputTime > '20:00') {
            // Invalid time, handle the validation error
            return redirect()->back()->withInput()->withErrors(['appointmentTime' => 'Invalid appointment time. Please select a time between 10:00 and 20:00.']);
        }
        if(!session('service'))
        {
            $serviceid = null;
        }
        elseif(session('service')){
            $serviceid = session('service')['id'];

            session()->forget('service');
        }
        if(!session('product'))
        {
            $productid = null;
        }
        elseif(session('product')){
            $productid = session('product')['id'];
            $stock = DB::table('stocks')
                ->where('product_id', '=',  $productid)
                ->decrement('quantity', 1);

            session()->forget('product');
        }
        if(!session('combo'))
        {
            $comboid = null;
        }
        elseif(session('combo')){
            $comboid =session('combo')['id'];
            $productID = Product::where('productname', session('combo')['productname'])->first();
            // dd($productID);
            $stock = DB::table('stocks')
                ->where('product_id', '=',  $productID->id)
                ->decrement('quantity', 1);

            session()->forget('combo');
        }


        $appointment = Appointment::create([
            'targetdate' => $inputDate,
            'time'=>$inputTime,
            'status'=>"booked",
            'service_id'=>  $serviceid,
            'product_id'=> $productid,
            'combo_id'=> $comboid,
            'customer_id'=>session('user'),
            'subtotal'=>session('total')
        ]);

        return redirect(route('profile'));
    }

    public function edit()
    {
        // dd($id);
    }
}
