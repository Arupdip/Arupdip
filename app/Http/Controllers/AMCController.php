<?php

namespace App\Http\Controllers;

use App\Models\CAApply;
use App\Models\TraderApply;
use App\Models\Traderlog;
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

    public function tradersignatureupload(){

        $data = TraderApply::where("is_final_pay","=",1)->where("is_sign_upload","!=",1)->orderBy('id', 'DESC')->get();
        return view('amc.tradersignatureupload', compact('data'));

    }


    public function uploadtraderesign(Request $request){
$input=array();

$input['is_sign_upload'] = 1;
        if ($file = $request->file('upload_signature')) {
            $input['signature_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['signature_file']);

            $data = TraderApply::where("id","=",$request->id)->update($input);
$log = array(

    'user_id' => Auth::user()->id,
    'application_id' => $request->id,
    'created_at' => date('Y-m-d H:i:s'),
    'comment' => 'Signature Upload'
);
            Traderlog::insertGetId($log);
        }
      
        return redirect()->back()->with('success','Signature Upload succesfully');

    }


    public function traderapproval($id){

        TraderApply::where("application_id",'=',$id)->update(['is_amc_approval'=>1]);
        return redirect('/amc/traderapplylist');

    }

    public function traderViewDetails($id){

       $traderview = TraderApply::where("application_id",'=',$id)->first();

       $Traderlog = Traderlog::where("application_id",'=',$traderview->id)->get();
       return view('amc.traderviewdetails', compact('traderview','Traderlog'));

    } 

    public function traderApproveSubmit(Request $request){

        $input = $request->all();
        $input['created_at'] = date('Y-m-d H:i:s');
        unset($input['_token']);

        $input['user_id'] = Auth::user()->id;
        $approvetrader = Traderlog::insertGetId($input);
        TraderApply::where("id",'=',$request->application_id)->update(['is_amc_approval'=>1]);
        if($approvetrader){
           return redirect('/amc/traderapplylist')->with('success','Trader Approved succesfully');
        }
  
 
     } 

     public function tradersignatureuploadsuccess(){

        $data = TraderApply::where("is_final_pay","=",1)->where("is_sign_upload","=",1)->orderBy('id', 'DESC')->get();
        return view('amc.tradersignatureuploadsuccess', compact('data'));

    }

    
}
