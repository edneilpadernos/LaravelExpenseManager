<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpensesCategory;
use DB;
use Auth;
class ExpensesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleslevels= DB::select("select * from roles where id='".Auth::user()->role_level."'");
        
        $expensescategory = ExpensesCategory::all();
        return view('pages.expensesCategory')->with(['expensescategory'=>$expensescategory,'roleslevels'=>$roleslevels]);
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
        $excat = new ExpensesCategory;
        $excat->display_name=$request->input('addcatname');
        $excat->description=$request->input('addcatdesc');
        $excat->save();
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
        $excat = ExpensesCategory::find($request->input('id'));
        $excat->display_name=$request->input('excatnameupdate');
        $excat->description =$request->input('excatdescupdate');
        $excat->update();
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
        $excat = ExpensesCategory::find($request->input('id'));
        $excat->delete();
        return 'deleted';
    }
}
