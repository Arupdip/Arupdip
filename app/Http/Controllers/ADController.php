<?php

namespace App\Http\Controllers;

use App\Models\CAApply;
use App\Models\TraderApply;
use App\Models\Calog;
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
use App\Models\Traderlog;
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


    
    public function traderViewDetails($id){

        $traderview = TraderApply::where("application_id",'=',$id)->first();
 
        $Traderlog = Traderlog::where("application_id",'=',$traderview->id)->get();
        return view('ad.traderviewdetails', compact('traderview','Traderlog'));
 
     } 
 
     public function traderApproveSubmit(Request $request){
 
         $input = $request->all();
         $input['created_at'] = date('Y-m-d H:i:s');
         unset($input['_token']);
 
         $input['user_id'] = Auth::user()->id;
         $approvetrader = Traderlog::insertGetId($input);
         TraderApply::where("id",'=',$request->application_id)->update(['is_ad_approval'=>1]);
         if($approvetrader){
            return redirect('/ad/traderapplylist')->with('success','Trader Approved succesfully');
         }
   
  
        }


        public function caViewDetails($id){

            $cadata = CAApply::where("application_id",'=',$id)->first();
            $calog = Calog::where("application_id",'=',$cadata->id)->get();
            return view('ad.caviewdetails', compact('cadata','calog'));
     
         } 
     
         public function caApproveSubmit(Request $request){
     
             $input = $request->all();
             $input['created_at'] = date('Y-m-d H:i:s');
             unset($input['_token']);
     
             $input['user_id'] = Auth::user()->id;
             $approveca = Calog::insertGetId($input);
             CAApply::where("id",'=',$request->application_id)->update(['is_ad_approval'=>1]);
             if($approveca){
                return redirect('/ad/caapplylist')->with('success','CA Approved succesfully');
             }
       
      
          } 
    
}
