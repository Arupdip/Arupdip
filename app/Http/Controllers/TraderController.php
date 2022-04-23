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
use Auth;
use App\Models\CAApply;

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
        $randomid = Str::random(211);
        $input['user_temp_id'] = $randomid;
        // $input['updated_at'] = date('Y-m-d H:i:s');
        unset($input['_token']);

        if ($file = $request->file('aadhar_file')) {
            $input['aadhar_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $input['aadhar_file']);
        }

        if ($file = $request->file('pan_file')) {
            $input['pan_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $input['pan_file']);
        }

        if ($file = $request->file('firmpan_file')) {
            $input['firmpan_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $input['firmpan_file']);
        }

        if ($file = $request->file('gstin_file')) {
            $input['gstin_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $input['gstin_file']);
        }

        if ($file = $request->file('declarationofsolvency')) {
            $input['declarationofsolvency'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $input['declarationofsolvency']);
        }

        if ($file = $request->file('uploadedbankguaranteetype')) {
            $input['uploadedbankguaranteetype'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $input['uploadedbankguaranteetype']);
        }
        if ($file = $request->file('account_file')) {
            $input['account_file'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $input['account_file']);
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









    public function traderRegPaySuccess($id)
    {
        $tempData =  DB::table('temp_traderuser')->where("user_temp_id", "=", $id)->first();

        if (isset($tempData)) {

            $count = User::where("email", "=", $tempData->email)->count();

            if ($count == 0) {

                $password = '12345678';
                $userArr =  array(
                    "email" => $tempData->email,
                    "name" => $tempData->name,
                    "user_type" => 1,
                    "phone" => $tempData->mobile,
                    'password' => Hash::make($password),
                    'created_at' => date('Y-m-d H:i:s')
                );

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
