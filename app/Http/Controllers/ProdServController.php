<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Rate;
use App\Models\Product;
use App\Models\Stock;
use DB;

class ProdServController extends Controller
{
    public function index()
    {
        $query = DB::table('services')
            ->join('rates', 'services.id', '=', 'rates.service_id')
            ->select('services.id','services.servicetype', 'services.description','rates.hours','rates.price')
            ->get();
        $query2 = DB::table('products')
            ->join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.id','products.productname', 'products.description','stocks.quantity','stocks.price')
            ->get();

        return view('services.index', [
            'query'=>$query,
            'query2'=>$query2
    ]);
        //  dd($query2);
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        //  dd($request);
       if((isset($request['Product']) && isset($request['ProdDescription']) && isset($request['Quantity']) && isset($request['Price'])))
       {
        dd($request);
        $data = $request->validate([
                'Product'=>'required',
                'ProdDescription'=>'required',
                'Quantity'=>'required|numeric',
                'Price'=>'required|numeric'
             ]);

            $product = Product::create([
                'productname'=>$data['Product'],
                'description'=>$data['ProdDescription']
            ]);

            $stock = new Stock([
                'quantity'=>$data['Quantity'],
                'price'=>$data['Price']
            ]);
            $product->stocks()->save($stock);
            return redirect(route('services.index'));

       }
       elseif((isset($request['Services']) && isset($request['Description']) && isset($request['Hours']) && isset($request['rate'])))
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

            $service->rates()->save($rate);
            return redirect(route('services.index'));
       }
       else
       {
            // dd($request);
            $data = $request->validate([
                'Services'=>'required',
                'Description'=>'required',
                'Hours'=>'required|numeric',
                'rate'=>'required|numeric',
                'Product'=>'required',
                'ProdDescription'=>'required',
                'Quantity'=>'required|numeric',
                'Price'=>'required|numeric'
            ]);

             $service = Service::create([
            'servicetype' => $data['Services'],
            'description' => $data['Description'],
            ]);

            $rate = new Rate([
                'hours' => $data['Hours'],
                'price' => $data['rate'],

            ]);

            $product = Product::create([
                'productname'=>$data['Product'],
                'description'=>$data['ProdDescription']
            ]);

            $stock = new Stock([
                'quantity'=>$data['Quantity'],
                'price'=>$data['Price']
            ]);

            // dd($request);

            $service->rates()->save($rate);
            $product->stocks()->save($stock);
            return redirect(route('services.index'));
       }

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
