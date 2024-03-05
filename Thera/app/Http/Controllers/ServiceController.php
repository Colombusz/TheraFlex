<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Rate;
use DB;
use File;
class ServiceController extends Controller
{
    public function index()
    {
    //    dd()
        $query = DB::table('services')
            ->join('rates', 'services.id', '=', 'rates.service_id')
            ->select('services.id','services.servicetype', 'services.description','services.images','rates.hours','rates.price')
            ->get();
            $user =  auth()->guard('manager')->user();

            // dd($user);
        return view('services.index', ['query'=>$query]);
        //  dd($query);
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
       // Validate the request data
       $data = $request->validate([
        'Service' => 'required',
        'Description' => 'required',
        'hours' => 'required|numeric',
        'rate' => 'required|numeric',
        'Image' => 'required|image|mimes:jpeg,png,jpg|max:2048' // Use 'ProductImage' instead of 'images'
        ]);
    // dd($request);

        // Process the uploaded image
        $imageName = null; // Default value

        if ($request->hasFile('Image')) { // Use 'ProductImage' instead of 'images'
            $image = $request->file('Image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('serviceimage'), $fileName);
        }
        // dd($fileName);
        // Create product with the validated data
        $service = Service::create([
            'servicetype' => $data['Service'],
            'description' => $data['Description'],
            'images' => $fileName
        ]);

        // Create and associate stock with the product
        $rate = new Rate([
            'hours' => $data['hours'],
            'price' => $data['rate']
        ]);

        $service->rates()->save($rate);

        return redirect(route('services.index'));
    }

    public function edit($id)
    {

        $query = DB::table('services')
            ->join('rates', 'services.id', '=', 'rates.service_id')
            ->select('services.id','services.servicetype', 'services.description','services.images','rates.hours','rates.price')
            ->where('services.id', '=', $id)
            ->first();

            return view('services.edit', ['query'=>$query]);
                // dd($query);
    }

    public function update(Request $request)
    {
    //   dd($request);
      $data = $request->validate([
        'Service' => 'required',
        'Description' => 'required',
        'Hours' => 'required|numeric',
        'Price' => 'required|numeric',
        'Image' => 'image|mimes:jpeg,png,jpg|max:2048' // Use 'ProductImage' instead of 'images'
   ]);
//    dd($data);
   $directory = public_path('serviceimage');
   $filePath = $directory . '/' . $request->old;
//    dd($filePath);


   if ($request->hasFile('Image')) {
        $image = $request->file('Image');
        $fileName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('serviceimage'), $fileName);
        File::delete($filePath);
    }
    else
    {
        $fileName = $request->old;
    }

//    locating table
   $product = Service::find($request->id);
    // updating
    $product->update([
        'servicetype' => $data['Service'],
        'description' => $data['Description'],
        'images'=>$fileName
    ]);
    $product->rates->update([
        'hours' => $data['Hours'],
        'price' => $data['Price'],
    ]);
    return redirect(route('services.index'));
    // $service->rates()->save($rates);

    // dd($request);
    }

    public function delete($id)
    {
        $query = DB::table('services')
            ->join('rates', 'services.id', '=', 'rates.service_id')
            ->select('services.id','services.servicetype', 'services.description','services.images','rates.hours','rates.price')
            ->where('services.id', '=', $id)
            ->first();
        // dd($query);
        $product = Service::find($id);

        $directory = public_path('serviceimage');
        $filePath = $directory . '/' . $query->images;
    //    dd($filePath);
       File::delete($filePath);
        $product->delete();
        // dd($service);
        // $id->delete();
        return redirect(route('services.index'));
    }
}
