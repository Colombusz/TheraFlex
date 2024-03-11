<?php

namespace App\Http\Controllers;
use App\Models\Combo;
use Illuminate\Http\Request;
use DB;
use File;

class ComboController extends Controller
{
    public function index()
    {
        $combos = DB::table('combos')
        ->join('products', 'products.id', '=', 'combos.product_id')
        ->join('services', 'services.id', '=', 'combos.service_id')
        ->select('combos.id','products.productname', 'services.servicetype','combos.subtotal', 'combos.images')
        ->get();

        return view('combos.index', ['combos'=>$combos]);
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
                $imageName = $fileName;
            }
            else{
                $imageName = "image.jpeg";
            }
            // dd($subtotal);
            // $image->move(public_path('productimage'), $fileName);
            // Adjust the path accordingly
        // dd($request);

        Combo::create([
            'service_id'=>$request->service,
            'product_id'=>$request->product,
            'images' => $imageName,
            'subtotal'=>$subtotal
        ]);

        return redirect()->route('combos.index');
        // dd($request);
    }

    public function edit($id)
    {
        // dd($id);
        $product = DB::table('products')
            ->join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.id','products.productname', 'products.description','products.images','stocks.quantity','stocks.price')
            ->get();

        $service = DB::table('services')
            ->join('rates', 'services.id', '=', 'rates.service_id')
            ->select('services.id','services.servicetype', 'services.description','services.images','rates.hours','rates.price')
            ->get();
        $combo = Combo::findOrFail($id);
        return view('combos.edit', compact('combo'),[ 'product'=>$product, 'service'=>$service]);
    }

    public function update(request $request)
    {
        // dd($request);
        $query = DB::table('combos')
        ->select('combos.images', 'combos.service_id', 'combos.product_id')
        ->where('combos.id', '=', $request->id)
        ->first();
        // $oldimage = $query->images;

        $request->validate([
            'images' => 'mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $directory = public_path('comboimage');
        $filePath = $directory . '/' . $query->images;

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $fileName = time() . '_' . $image->getClientOriginalName();
            // $filePath = $request->file('images')->storeAs('profiles', $fileName, 'public');
            $image->move(public_path('comboimage'), $fileName);
            $filepath= public_path('comboimage/' . $fileName);
            $imageName = $fileName; // Adjust the path accordingly
            File::delete($filePath);
        }
       else {

           $imageName = $query->images; // Keep the existing image if no new image is provided
       }
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

       $combo = Combo::findOrFail($request->id);
        $combo->update([
            'subtotal' => $subtotal,
            'service_id' => $request->service,
            'product_id' => $request->product,
            'images' => $imageName,
        ]);
        // dd($request);

        return redirect(route('combos.index'));

    }

        public function delete($id)
        {
                $query = DB::table('combos')
                ->select('combos.id', 'combos.images')
                ->where('combos.id', '=', $id)
                ->first();
            // dd($query);
            $combo = Combo::find($id);

            $directory = public_path('comboimage');
            $filePath = $directory . '/' . $query->images;
        //    dd($filePath);
            File::delete($filePath);
            $combo->delete();
            // dd($service);
            // $id->delete();
            return redirect(route('combos.index'));
        }

}
