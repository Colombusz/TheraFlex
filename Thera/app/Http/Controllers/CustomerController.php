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
            'phoneNumber' => 'required|string|max:12',
            'address' => 'required',
            'username' => 'required|unique:customers',
            'password' => 'required'
        ]);

        Customer::create([
            'fname' => $request->input('firstName'),
            'lname' => $request->input('lastName'),
            'phoneNum' => $request->input('phoneNumber'),
            'address' => $request->input('address'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'images' => 'image.png'
        ]);

        return redirect()->route('log', ['request'=>$request]);
        dd($request);
    }
}
