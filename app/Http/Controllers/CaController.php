<?php

namespace App\Http\Controllers;

use App\Models\CAApply;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Tempuser;
use App\Models\State;
use App\Models\District;
use App\Models\Licensetype;
use App\Models\AMC;
use DB;
use Auth;

class CaController extends Controller
{

    /**
     * To return view page for registration of commision agent.
     *
     * @return view
     */

    public function caRegister()
    {

        $states = State::all();
        $liscencetype = Licensetype::all();
        $amc = AMC::all();

        return view('front/ca/ca-register', compact('states', 'liscencetype', 'amc'));
    }

    public function applicationlist()
    {
        $data = CAApply::where("user_id", '=', Auth::user()->id)->get();

        return view('front.ca.applicationlist',compact('data'));
    }



    /**
     * To return view page for registration of commision agent.
     *
     * @return view
     */

    public function dashboard()
    {


        return view('front.ca.dashboard');
    }
    /**
     * To return districts on behalf of state id.
     *
     * @return view
     */

    public function fetchDistricts(Request $request)
    {
        $data['districts'] = District::where("state_id", $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    /**
     * To save details of commision agent in User model.
     *
     * @return view
     */

    public function saveCaDetails(Request $request)
    {

        $returnArr = array("success" => false, "message" => "", "id"=>"");


        $checkaddhar = CAApply::where("aadhar_no", "=", $request->aadhar_no)->count();
        if ($checkaddhar != 0) {
            $returnArr['message'] = "Aadhar card is already existed !!";
            $returnArr['id'] = "aadhar_no";
            return $returnArr;
        }

        $checkemail = User::where("email", "=", $request->email)->count();
        if ($checkemail != 0) {
            $returnArr['message'] = "Email Id is already existed !!";
            $returnArr['id'] = "aadhar_no";
            return $returnArr;
        }

        $checkmob = User::where("phone", "=", $request->mobile)->count();
        if ($checkmob != 0) {
            $returnArr['message'] = "Mobile is already existed !!";
            $returnArr['id'] = "aadhar_no";
            return $returnArr;
        }

        $checkpan = CAApply::where("pan_no", "=", $request->pan_no)->count();
        if ($checkpan != 0) {
            $returnArr['message'] = "Pan No is already existed !!";
            $returnArr['id'] = "aadhar_no";
            return $returnArr;
        }

        $checkpan = CAApply::where("pan_no", "=", $request->pan_no)->count();
        if ($checkpan != 0) {
            $returnArr['message'] = "Pan No is already existed !!";
            $returnArr['id'] = "pan_no";
            return $returnArr;
        }

        $checkgistin = CAApply::where("gstin", "=", $request->gstin)->count();
        if ($checkgistin != 0) {
            $returnArr['message'] = "GSTIN No is already existed !!";
            $returnArr['id'] = "gstin";
            return $returnArr;
        }


        $input = $request->all();
        $randomid = Str::random(211);
        $input['user_temp_id'] = $randomid;
        $input['updated_at'] = date('Y-m-d H:i:s');
        unset($input['_token']);
        if ($file = $request->file('familymemberholdcafile')) {
            $input['familymemberholdcafile'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $input['familymemberholdcafile']);
        }

        if ($file = $request->file('upladedotherfirmfile')) {
            $input['upladedotherfirmfile'] = rand(999999, 9999999999) . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $input['upladedotherfirmfile']);
        }


        DB::table('temp_causer')->insertGetId($input);

        $returnArr['success'] = true;
        $returnArr['message'] = $randomid;
        return $returnArr;
    }


    public function capayment($id)
    {

        return view("front.ca.ca-payment", compact("id"));
    }



    public function caRegPaySuccess($id)
    {
        $tempData =  DB::table('temp_causer')->where("user_temp_id", "=", $id)->first();

        if (isset($tempData)) {

            $count = User::where("email", "=", $tempData->email)->count();

            if ($count == 0) {

                $password = '12345678';
                $userArr =  array(
                    "email" => $tempData->email,
                    "name" => $tempData->name,
                    "user_type" => 2,
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
            CAApply::insert($result);
            Auth::loginUsingId($user_id);
            return redirect("/ca/approval-status/" . $result['application_id']);
        }
    }

    public function approvalstatus($id)
    {
        $data = CAApply::where("application_id", '=', $id)->get();
        return view("front.ca.approval-status", compact('data'));
    }
}
