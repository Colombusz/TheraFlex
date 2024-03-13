<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
// use App\Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
   public function index()
   {
        return view('adminlogin.index');
   }
   public function auth(Request $request)
   {

        // dd($request);
        $field = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        // dd($request);
        if(auth()->guard('manager')->attempt($field))
        {

            $request->session()->regenerate();
            return redirect(route('adminlogin.profile'));

        }
        elseif(auth()->guard('customer')->attempt($field))
        {
            $request->session()->regenerate();
            return redirect(route('itemList'));
        }
        elseif(auth()->guard('employee')->attempt($field))
        {
            $request->session()->regenerate();
            return redirect(route('adminlogin.profile'));
        }

        return redirect(route('welcome'));
   }

   public function profile()
   {
        return view('admin.index');
   }

   public function out(request $request)
   {
        // $user = $request->user();

        // dd(auth()->guard('customer')->user());
    //     if(auth()->guard('manager'))
    //     {
    //         dd(auth()->guard('manager'));
    //         auth()->guard('manager')->logout();
    //         return view('adminlogin.index');

    //     }
    //    if(auth()->guard('employee'))
    //     {
    //         dd(auth()->guard('employee'));
    //         auth()->guard('employee')->logout();
    //         return redirect(route('adminlogin.index'));
    //     }
    //     if(auth()->guard('customer'))
    //     {

    //         //  auth()->guard('customer')->logout();
    //
    //     }
    auth()->guard('manager')->logout();
    auth()->guard('customer')->logout();
    auth()->guard('manager')->logout();
    return redirect(route('welcome'));


   }


}
