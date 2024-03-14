<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Product;
// use App\Models\Rate;
use App\Models\Service;
use App\Models\Combo;
use App\Models\Employee;
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
            'employee_id'=> $request->employee,
            'subtotal'=>session('total')
        ]);

        return redirect(route('profile'));
    }

    public function edit()
    {
        // dd($id);
    }

    public function index($id)
    {

        $customer = Customer::find($id);
        $appointments = Appointment::where('appointments.customer_id','=', $id)->get();
        return view('customers.appointments', ['customer'=> $customer,'appointments'=> $appointments]);
    }

    public function create(request $request)
    {
        // dd($request);

        $userid = auth()->guard('customer')->user()->id;
        $appointments = Appointment::where('targetdate','=',$request->appointmentDate)->get();
        // dd($appointments);
        $assemployees = [];
        $combo = [];
        $rate = [];
        foreach ($appointments as $appointment) {
            $employee = Employee::where('id','=', $appointment->employee_id)->first();
            $rateli = DB::table('rates')->where('rates.service_id','=',$appointment->service_id)->first();
            $comboli = Combo::where('id', '=', $appointment->combo_id)->first();


            if ($employee) {
                $assemployees[] = $employee;
            }
            if ($rateli) {
                $rate[] = $rateli;
            }
            if ($comboli) {
                $combo[] = $comboli;
            }
        }
        $employees = Employee::all();
        $rateCom = [];
        foreach ($combo as $comb) {
            $rate = DB::table('rates')->where('rates.service_id','=',$comb->service_id)->first();

            if ($rate){
                $rateCom[] = $rate;
            }
        }

        return view('customerAccess/appointments.calendar', [
            'appointments'=> $appointments,
            'assemployees'=> $assemployees,
            'rate'=> $rate,
            'ratecom'=> $rateCom,
            'employees'=> $employees,
            'date'=> $request->appointmentDate
        ]);
    }
}
