<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\State;
use App\Models\Mandal;
use App\Models\AMC;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\TraderApply;
use App\Models\Traderlog;
use Auth;
use App\Models\CAApply;
use Carbon\Carbon; 
use Mail;


class TraderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function traderRegister()
    {

     
        $states = State::all();
        $mandal = Mandal::all();
        $amc = AMC::all();
        return view('front/trader/trader-register', ['states' => $states, 'mandal' => $mandal, 'amc' => $amc]);
    }

    public function dashboard()
    {


        return view('front.trader.dashboard');
    }

    public function applicationlist()
    {
        $data = TraderApply::where("user_id", '=', Auth::user()->id)->get();

        return view('front.trader.applicationlist', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function resetTraderDetails(Request $request)
    {
        // dd($request->all());

        $returnArr = array("success" => false, "message" => "");

        $returnArr = array("success" => false, "message" => "");


        $checkaddhar = TraderApply::where("aadhar_no", "=", $request->aadhar_no)->where('application_id','!=',$request->id)->count();
        if ($checkaddhar != 0) {
            $returnArr['message'] = "Aadhar card is already existed !!";
            return $returnArr;
        }

   
        $checkpan = TraderApply::where("pan_no", "=", $request->pan_no)->where('application_id','!=',$request->id)->count();
        if ($checkpan != 0) {
            $returnArr['message'] = "Pan No is already existed !!";
            return $returnArr;
        }

        $checkpan = TraderApply::where("firmpanno", "=", $request->firmpanno)->where('application_id','!=',$request->id)->count();
        if ($checkpan != 0) {
            $returnArr['message'] = "Firm Pan No is already existed !!";
            return $returnArr;
        }

        $checkgistin = TraderApply::where("gstin", "=", $request->gstin)->where('application_id','!=',$request->id)->count();
        if ($checkgistin != 0) {
            $returnArr['message'] = "GSTIN No is already existed !!";
            return $returnArr;
        }
        $input = $request->all();
       
       
        // $input['updated_at'] = date('Y-m-d H:i:s');
        unset($input['_token']);
        unset($input['id']);
        if ($file = $request->file('aadhar_file')) {
            $input['aadhar_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['aadhar_file']);
        }else{
            unset($input['aadhar_file']);
        }

        if ($file = $request->file('pan_file')) {
            $input['pan_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['pan_file']);
        }else{
            unset($input['pan_file']);
        }

        if ($file = $request->file('firmpan_file')) {
            $input['firmpan_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['firmpan_file']);
        }else{
            unset($input['firmpan_file']);
        }

        if ($file = $request->file('gstin_file')) {
            $input['gstin_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['gstin_file']);
        }else{
            unset($input['gstin_file']);
        }

        if ($file = $request->file('declarationofsolvency')) {
            $input['declarationofsolvency'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['declarationofsolvency']);
        }else{
            unset($input['declarationofsolvency']);
        }

        if ($file = $request->file('uploadedbankguaranteetype')) {
            $input['uploadedbankguaranteetype'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['uploadedbankguaranteetype']);
        }else{
            unset($input['uploadedbankguaranteetype']);
        }
        if ($file = $request->file('account_file')) {
            $input['account_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['account_file']);
        }else{
            unset($input['account_file']);
        }


        $input['status'] = 3;
       

        TraderApply::where('application_id','=',$request->id)->update($input);
      $tt =   TraderApply::where('application_id','=',$request->id)->first();
        $input1['created_at'] = date('Y-m-d H:i:s');
        $input1['application_id'] = $tt->id;
        $input1['type'] = 4;
        $input1['comment'] = 'Recheck Submit';
        $input1['user_id'] = Auth::user()->id;
        $approvetrader = Traderlog::insertGetId($input1);
        $returnArr['success'] = true;
        $returnArr['message'] ='';
        return $returnArr;
    }



    
    public function saveTraderDetails(Request $request)
    {
        // dd($request->all());

        $returnArr = array("success" => false, "message" => "");

        $returnArr = array("success" => false, "message" => "");


        $checkaddhar = TraderApply::where("aadhar_no", "=", $request->aadhar_no)->count();
        if ($checkaddhar != 0) {
            $returnArr['message'] = "Aadhar card is already existed !!";
            return $returnArr;
        }

        $checkemail = User::where("email", "=", $request->email)->count();
        if ($checkemail != 0) {
            $returnArr['message'] = "Email Id is already existed !!";
            return $returnArr;
        }

        $checkmob = User::where("phone", "=", $request->mobile)->count();
        if ($checkmob != 0) {
            $returnArr['message'] = "Mobile is already existed !!";
            return $returnArr;
        }

        $checkpan = TraderApply::where("pan_no", "=", $request->pan_no)->count();
        if ($checkpan != 0) {
            $returnArr['message'] = "Pan No is already existed !!";
            return $returnArr;
        }

        $checkpan = TraderApply::where("pan_no", "=", $request->pan_no)->count();
        if ($checkpan != 0) {
            $returnArr['message'] = "Pan No is already existed !!";
            return $returnArr;
        }

        $checkgistin = TraderApply::where("gstin", "=", $request->gstin)->count();
        if ($checkgistin != 0) {
            $returnArr['message'] = "GSTIN No is already existed !!";
            return $returnArr;
        }
        $input = $request->all();
        $currentYear = date('Y'); // Current Year
        $birthYear = date('Y', strtotime(str_replace("/","-",$request->dob))); 
        $age = $currentYear - $birthYear;
      
        $input['age'] = $age;
        // dd($input['age']);
        $input['dob'] = strtotime(str_replace("-","/",$request->dob));
        $input['dob'] = date("Y-m-d", strtotime($input['dob']));   
        $randomid = Str::random(211);
        $input['user_temp_id'] = $randomid;
        // $input['updated_at'] = date('Y-m-d H:i:s');
        unset($input['_token']);

        if ($file = $request->file('aadhar_file')) {
            $input['aadhar_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['aadhar_file']);
        }

        if ($file = $request->file('pan_file')) {
            $input['pan_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['pan_file']);
        }

        if ($file = $request->file('firmpan_file')) {
            $input['firmpan_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['firmpan_file']);
        }

        if ($file = $request->file('gstin_file')) {
            $input['gstin_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['gstin_file']);
        }

        if ($file = $request->file('declarationofsolvency')) {
            $input['declarationofsolvency'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['declarationofsolvency']);
        }

        if ($file = $request->file('uploadedbankguaranteetype')) {
            $input['uploadedbankguaranteetype'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['uploadedbankguaranteetype']);
        }
        if ($file = $request->file('account_file')) {
            $input['account_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['account_file']);
        }


        DB::table('temp_traderuser')->insertGetId($input);

        $returnArr['success'] = true;
        $returnArr['message'] = $randomid;
        return $returnArr;
    }

    public function traderpayment($id)
    {

        return view("front.trader.trader-payment", compact("id"));
    }

    public function traderpaymentrenew($id)
    {

        return view("front.trader.trader-payment-renew", compact("id"));
    }



    public function renewTraderDetails(Request $request)
    {
        // dd($request->all());

        $returnArr = array("success" => false, "message" => "");

        $returnArr = array("success" => false, "message" => "");


        
       $oldTrader = TraderApply::where('application_id','=', $request->old_application_id)->first();
        $input = $request->all();
        $currentYear = date('Y'); // Current Year
        $birthYear = date('Y', strtotime(str_replace("/","-",$request->dob))); 
        $age = $currentYear - $birthYear;
      
        $input['age'] = $age;
        // dd($input['age']);
        $input['dob'] = strtotime(str_replace("-","/",$request->dob));
        $input['dob'] = date("Y-m-d", strtotime($input['dob']));   
        $randomid = Str::random(211);
        $input['user_temp_id'] = $randomid;
        // $input['updated_at'] = date('Y-m-d H:i:s');
        unset($input['_token']);

        if ($file = $request->file('aadhar_file')) {
            $input['aadhar_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['aadhar_file']);
        }
        else{
            $input['aadhar_file']  = $oldTrader->aadhar_file;
        }

        if ($file = $request->file('pan_file')) {
            $input['pan_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['pan_file']);
        }else{
            $input['pan_file']  = $oldTrader->pan_file;
        }

        if ($file = $request->file('firmpan_file')) {
            $input['firmpan_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['firmpan_file']);
        }else{
            $input['firmpan_file']  = $oldTrader->firmpan_file;
        }

        if ($file = $request->file('gstin_file')) {
            $input['gstin_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['gstin_file']);
        }else{
            $input['gstin_file']  = $oldTrader->gstin_file;
        }

        if ($file = $request->file('declarationofsolvency')) {
            $input['declarationofsolvency'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['declarationofsolvency']);
        }else{
            $input['declarationofsolvency']  = $oldTrader->declarationofsolvency;
        }

        if ($file = $request->file('uploadedbankguaranteetype')) {
            $input['uploadedbankguaranteetype'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['uploadedbankguaranteetype']);
        }else{
            $input['uploadedbankguaranteetype']  = $oldTrader->uploadedbankguaranteetype;
        }
        if ($file = $request->file('account_file')) {
            $input['account_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $input['account_file']);
        }else{
            $input['account_file']  = $oldTrader->account_file;
        }


        DB::table('temp_traderuser')->insertGetId($input);

        $returnArr['success'] = true;
        $returnArr['message'] = $randomid;
        return $returnArr;
    }




    public function traderRegPaySuccessrenew($id)
    {
        $tempData =  DB::table('temp_traderuser')->where("user_temp_id", "=", $id)->first();

        if (isset($tempData)) {

           
            $result = [];
            foreach ($tempData as $key => $value) {
                $result[$key] =  $value;
              
            }

            TraderApply::where('application_id','=',$result['old_application_id'])->update(['is_renew_apply'=>1]);
            unset($result['old_application_id']);
            $result['user_id'] = Auth::user()->id;

            $result['is_submit'] = 1;
            $result['is_reg_pay'] = 1;
            $result['application_id']  = Str::random(211);
            unset($result['id']);
            TraderApply::insert($result);
            return redirect("/trader/approval-status/" . $result['application_id']);
        }
    }




    public function traderRegPaySuccess($id)
    {
        $tempData =  DB::table('temp_traderuser')->where("user_temp_id", "=", $id)->first();

        if (isset($tempData)) {

            $count = User::where("email", "=", $tempData->email)->count();

            if ($count == 0) {

                $password = rand(100000, 999999);
                $userArr =  array(
                    "email" => $tempData->email,
                    "name" => $tempData->name,
                    "user_type" => 1,
                    "phone" => $tempData->mobile,
                    'password' => Hash::make($password),
                    'created_at' => date('Y-m-d H:i:s')
                );

                $data=array('password'=>$password , 'username' =>$tempData->email );
                Mail::send('email.index', $data, function($message) use ($data) {
                $message->to($data['username'])
                ->subject('Trader Registration Successfully');
              });


                $user_id = User::insertGetId($userArr);


            } else {
                $user = User::where("email", "=", $tempData->email)->first();
                $user_id = $user->id;
            }

            $result = [];
            foreach ($tempData as $key => $value) {
                $result[$key] =  $value;
            }

            $result['user_id'] = $user_id;
unset($result['old_application_id']);
            $result['is_submit'] = 1;
            $result['is_reg_pay'] = 1;
            $result['application_id']  = Str::random(211);
            unset($result['id']);
            TraderApply::insert($result);
            Auth::loginUsingId($user_id);

         



            return redirect("/trader/approval-status/" . $result['application_id']);
        }
    }

    public function approvalstatus($id)
    {

        $data = TraderApply::where("application_id", '=', $id)->get();
        return view("front.trader.approval-status", compact('data'));
    }


    public function renew($id)
    {

  $TraderApply = TraderApply::where("application_id", '=', $id)->first();
$states = State::all();
$mandal = Mandal::all();
$amc = AMC::all();

return view('front/trader/renew', compact('states' , 'mandal', 'amc' , 'TraderApply','id'));

    }




    public function recheck($id)
    {

        $data = TraderApply::where("application_id", '=', $id)->get();
if($data[0]->status ==2)
     $traderold = Traderlog::where("application_id",'=',$data[0]->id)->where("type",'=',3)->orderBy('id', 'desc')->first();
else
return redirect()->back();

$states = State::all();
$mandal = Mandal::all();
$amc = AMC::all();
return view('front/trader/recheck', compact('states' , 'mandal', 'amc' , 'data', 'traderold','id'));



        return view("front.trader.recheck", compact('data'));
    }


    //trader final payment 
    public function traderFinalPay($id)
    {

        return view("front.trader.trader-final-payment", compact("id"));
    }


    //trader final payment done
    public function traderFinalPaySuccess($id)
    {
        $data = TraderApply::where("application_id", '=', $id)->get();

        if ($data->count() > 0) {
            TraderApply::where("application_id", '=', $id)->update(['is_final_pay' => 1]);

            return redirect()->to('trader/approval-status/'.$id);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
