<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Rate;
use DB;
class ServiceController extends Controller
{
    public function index()
    {
        $query = DB::table('services')
            ->join('rates', 'services.id', '=', 'rates.service_id')
            ->select('services.id','services.servicetype', 'services.description','rates.hours','rates.price')
            ->get();
        return view('services.index', ['query'=>$query]);
        //  dd($query);
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
       // dd($request);
       $data = $request->validate([
            'Services'=>'required',
            'Description'=>'required',
            'Hours'=>'required|numeric',
            'rate'=>'required|numeric'
       ]);

       $service = Service::create([
        'servicetype' => $data['Services'],
        'description' => $data['Description'],
        ]);

        $rate = new Rate([
            'hours' => $data['Hours'],
            'price' => $data['rate'],

        ]);

        // dd($request);

        $service->rates()->save($rate);
        return redirect(route('services.index'));
    }

    public function edit($id)
    {

        $query = DB::table('services')
            ->join('rates', 'services.id', '=', 'rates.service_id')
            ->select('services.id','services.servicetype', 'services.description','rates.hours','rates.price')
            ->where('services.id', '=', $id)
            ->first();

            return view('services.edit', ['query'=>$query]);
                // dd($query);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'Services'=>'required',
            'Description'=>'required',
            'Hours'=>'required|numeric',
            'rate'=>'required|numeric'
       ]);
    //    locating table
       $service = Service::find($request->id);
        // updating
        $service->update([
            'servicetype' => $data['Services'],
            'description' => $data['Description'],
        ]);
        $service->rates->update([
            'hours' => $data['Hours'],
            'price' => $data['rate'],
        ]);
        return redirect(route('services.index'));
        // $service->rates()->save($rates);

        // dd($request);
    }

    public function delete($id)
    {
        $service = Service::find($id);
        $service->delete();
        // dd($service);
        // $id->delete();
        return redirect(route('services.index'));
    }
}
