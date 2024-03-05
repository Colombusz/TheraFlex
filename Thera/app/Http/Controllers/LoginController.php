<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

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
            return redirect(route('services.index'));

        }
   }

   public function out(request $request)
   {
        // $user = $request->user();
        Auth::logout();
        return view('adminlogin.index');
   }
}
