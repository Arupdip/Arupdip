<?php

namespace App\Http\Controllers;

use App\Models\CAApply;
use App\Models\TraderApply;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Tempuser;
use App\Models\State;
use App\Models\District;
use DB;
use Auth;
class AMCController extends Controller
{

   
    public function dashboard(){
        return view('amc.dashboard');

    }


    public function caapplylist(){

        $data = CAApply::where("is_reg_pay","=",1)->get();
        return view('amc.caapplylist', compact('data'));

    }
    public function caapproval($id){

        CAApply::where("application_id",'=',$id)->update(['is_amc_approval'=>1]);
        return redirect('/amc/caapplylist');

    }


    public function traderapplylist(){

        $data = TraderApply::where("is_reg_pay","=",1)->get();
        return view('amc.traderapplylist', compact('data'));

    }
    public function traderapproval($id){

        TraderApply::where("application_id",'=',$id)->update(['is_amc_approval'=>1]);
        return redirect('/amc/traderapplylist');

    }


    
}
