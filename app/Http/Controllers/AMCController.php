<?php

namespace App\Http\Controllers;

use App\Models\CAApply;
use App\Models\TraderApply;
use App\Models\Traderlog;
use App\Models\Calog;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Tempuser;
use App\Models\State;
use App\Models\Licensetype;
use App\Models\District;
use DB;
use Auth;
use Mail;
use PDF;

class AMCController extends Controller
{


    public function dashboard()
    {
        return view('amc.dashboard');
    }


    public function caapplylist()
    {

        $data = CAApply::where("is_reg_pay", "=", 1)->get();
        return view('amc.caapplylist', compact('data'));
    }
    public function caapproval($id)
    {

        CAApply::where("application_id", '=', $id)->update(['is_amc_approval' => 1]);
        return redirect('/amc/caapplylist');
    }


    public function traderapplylist()
    {

        $data = TraderApply::where("is_reg_pay", "=", 1)->get();
        return view('amc.traderapplylist', compact('data'));
    }

    public function tradersignatureupload()
    {

        $data = TraderApply::where("is_final_pay", "=", 1)->where("is_sign_upload", "!=", 1)->orderBy('id', 'DESC')->get();
        return view('amc.tradersignatureupload', compact('data'));
    }


    public function uploadtraderesign(Request $request)
    {
        $input = array();

        $Licensetype = Licensetype::find(1);
        $expiryyear = date('Y-m-d', strtotime(' + '.$Licensetype->validity.' years'));
        $input['expiry_date'] = $expiryyear;

        $input['is_sign_upload'] = 1;
        // $input['is_pdf_generate'] = 1;
        if ($file = $request->file('upload_signature')) {
            $input['signature_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['signature_file']);

        if( $request->file('upload_image')){
            $input['image'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $request->file('upload_image')->move(public_path('uploads'), $input['image']);
            }

            $input['liscence_no'] = rand(10000000000,99999999999);
            $input['issue_date'] = date('Y-m-d');
            $data = TraderApply::where("id", "=", $request->id)->update($input);

            $body =  TraderApply::where("id", "=", $request->id)->first();

            // $pdf = PDF::loadview('email.pdf', compact('body'));

            //   $body->email = "ydvipin99@gmail"
            // Mail::send('email.license', ['body' => $body], function($m) use ($body) {

            //     $m->to($body->email,$body->name)->subject('License Generate');
            //      $pdf = PDF::loadview('email.pdf', compact('body'));
            //      $m->attachData($pdf->output(), 'license,pdf');

            // } );


            $log = array(

                'user_id' => Auth::user()->id,
                'application_id' => $request->id,
                'created_at' => date('Y-m-d H:i:s'),
                'comment' => 'Signature Upload'
            );
            Traderlog::insertGetId($log);
        }

        return redirect()->back()->with('success', 'Signature & Image Upload succesfully');
    }


    public function traderapproval($id)
    {

        TraderApply::where("application_id", '=', $id)->update(['is_amc_approval' => 1]);
        return redirect('/amc/traderapplylist');
    }

    public function traderViewDetails($id)
    {

        $traderview = TraderApply::where("application_id", '=', $id)->first();

        $Traderlog = Traderlog::where("application_id", '=', $traderview->id)->get();
        return view('amc.traderviewdetails', compact('traderview', 'Traderlog'));
    }

    public function traderApproveSubmit(Request $request)
    {

        $input = $request->all();
        $input['created_at'] = date('Y-m-d H:i:s');
        unset($input['_token']);

        $input['user_id'] = Auth::user()->id;
        $approvetrader = Traderlog::insertGetId($input);

        $cn = Traderlog::where('type','=',2)->count();
        if($cn == 0)
        TraderApply::where("id", '=', $request->application_id)->update(['status' => 1 , 'is_amc_approval'=>1]);
        else
        TraderApply::where("id", '=', $request->application_id)->update(['status' => 5 , 'is_amc_approval'=>1]);
        if ($approvetrader) {
            return redirect('/amc/traderapplylist')->with('success', 'Trader Approved succesfully');
        }
    }

    public function tradersignatureuploadsuccess()
    {

        $data = TraderApply::where("is_final_pay", "=", 1)->where("is_sign_upload", "=", 1)->orderBy('id', 'DESC')->get();
        return view('amc.tradersignatureuploadsuccess', compact('data'));
    }



    public function caViewDetails($id)
    {

        $cadata = CAApply::with('partners')->where("application_id", '=', $id)->first();
        $calog = Calog::where("application_id", '=', $cadata->id)->get();
        return view('amc.caviewdetails', compact('cadata', 'calog'));
    }


    public function caApproveSubmit(Request $request)
    {

        $input = $request->all();
        $input['created_at'] = date('Y-m-d H:i:s');
        unset($input['_token']);

        $input['user_id'] = Auth::user()->id;
        $approveca = Calog::insertGetId($input);
        $cn = Calog::where('type','=',2)->count();
        if($cn == 0)
        CAApply::where("id", '=', $request->application_id)->update(['status' => 1 , 'is_amc_approval'=>1]);
        else
        CAApply::where("id", '=', $request->application_id)->update(['status' => 5 , 'is_amc_approval'=>1]);
        if ($approveca) {
            return redirect('/amc/caapplylist')->with('success', 'CA Approved succesfully');
        }
    }


    public function casignatureupload()
    {

        $data = CAApply::where("is_final_pay", "=", 1)->where("is_sign_upload", "!=", 1)->orderBy('id', 'DESC')->get();
        return view('amc.casignatureupload', compact('data'));
    }


    public function uploadcasign(Request $request)
    {
        $input = array();

        $Licensetype = Licensetype::find(2);
        $expiryyear = date('Y-m-d', strtotime(' + '.$Licensetype->validity.' years'));
        $input['expiry_date'] = $expiryyear;

        
        $input['is_sign_upload'] = 1;
       // $input['is_pdf_generate'] = 1;
        if ($file = $request->file('upload_signature')) {
            $input['signature_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['signature_file']);

        if( $request->file('upload_image')){
        $input['image'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
        $request->file('upload_image')->move(public_path('uploads'), $input['image']);
        }
           

            $input['liscence_no'] = rand(10000000000,99999999999);
            $input['issue_date'] = date('Y-m-d');
            $data = CAApply::where("id", "=", $request->id)->update($input);
            $body =  CAApply::where("id", "=", $request->id)->first();
            // Mail::send('email.license', ['body' => $body], function($m) use ($body) {

            //      $m->to($body->email,$body->name)->subject('License Generate');
            //      $pdf = PDF::loadview('email.capdf', compact('body'));
            //      $m->attachData($pdf->output(), 'license,pdf');

            // } );
            $log = array(

                'user_id' => Auth::user()->id,
                'application_id' => $request->id,
                'created_at' => date('Y-m-d H:i:s'),
                'comment' => 'Signature & Image Upload'
            );
            
            Calog::insertGetId($log);
        }


        return redirect()->back()->with('success', 'Signature Uploaded succesfully');
    }


    public function casignatureuploadsuccess()
    {

        $data = CAApply::where("is_final_pay", "=", 1)->where("is_sign_upload", "=", 1)->orderBy('id', 'DESC')->get();
        return view('amc.casignatureuploadsuccess', compact('data'));
    }


     public function liscenceexpirynotification(){
      
        $liscenceexpiry5days =  date('Y-m-d', strtotime('+ 5 days'));
        $ca5days = CAApply::where('expiry_date','=',$liscenceexpiry5days)->get();
        $trader5days = TraderApply::where('expiry_date','=',$liscenceexpiry5days)->get();
        $notification5days  = $trader5days->merge($ca5days);

        foreach($notification5days as $row){



        }


        $liscenceexpiry10days =  date('Y-m-d', strtotime('+ 10 days'));
        $ca10days = CAApply::where('expiry_date','=',$liscenceexpiry10days)->get();
        $trader10days = TraderApply::where('expiry_date','=',$liscenceexpiry10days)->get();
        $notification10days  = $trader10days->merge($ca10days);

        foreach($notification10days as $row){



        }



        $liscenceexpiry30days =  date('Y-m-d', strtotime('+ 30 days'));
        $ca30days = CAApply::where('expiry_date','=',$liscenceexpiry30days)->get();
        $trader30days = TraderApply::where('expiry_date','=',$liscenceexpiry30days)->get();
        $notification30days  = $trader30days->merge($ca30days);

        foreach($notification30days as $row){



        }



     }


}
