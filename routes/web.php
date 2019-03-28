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
    //return response()->json(\App\Models\Territory::find('0100000000')->nested()->get());
    return view('welcome');
});

Route::resource('peoples', 'PeopleController');

Route::get('territory/{territory}', 'TerritoryController@show');
Route::get('territory/{territory}/nested', 'TerritoryController@nested');
