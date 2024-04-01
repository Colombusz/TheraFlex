<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Models\Summary;
use App\Models\Customer;
use App\Models\Appointment;
use App\Models\Product;
use App\Models\Service;
use App\Models\Combo;
use DB;
use File;
class CustomerAccessController extends Controller
{
    // =========ITEMS===============
    public function items_index()
    {

        $products = DB::table('products')
            ->join('stocks', 'products.id', '=', 'stocks.product_id')
            ->select('products.id','products.productname', 'products.description','products.images','stocks.quantity','stocks.price')
            ->get();

        $services = DB::table('services')
            ->join('rates', 'services.id', '=', 'rates.service_id')
            ->select('services.id','services.servicetype', 'services.description','services.images','rates.hours','rates.price')
            ->get();

        $combos = DB::table('combos')
            ->join('services', 'services.id', '=', 'combos.service_id')
            ->join('products', 'products.id', '=', 'combos.product_id')
            ->select('combos.id','services.servicetype', 'products.productname','combos.images','combos.subtotal')
            ->get();
            // $user = auth()->guard('customer')->user()->id;


        return view('customerAccess/items.index', ['products'=>$products, 'services'=>$services, 'combos'=>$combos]);
    }

    public function profile()
    {
        $user = auth()->guard('customer')->user()->id;
        // dd(auth()->guard('customer')->user());
        $booked = DB::table('customers')
        ->join('appointments', 'appointments.customer_id', '=', 'customers.id')
        ->select('appointments.id', 'appointments.subtotal', 'appointments.targetdate', 'appointments.time','appointments.status')
        ->where('customers.id', '=', $user)
        ->where('appointments.status', '=', 'booked')
        ->get();

        $done = DB::table('customers')
        ->join('appointments', 'appointments.customer_id', '=', 'customers.id')
        ->select('appointments.id', 'appointments.subtotal', 'appointments.targetdate', 'appointments.time','appointments.status')
        ->where('customers.id', '=', $user)
        ->where('appointments.status', '=', 'done')
        ->orWhere('appointments.status', '=', 'declined')
        ->get();
        // dd($done);


        $userinfo = auth()->guard('customer')->user();
        // dd($userinfo);
        // dd($booked);
        return view('customerAccess/profile.index', ['booked'=>$booked, 'done'=>$done, 'userinfo'=>$userinfo]);
    }

    public function appointment()
    {
        return view('customerAccess/appointments.index');
    }

    public function store(request $request)
    {

        $user = auth()->guard('customer')->user()->id;
        // dd($user);
        // dd($request);

        if ($request->type == "product" && !session()->has('product'))
        {
            $product = [
                'id'=> $request->id,
                'productname'=>$request->productname,
                'price'=>$request->price
            ];
            session(['product'=>$product]);
        }
        elseif($request->type == "product" && session()->has('product')){
            session()->forget('product');

            $product = [
                'id'=> $request->id,
                'productname'=>$request->productname,
                'price'=>$request->price
            ];
            session(['product'=>$product]);
        }

        if($request->type == "service" && !session()->has('service'))
        {
            $service = [
                'id'=> $request->id,
                'servicetype'=>$request->servicetype,
                'price'=>$request->price
            ];
            session(['service'=>$service]);
        }
        elseif($request->type == "service" && session()->has('service'))
        {
            session()->forget('service');
            $service = [
                'id'=> $request->id,
                'servicetype'=>$request->servicetype,
                'price'=>$request->price
            ];
            session(['service'=>$service]);
        }

        if($request->type == "combo" && !session()->has('combo'))
        {
            // $info = DB::table('combo')->find($request->id);
            // dd($info);
            $combo = [
                'id'=> $request->id,
                'servicetype'=>$request->servicetype,
                'images'=>$request->images,
                'productname'=>$request->productname,
                'price'=>$request->price
            ];
            session(['combo'=>$combo]);
        }
        elseif($request->type == "combo" && session()->has('combo'))
        {
            session()->forget('combo');
            $combo = [
                'id'=> $request->id,
                'servicetype'=>$request->servicetype,
                'images'=>$request->images,
                'productname'=>$request->productname,
                'price'=>$request->price
            ];
            session(['combo'=>$combo]);
        }

        session()->put('user', $user);
        // dd(session('combo'));


        return redirect(route('itemList'));
    }

    public function edit($id)
    {
        // dd($id);
        $app = Appointment::find($id);
        $service = Service::find($app->service_id);
        $product = Product::find($app->product_id);
        $combo = DB::table('combos')
            ->join('services', 'services.id', '=', 'combos.service_id')
            ->join('products', 'products.id', '=', 'combos.product_id')
            ->join('appointments', 'appointments.combo_id', '=' , 'combos.id')
            ->select('combos.id','services.servicetype', 'products.productname','combos.images','appointments.subtotal')
            ->where('combos.id', "=", $app->combo_id)
            ->first();
            // dd($combo);

        // dd($app);

        return view('customerAccess/appointments.edit', ['app'=>$app, 'service'=>$service, 'product'=>$product, 'combo'=>$combo]);
    }
    public function remove(Request $request)
    {
        $type = $request->type;

        // Remove the session based on the service ID
        session()->forget($type);

        return redirect()->back();
    }

    public function proEdit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customerAccess/profile.edit', compact('customer'));
    }

    public function proUpdate(Request $request)
    {
        $query = DB::table('customers')
        ->select('customers.images')
        ->where('customers.id', '=', $request->id)
        ->first();

        // dd($request->id);


        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phoneNum' => 'required|string|max:12',
            'address' => 'required',
            'username' => 'required',
            'password' => 'required',
            'images' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $directory = public_path('uploads');
        $filePath = $directory . '/' . $query->images;

         $imageName = null;

         if ($request->hasFile('images')) {
             $image = $request->file('images');
             $fileName = time() . '_' . $image->getClientOriginalName();
             // $filePath = $request->file('images')->storeAs('uploads', $fileName, 'public');
             $image->move(public_path('uploads'), $fileName);
             $filepath= public_path('uploads/' . $fileName);
             $imageName = $fileName;
             File::delete($filePath);
         }
        else {

            $imageName = $query->images;
        }


        $customer = Customer::findOrFail($request->id);
        $customer->update([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'phoneNum' => $request->input('phoneNum'),
            'address' => $request->input('address'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'images' => $imageName,
        ]);

        return redirect()->route('profile')->with('success', 'Customer updated successfully.');
    }

    public function prodInfo_index()
    {

    }


    public function servInfo_index()
    {

    }
    // ==========ITEMS END============

}
