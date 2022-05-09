<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AMC;
use App\Models\User;
use App\Models\UserRoll;
use Auth;

class RollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = User::where('user_type',3)->orWhere('user_type',4)->orWhere('user_type',5)->orWhere('user_type',null)->orderBy('name','ASC')->get();

		return view('admin.rolls.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if (empty($request->amc)) {
			return redirect('/admin/rolls/'.$request->user_id.'/edit')->with("error","Please select AMC !!");
		}
        	
		$roll=array(
			'user_id'=>$request->user_id,
			'user_type'=>$request->user_type,
			'amc_list'=>serialize($request->amc),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'status' => 1,
		);		
		
		UserRoll::insert($roll);
		
		USer::where('id','=',$request->user_id)->update(['amc_list'=>serialize($request->amc),'user_type'=>$request->user_type]);
        
		return redirect('/admin/rolls')->with("success","User roll is successfully created !!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$user = User::find($id);
		$amc = AMC::where('status','=',1)->get();
		return view('admin.rolls.create', compact('user','amc'));
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		
    }
}
