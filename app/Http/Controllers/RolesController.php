<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use DB;
use Auth;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $roleslevels= DB::select("select * from roles where id='".Auth::user()->role_level."'");
        
        $roles = Roles::all();
        return view('pages.roles')->with(['roles'=>$roles,'roleslevels'=>$roleslevels]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roles= new Roles;

        $roles->display_name=$request->input('add_role_name');
        $roles->description=$request->input('add_role_desc');
        $roles->save();
        return 'saved';
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $roles= Roles::find($request->input('id'));
        $roles->display_name=$request->input('updatename');
        $roles->description=$request->input('updatedesc');
        $roles->save();
        return 'saved';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $roles= Roles::find($request->input('id'));
        $roles->delete();
        return 'deleted';
    }
}
