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

Route::get('enseignant', function () {
    return view('gPrel.enseignant');
});
Route::get('promotions','PromotionController@getPromos');
Route::post('promotions/ajoutPromo','PromotionController@ajoutPromo');
Route::post('promotions/suppPromo','PromotionController@suppPromo');
Route::post('promotions/editPromo','PromotionController@editPromo');
Route::get('promotions/{id}','PromotionController@getGroupes');
Route::post('promotions/groupes/ajoutGroupe','GroupeController@import');
Route::post('promotions/groupes/suppGroupe','GroupeController@suppGroupe');
Route::post('promotions/groupes/editGroupe','GroupeController@editGroupe');
Route::get('promotions/groupes/liste/{idGroupe}','GroupeController@getStudents');

Route::get('getEnseignant','EnseignantController@getEnseignant');
Route::post('enseignant/createEnseignant','EnseignantController@createEnseignant');
Route::get('getInformationEnseignant/{id}','EnseignantController@getInfoEns');
Route::post('deleteEnseignant','EnseignantController@deleteEnseignant');
Route::post('enseignant/editEnseignant/{id}','EnseignantController@editEnseignant');

