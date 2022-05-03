<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){


        return view('admin.dashboard');

    }

    public function pdfdownload($id){


        $pdf = PDF::loadView('email.pdf');
        // download PDF file with download method
        return $pdf->download('license.pdf');

    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
