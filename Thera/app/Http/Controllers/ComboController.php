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
        $request->validate([
            'images' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        dd($request);
    }

}
