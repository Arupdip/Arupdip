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
		echo 'if';
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

	public function emailValidation(Request $request){
		
		$user = User::where('email',$request->email)->first();
				
		echo (empty($user))?'true':'false';
	}
	
	public function phoneValidation(Request $request)
	{
		$user = User::where('phone',$request->phone)->first();
				
		echo (empty($user))?'true':'false';
	}
	public function employeeIdValidation(Request $request)
	{
		$user = User::where('employee_id',$request->employee_id)->first();
				
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
		$userType = UserType::find($id);
		return view('admin.usertype.edit', compact('userType'));
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

		unset($input['_token']);
		unset($input['_method']);
		$input['updated_at'] = date('Y-m-d H:i:s');
		UserType::where('id','=',$id)->update($input);

		return redirect('/admin/usertype')->with("success","User role type is successfully updated !!");
	}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
	public function destroy($id)
	{
		$type = UserType::where('id',$id)->first();
		$type->status = 2;
		$type->update();



		return redirect('/admin/usertype')->with("success","User role type is successfully updated !!");
	}
}
