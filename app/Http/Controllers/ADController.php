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
class ADController extends Controller
{

   
    public function dashboard(){
        return view('ad.dashboard');

    }


    public function caapplylist(){

        $data = CAApply::where("is_amc_approval","=",1)->get();
        return view('ad.caapplylist', compact('data'));

    }
    public function caapproval($id){

        CAApply::where("application_id",'=',$id)->update(['is_ad_approval'=>1]);
        return redirect('/ad/caapplylist');

    }

    

    public function traderapplylist(){

        $data = TraderApply::where("is_amc_approval","=",1)->get();
        return view('ad.traderapplylist', compact('data'));

    }
    public function traderapproval($id){

        TraderApply::where("application_id",'=',$id)->update(['is_ad_approval'=>1]);
        return redirect('/ad/traderapplylist');

    }

    
}
