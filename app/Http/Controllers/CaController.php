<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Tempuser;
use App\Models\State;
use App\Models\District;

class CaController extends Controller
{

    /**
     * To return view page for registration of commision agent.
     *
     * @return view
     */

    public function caRegister(){

        $states = State::all();

        return view('front/ca/ca-register',['states' => $states]);

    }
      /**
     * To return view page for registration of commision agent.
     *
     * @return view
     */

    public function dashboard(){


        return view('admin.dashboard');

    }
    /**
     * To return districts on behalf of state id.
     *
     * @return view
     */

    public function fetchDistricts(Request $request){


        $data['districts'] = District::where("state_id",$request->state_id)->get(["district_title", "districtid"]);
        return response()->json($data);

    }

    /**
     * To save details of commision agent in User model.
     *
     * @return view
     */

    public function saveCaDetails(Request $request){
        // dd($request->all());
        $user_type = "CA";
        $aadhar_no = $request->adhar_no;
        $full_name = $request->name_of_applicant;
        $age = $request->age;
        $password = Hash::make($request->password);
        $fathers_name = $request->fathersname;
        $date_of_birth = $request->dateofbirth;
        $isminor = $request->isminor;
        $address = $request->address;
        $mob_no = $request->mobno;
        $pan_no = $request->panno;
        $email = $request->email;
        $state = State::getStateName($request->state);
        $district = $request->district;
        $gstin = $request->gstin;
        $amcname = $request->amcname;
        $name_in_power_attorney = $request->nameinpowerattorney;
        $liscence_type = $request->liscencetype;
        $market_name = $request->marketname;

    try {

        $user = new Tempuser;
        $user->user_type = $user_type;
        $user->email = $email;
        $user->password = $password;
        $user->full_name = $full_name;
        $user->fathers_name = $fathers_name;
        $user->date_of_birth = $date_of_birth;
        $user->address = $address;
        $user->mob_no = $mob_no;
        $user->pan_no = $pan_no;
        $user->state = $state;
        $user->district = $district;
        $user->gst_no = $gstin;
        $user->liscence_type = $liscence_type;
        $user->amc_name = $amcname;
        $user->market_name = $market_name;
        $user->aadhar_no = $aadhar_no;
        $user->age = $age;
        $user->name_in_power_attorney = $name_in_power_attorney;

        if($user->save()){
            dd("success");
        }else{
            dd('not saved');
        }







    } catch (\Throwable $th) {
        throw $th;
    }


    
    }




}
