<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function loginsubmit(Request $request)
    {


        //return $password = Hash::make(12345);
        // return $password;
        // return view('admin/add-district');

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        try {
        $credentials = $request->only('email', 'password');
       // dd(Auth::attempt($credentials));

         if(Auth::attempt($credentials)){
            if(Auth::user()->user_type ==0)
            return redirect('admin');
            if(Auth::user()->user_type ==3)
            return redirect('amc');

            if(Auth::user()->user_type ==4)
            return redirect('ad');

            if(Auth::user()->user_type ==5)
            return redirect('commissioner');
         }
         return redirect("admin/login")->withSuccess('Oppes! You have entered invalid credentials');

        } catch (\Throwable $th) {
            // throw $th;s4444
        }
       
        

    }
}
