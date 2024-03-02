<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use DB;
use File;

class ProductController extends Controller
{
    public function index()
    {
        $query = DB::table('products')
            ->join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.id','products.productname', 'products.description','products.images','stocks.quantity','stocks.price')
            ->get();

            return view('products.index', ['query'=>$query]);
                // dd($query);
    }
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'Product' => 'required',
            'ProdDescription' => 'required',
            'Quantity' => 'required|numeric',
            'Price' => 'required|numeric',
            'ProductImage' => 'required|image|mimes:jpeg,png,jpg|max:2048' // Use 'ProductImage' instead of 'images'
        ]);
        // dd($request);

        // Process the uploaded image
        $imageName = null; // Default value

        if ($request->hasFile('ProductImage')) { // Use 'ProductImage' instead of 'images'
            $image = $request->file('ProductImage');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('productimage'), $fileName);
        }

        // Create product with the validated data
        $product = Product::create([
            'productname' => $data['Product'],
            'description' => $data['ProdDescription'],
            'images' => $fileName
        ]);

        // Create and associate stock with the product
        $stock = new Stock([
            'quantity' => $data['Quantity'],
            'price' => $data['Price']
        ]);

        $product->stocks()->save($stock);

        return redirect(route('products.index'));
    }


    public function edit($id)
    {

        $query = DB::table('products')
            ->join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.id','products.productname', 'products.description','products.images','stocks.quantity','stocks.price')
            ->where('products.id', '=', $id)
            ->first();

            return view('products.edit', ['query'=>$query]);
                // dd($query);
    }

    public function update(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'Product' => 'required',
            'ProdDescription' => 'required',
            'Quantity' => 'required|numeric',
            'Price' => 'required|numeric',
            'ProductImage' => 'required|image|mimes:jpeg,png,jpg|max:2048' // Use 'ProductImage' instead of 'images'
       ]);
    //    dd($request);
       $directory = public_path('productimage');
       $filePath = $directory . '/' . $request->old;
    //    dd($filePath);
       File::delete($filePath);

       if ($request->hasFile('ProductImage')) {
            $image = $request->file('ProductImage');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('productimage'), $fileName);
        }

    //    locating table
       $product = Product::find($request->id);
        // updating
        $product->update([
            'productname' => $data['Product'],
            'description' => $data['ProdDescription'],
            'images'=>$fileName
        ]);
        $product->stocks->update([
            'quantity' => $data['Quantity'],
            'price' => $data['Price'],
        ]);
        return redirect(route('products.index'));
        // $service->rates()->save($rates);

        // dd($request);
    }

    public function delete($id)
    {
        $query = DB::table('products')
            ->join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.id','products.productname', 'products.description','products.images','stocks.quantity','stocks.price')
            ->where('products.id', '=', $id)
            ->first();
        // dd($query);
        $product = Product::find($id);

        $directory = public_path('productimage');
        $filePath = $directory . '/' . $query->images;
    //    dd($filePath);
       File::delete($filePath);
        $product->delete();
        // dd($service);
        // $id->delete();
        return redirect(route('products.index'));
    }
}
