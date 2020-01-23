<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'loginController@showlogin');
Route::post('/login','loginController@dologin');
Route::get('/dashboard','loginController@dashboard');
Route::get('/logout','loginController@logout');

Route::get('/roles','RolesController@index');

Route::get('/users','UsersController@index');

Route::get('/expensescategory','ExpensesCategoryController@index');

Route::get('/expenses','ExpensesController@index');

Route::get('/addrole','RolesController@store');

Route::get('/updaterole','RolesController@update');

Route::get('/deleterole','RolesController@destroy');

Route::get('/adduser','UsersController@store');

Route::get('/updateuser','UsersController@update');

Route::get('/deleteuser','UsersController@destroy');

Route::get('/addcategory','ExpensesCategoryController@store');

Route::get('/updatecategory','ExpensesCategoryController@update');

Route::get('/deletecategory','ExpensesCategoryController@destroy');

Route::get('/addexpenses','ExpensesController@store');

Route::get('/updateExpenses','ExpensesController@update');

Route::get('/deleteExpense','ExpensesController@destroy');

