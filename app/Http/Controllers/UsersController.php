<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use App\Users;
use DB;
use Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $roles = Roles::all();
        $roleslevels= DB::select("select * from roles where id='".Auth::user()->role_level."'");
        $users = DB::select('select users.id,name,email,display_name,role_level,users.created_at from users,roles where users.role_level=roles.id');
        return view('pages.users')->with(['roleslevels'=>$roleslevels,'roles'=>$roles, 'users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $users= new Users;
       $users->name=$request->input('username');
       $users->email=$request->input('useremail');
       $users->password=bcrypt($request->input('userpassword'));
       $users->role_level=$request->input('userselectedrole');
       $users->save();
       return 'saved';
       
      
       
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
    public function update(Request $request)
    {
        $users= Users::find($request->input('id'));
        $users->name=$request->input('updateusername');
        $users->email=$request->input('updateemail');
        $users->role_level=$request->input('selecteduserRoleupdate');
        $users->update();
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
        $users= Users::find($request->input('id'));
        DB::table('expenses')->where('user_id', $request->input('id'))->delete();
        $users->delete();
        return 'deleted';
    }
}
