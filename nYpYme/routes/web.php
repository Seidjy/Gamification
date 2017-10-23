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

Route::get('/', function () {
    return view('home');
});
Route::resource('deal','DealsController');

Route::resource('goals','GoalsController');

Route::resource('achieve','RulesToAchievesController');

Route::resource('awards','RulesToAwardsController');

Route::resource('restricts','RulesToRestrictsController');

Route::resource('customers','CustomerController');

