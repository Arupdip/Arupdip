<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Licensetype;

class LicensetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$licensetype  = Licensetype::get();
        return view('admin.licensetype.index', compact('licensetype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	
          return view('admin.licensetype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   dd($request->all);
        $input =  $request->all();
        unset($input['_token']);
        $input['created_at'] = date('Y-m-d H:i:s');
        $input['updated_at'] = date('Y-m-d H:i:s');
        Licensetype::insert($input);
        return redirect('/admin/licensetype')->with("success","Licensetype is successfully created !!");
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
    
    	$licensetype = Licensetype::find($id);
        return view('admin.licensetype.edit', compact('licensetype'));
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
        Licensetype::where('id','=',$id)->update($input);
        return redirect('/admin/licensetype')->with("success","Licensetype is successfully updated !!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Licensetype::where('id','=',$id)->delete();
         return true;
    }
}
