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
            return redirect('admin');
         }
         return redirect("admin/login")->withSuccess('Oppes! You have entered invalid credentials');

        } catch (\Throwable $th) {
            // throw $th;s4444
        }
       
        

    }
}
