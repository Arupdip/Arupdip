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
class CommissionerController extends Controller
{

   
    public function dashboard(){
        return view('commissioner.dashboard');

    }


    public function caapplylist(){

        $data = CAApply::where("is_ad_approval","=",1)->get();
        return view('commissioner.caapplylist', compact('data'));

    }
    public function caapproval($id){

        CAApply::where("application_id",'=',$id)->update(['is_commisioner_approval'=>1]);
        return redirect('/commissioner/caapplylist');

    }

    public function traderapplylist(){

        $data = TraderApply::where("is_ad_approval","=",1)->get();
        return view('commissioner.traderapplylist', compact('data'));

    }
    public function traderapproval($id){

        TraderApply::where("application_id",'=',$id)->update(['is_commisioner_approval'=>1]);
        return redirect('/commissioner/traderapplylist');

    }



    
}
