<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use DB;
use File;


class CustomerController extends Controller
{
    public function register(request $request)
    {
        // dd($request);
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'username' => 'required|unique:customers',
            'phoneNumber' => 'required|numeric',
            'password' => 'required'
        ]);
        // dd($request);
        Customer::create([
            'fname' => $request->input('firstName'),
            'lname' => $request->input('lastName'),
            'phoneNum' => $request->input('phoneNumber'),
            'address' => $request->input('address'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'images' => 'image.png'
        ]);

        return redirect('/');
        // dd($request);
    }

    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phoneNum' => 'required|string|max:12',
            'address' => 'required',
            'username' => 'required|unique:customers',
            'password' => 'required',
            'images' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        $imageName = null;
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $fileName = time() . '_' . $image->getClientOriginalName();
            // $filePath = $request->file('images')->storeAs('uploads', $fileName, 'public');
            $image->move(public_path('uploads'), $fileName);
            $filepath= public_path('uploads/' . $fileName);
            $imageName = $fileName;

        }

        Customer::create([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'phoneNum' => $request->input('phoneNum'),
            'address' => $request->input('address'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'images' => $imageName,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request)
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

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function delete($id)
    {
        $query = DB::table('customers')
        ->select('customers.images')
        ->where('customers.id', '=', $id)
        ->first();

        $directory = public_path('uploads');
            $filePath = $directory . '/' . $query->images;
            File::delete($filePath);

        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Employee deleted successfully!');
    }
}
