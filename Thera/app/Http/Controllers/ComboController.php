<?php

namespace App\Http\Controllers;
use App\Models\Combo;
use Illuminate\Http\Request;
use DB;
use FIle;

class ComboController extends Controller
{
    public function index()
    {
        return view('combos.index');
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
            'images' => 'mimes:jpeg,png,jpg,gif|max:2048'
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
            $subtotal = ($servtotal + $prodtotal) - (($servtotal + $prodtotal)*0.2);
            // dd($servtotal);

            if ($request->hasFile('images')) {
                $image = $request->file('images');
                $fileName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('comboimage'), $fileName);
            }
            // dd($subtotal);
            // $image->move(public_path('productimage'), $fileName);
            $imageName = $fileName; // Adjust the path accordingly
        // dd($request);

        Combo::create([
            'service_id'=>$request->service,
            'product_id'=>$request->product,
            'images' => $imageName,
            'subtotal'=>$subtotal
        ]);

        return redirect()->route('combos.index',['combos'=> $combos ]);
        // dd($request);
    }

}
