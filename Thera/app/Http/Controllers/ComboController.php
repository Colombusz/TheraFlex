<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use FIle;

class ComboController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $product = DB::table('products')
            ->join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.id','products.productname', 'products.description','products.images','stocks.quantity','stocks.price')
            ->get();

        $service = DB::table('services')
            ->join('rates', 'services.id', '=', 'rates.service_id')
            ->select('services.id','services.servicetype', 'services.description','services.images','rates.hours','rates.price')
            ->get();

        return view('combos.create', ['product'=>$product, 'service'=>$service]);
    }

    public function store(request $request)
    {
        // dd($request);
        $request->validate([
            'Image' => 'mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // dd($request);
        $combos = DB::table('combos')
            ->join('products', 'products.id', '=', 'combos.product_id')
            ->join('services', 'services.id', '=', 'combos.service_id')
            // ->select('products.id','products.productname', 'products.description','products.images','stocks.quantity','stocks.price')
            ->get();

            $product = DB::table('products')
            ->join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.id','products.productname', 'products.description','products.images','stocks.quantity','stocks.price')
            ->where('products.id', '=', $request->product)
            ->first();





        $service = DB::table('services')
            ->join('rates', 'services.id', '=', 'rates.service_id')
            ->select('services.id','services.servicetype', 'services.description','services.images','rates.hours','rates.price')
            ->where('services.id', '=', $request->service)
            ->first();
            // dd($service);

            $servtotal = $service->price;
            $prodtotal = $product->price;
            dd($servtotal);
            $image = $request->images;
            // dd($request);
            $fileName = time() . '_' . $image;
            // dd($fileName);
            // $filePath = $request->file('images')->storeAs('profiles', $fileName, 'public');
            $image->move(public_path('comboimage'), $fileName);
            $filepath= public_path('comboimage/' . $fileName);
            $imageName = $fileName; // Adjust the path accordingly
        // dd($request);

        Combos::create([
            'service_id'=>$request->service,
            'product_id'=>$request->product,
            'images' => $imageName,
        ]);

        return redirect()->route('combos.index',['combos'=> $combos ]);
        // dd($request);
    }

}
