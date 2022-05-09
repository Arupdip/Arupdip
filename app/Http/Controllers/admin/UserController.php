<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\District;
use App\Models\User;
use Auth;

class UserController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
	public function index()
	{
		$user = User::where('user_type',3)->orWhere('user_type',4)->orWhere('user_type',5)->orWhere('user_type',null)->orderBy('name','ASC')->get();
		
		return view('admin.user.index',compact('user'));
	}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
	public function create()
	{
		return view('admin.user.create');
	}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/

	public function emailValidation(Request $request,$id=''){
		
		$user = User::where('email',$request->email)->first();
		if (!empty($id)) {
			$user = User::where('email',$request->email)->where('id','!=',$id)->first();
		}
				
		echo (empty($user))?'true':'false';
	}
	
	public function phoneValidation(Request $request, $id='')
	{
		$user = User::where('phone',$request->phone)->first();
		if (!empty($id)) {
			$user = User::where('phone',$request->phone)->where('id','!=',$id)->first();
		}
						
		echo (empty($user))?'true':'false';
	}
	
	public function employeeIdValidation(Request $request, $id='')
	{
		$user = User::where('employee_id',$request->employee_id)->first();
		if (!empty($id)) {
			$user = User::where('employee_id',$request->employee_id)->where('id','!=',$id)->first();
		}
				
		echo (empty($user))?'true':'false';
	}
	
	public function store(Request $request)
	{
		$input =  $request->all();
		
		$pass = $input['password'];
		
		unset($input['_token']);
		unset($input['password']);
		
		$input['password'] = Hash::make($pass);
		$input['created_at'] = date('Y-m-d H:i:s');
		$input['updated_at'] = date('Y-m-d H:i:s');
		
		User::insert($input);

		return redirect('/admin/user')->with("success","User is successfully created !!");
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
		$user = User::find($id);
		return view('admin.user.edit', compact('user'));
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
		$input =  $request->all();
		
		$pass = $input['password'];

		unset($input['_token']);
		unset($input['_method']);
		unset($input['password']);
		
		if (!empty($pass)) {
			$input['password'] = Hash::make($pass);
		}	
		
		$input['updated_at'] = date('Y-m-d H:i:s');
		User::where('id','=',$id)->update($input);

		return redirect('/admin/user')->with("success","User data successfully updated !!");
	}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
	public function destroy($id)
	{
		$user = User::where('id',$id)->first();
		
		$user->status = ($user->status == 1)?2:1;
		$user->update();

		return true; //redirect('/admin/user')->with("success","User ststus successfully updated !!");
	}
	
	
}
