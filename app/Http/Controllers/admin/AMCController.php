<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\AMC;

class AMCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$amc = AMC::where('status',1)->get();
        return view('admin.amc.index', compact('amc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$district = District::orderBy('name','ASC')-> get();
        return view('admin.amc.create', compact('district'));
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
        $input['created_at'] = date('Y-m-d H:i:s');
        $input['updated_at'] = date('Y-m-d H:i:s');
		$input['status'] = 1;
        AMC::insert($input);
        
        return redirect('/admin/amc')->with("success","AMC is successfully created !!");
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
		$district = District::orderBy('name','ASC')-> get();
    	$amc = AMC::find($id);
        return view('admin.amc.edit', compact('amc', 'district'));
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
        
        AMC::where('id','=',$id)->update($input);
        return redirect('/admin/amc')->with("success","AMC is successfully updated !!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         AMC::where('id','=',$id)->update(['status'=>2]);
         return true;
    }
}
