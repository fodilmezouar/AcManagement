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
    return view('welcome');
});
Route::get('promotions','PromotionController@getPromos');
Route::post('promotions/ajoutPromo','PromotionController@ajoutPromo');
Route::get('promotions/{id}',function($id){
  return view('gPrel.groupes')->with(['idPromo'=>$id]);
});
Route::get('test','GroupeController@import');

