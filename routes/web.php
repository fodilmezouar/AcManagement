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
Route::post('promotions/modules/ajoutModule','ModuleController@addModule');
Route::post('promotions/modules/suppModule','ModuleController@suppModule');
Route::post('promotions/modules/editModule','ModuleController@editModule');
Route::get('promotions/modules/attModule/{idModule}','ModuleController@attacherModule');
Route::post('promotions/modules/attModule/valide/yes','ModuleController@validerAttachement');

Route::get('getEnseignant','EnseignantController@getEnseignant');
Route::post('enseignant/createEnseignant','EnseignantController@createEnseignant');
Route::get('getInformationEnseignant/{id}','EnseignantController@getInfoEns');
Route::post('deleteEnseignant','EnseignantController@deleteEnseignant');
Route::post('enseignant/editEnseignant/{id}','EnseignantController@editEnseignant');

Route::get('test/{id}','AffectationController@attacherGroupe');
Route::post('test/valider','AffectationController@validerAffectation');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group( ['middleware' => 'auth' ], function()
{
    Route::get('promotions/{id}', 'PromotionController@getGroupes');
    Route::get('getInformationEnseignant/{id}','EnseignantController@getInfoEns');
    Route::get('promotions/modules/attModule/{idModule}','ModuleController@attacherModule');
    Route::get('promotions/{id}','PromotionController@getGroupes');
    Route::get('promotions','PromotionController@getPromos');
    Route::get('test/{id}','AffectationController@attacherGroupe');
    Route::get('enseignant', function () {
    return view('gPrel.enseignant');
    });
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
