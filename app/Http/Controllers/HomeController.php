<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
// use Illuminate\Database\Eloquent\TraderApply;
use App\Models\TraderApply;
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

        $body =  TraderApply::where("application_id", "=", $id)->first();
        $pdf = PDF::loadView('email.pdf',compact('body'));
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
