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

        $data = TraderApply::where("is_ad_approval","=",1)->orwhere("is_commissioner_comply","=",1)->get();
        return view('commissioner.traderapplylist', compact('data'));

    }
    public function traderapproval($id){

        TraderApply::where("application_id",'=',$id)->update(['is_commisioner_approval'=>1]);
        return redirect('/commissioner/traderapplylist');

    }


    public function traderViewDetails($id){

        $traderview = TraderApply::where("application_id",'=',$id)->first();
 
        $Traderlog = Traderlog::where("application_id",'=',$traderview->id)->get();
        return view('commissioner.traderviewdetails', compact('traderview','Traderlog'));
 
     } 


     
     public function viewtradercomply($id){

        $traderold = Traderlog::where("id",'=',$id)->first();
        $trader =  json_decode($traderold->old_data);

        return view('commissioner.tradermodalcomment', compact('traderold','trader'));
 
     } 



     public function edittradercomply($id){

        $trader = TraderApply::where("id",'=',$id)->first();
        $traderold ='';
        if($trader->is_commissioner_comply==1 && Auth::user()->user_type == 4)
        $traderold = Traderlog::where("application_id",'=',$id)->where("type",'=',1)->orderBy('id', 'desc')->first();
        if($trader->is_ad_comply==1 && Auth::user()->user_type == 3)
        $traderold = Traderlog::where("application_id",'=',$id)->where("type",'=',2)->orderBy('id', 'desc')->first();
        


        return view('commissioner.tradermodal', compact('trader','traderold'));
 
     } 

     public function submitcomply(Request $request){

        $data =$request->all();
        unset($data['_token']);
        unset($data['id']);

        $input['created_at'] = date('Y-m-d H:i:s');
        $input['application_id'] = $request->id;
        $input['old_data'] = json_encode(TraderApply::where("id",'=',$request->id)->first());
        $input['comment'] = 'Comply';
        $input['logs'] = json_encode($data);;
        if(Auth::user()->user_type == 5)
        $input['type'] = '1';
        if(Auth::user()->user_type == 4)
        $input['type'] = '2';
        if(Auth::user()->user_type == 3)
        $input['type'] = '3';
        $input['user_id'] = Auth::user()->id;
        $approvetrader = Traderlog::insertGetId($input);
        if(Auth::user()->user_type == 5)
        TraderApply::where("id",'=',$request->id)->update(['is_commissioner_comply'=>1]);

        if(Auth::user()->user_type == 4)
        TraderApply::where("id",'=',$request->id)->update(['is_ad_comply'=>1]);

        if(Auth::user()->user_type == 3)
        TraderApply::where("id",'=',$request->id)->update(['is_amc_comply'=>1]);
        return redirect()->back()->with('success','Commply succesfully sent !!');
     }


 
     public function traderApproveSubmit(Request $request){
 
         $input = $request->all();
         $input['created_at'] = date('Y-m-d H:i:s');
         unset($input['_token']);
 
         $input['user_id'] = Auth::user()->id;
         $approvetrader = Traderlog::insertGetId($input);
         TraderApply::where("id",'=',$request->application_id)->update(['is_commisioner_approval'=>1]);
         if($approvetrader){
            return redirect('/commissioner/traderapplylist')->with('success','Trader Approved succesfully');
         }
   
  
        }

        public function caViewDetails($id){

            $cadata = CAApply::where("application_id",'=',$id)->first();
            $calog = Calog::where("application_id",'=',$cadata->id)->get();
            return view('commissioner.caviewdetails', compact('cadata','calog'));
     
         } 
     
         public function caApproveSubmit(Request $request){
     
             $input = $request->all();
             $input['created_at'] = date('Y-m-d H:i:s');
             unset($input['_token']);
     
             $input['user_id'] = Auth::user()->id;
             $approveca = Calog::insertGetId($input);
             CAApply::where("id",'=',$request->application_id)->update(['is_commisioner_approval'=>1]);
             if($approveca){
                return redirect('/commissioner/caapplylist')->with('success','CA Approved succesfully');
             }
       
      
          } 


    
}
