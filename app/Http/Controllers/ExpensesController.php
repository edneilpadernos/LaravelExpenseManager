<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenses;
use App\ExpensesCategory;
use DB;
use Auth;
class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ExpensesCategory::all();
        $roleslevels= DB::select("select * from roles where id='".Auth::user()->role_level."'");
        $expenses= DB::select("select expenses.expense_category_id,expense_categories.display_name,expenses.id,amount,entry_date,expenses.created_at from expenses,expense_categories where expenses.user_id='".Auth::user()->id."' and expense_categories.id=expenses.expense_category_id");
        return view('pages.expenses')->with(['roleslevels'=>$roleslevels,'expenses'=>$expenses,'categories'=>$categories]);
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
        $expenses= new Expenses;
        $expenses->amount=$request->input('expenseamount');
        $expenses->entry_date=$request->input('expensedate');
        $expenses->user_id=Auth::user()->id;
        $expenses->expense_category_id=$request->input('selectedcategoryexpense');
        $expenses->save();
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
        $expenses= Expenses::find($request->input('id'));
        $expenses->amount=$request->input('expenseamountupdate');
        $expenses->entry_date=$request->input('expensedateupdate');
        $expenses->expense_category_id=$request->input('selectedcategoryexpenseupdate');
        $expenses->update();
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
        $expenses = Expenses::find($request->input('id'));
        $expenses->delete();
        return 'deleted';
    }

   
}
