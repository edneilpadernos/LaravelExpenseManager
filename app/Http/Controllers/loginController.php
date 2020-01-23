<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Roles;
use DB;
class loginController extends Controller
{
    public function showlogin(){
        return view('login');
    }


    public function dashboard(){
        $cols =array();
        $totals=array();
        $subtotal=0;
        $summary=DB::select("select * from expense_categories");
        foreach($summary as $summ){
            $subtotal=0;
            array_push($cols,$summ->display_name);
            $expense = DB::select("select * from expenses where expense_category_id='".$summ->id."' and expenses.user_id='".Auth::user()->id."'");
            foreach ($expense as $expcat) {
                $subtotal=$subtotal+$expcat->amount;
            }
            array_push($totals,$subtotal);
        }
        for($x=0; $x<count($cols); $x++){
            $cols[$x]=$cols[$x]." ".$totals[$x];
        }
        $roleslevels= DB::select("select * from roles where id='".Auth::user()->role_level."'");
        
        return view('pages.dashboardmain')->with(['roleslevels'=>$roleslevels,'cols'=>$cols]);
    }
    public function dologin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password' => 'required|alphaNum'
        ]);

        $user_data = array(
            'email'  => $request->input('email'),
            'password' => $request->input('password')
        );
        if(Auth::attempt($user_data))
        {
        
        return redirect('dashboard');
        }
        else
        {
        return back()->with('error', 'Wrong Login Details');
        }
    }

    public function logout()
    {
     Auth::logout();
     return redirect('/');
    }
}
