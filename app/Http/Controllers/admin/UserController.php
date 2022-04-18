<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
      $users = User::orderBy('name','ASC')->get();
      return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.usertype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input =  $request->all();
        
		unset($input['_token']);
        $input['status'] = 1;
        $input['created_at'] = date('Y-m-d H:i:s');
        $input['updated_at'] = date('Y-m-d H:i:s');
		UserType::insert($input);
        
		return redirect('/admin/usertype')->with("success","User role type is successfully created !!");
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
