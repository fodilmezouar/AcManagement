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
Route::post('valide/attachement','ModuleController@validerAttachement');

Route::get('getEnseignant','EnseignantController@getEnseignant');
Route::post('enseignant/createEnseignant','EnseignantController@createEnseignant');
Route::get('getInformationEnseignant/{id}','EnseignantController@getInfoEns');
Route::post('deleteEnseignant','EnseignantController@deleteEnseignant');
Route::post('enseignant/editEnseignant/{id}','EnseignantController@editEnseignant');

Route::get('repartieTache/{id}','AffectationController@attacherGroupe');
Route::get('repartieTache','AffectationController@getIndexAffect');
Route::post('test/valider','AffectationController@validerAffectation');
Route::post('enseignants/repartitionRole/validerRepartition','EnseignantController@validerRepartition');

Auth::routes();

Route::group( ['middleware' => 'auth' ], function()
{
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('getEnseignant','EnseignantController@getEnseignant');
    Route::get('promotions/{id}', 'PromotionController@getGroupes');
    Route::get('getInformationEnseignant/{id}','EnseignantController@getInfoEns');
    Route::get('promotions/modules/attModule/{idModule}','ModuleController@attacherModule');
    Route::get('promotions/{id}','PromotionController@getGroupes');
    Route::get('promotions','PromotionController@getPromos');
    Route::get('repartieTache/{id}','AffectationController@attacherGroupe');

    Route::get('enseignants/repartitionRole/{filiereId}','EnseignantController@repartirRoles'); 

    Route::get('enseignant','EnseignantController@enseignantView');
    Route::get('calendrier/{idEns}','AffectationController@affectationEnseignant');
    Route::get('mesModules/{idEns}','ModuleController@modulesAssistant');
    Route::get('mesModulesCharge/{idEns}','ModuleController@modulesCharge');
    Route::get('mesModules/justifier/{idEns}','ModuleController@modulesAssistantJustifier');
    Route::get('calendrier/getListe/{idSeance}','AbsenceController@getListeAbsence');
    Route::get('mesModules/groupes/{idMod}/{ensId}','ModuleController@getGroupes');
    Route::get('mesModulesCharge/groupes/{idMod}/{ensId}','ModuleController@getGroupesCharge');
    Route::get('mesModules/justifier/groupes/{idMod}/{ensId}','ModuleController@getGroupesJustifier');
    Route::get('mesModules/groupes/{idMod}/{idAff}/{type}','ModuleController@getListeAbs');
    Route::get('mesModulesCharge/groupes/{idMod}/{idGrp}/{type}','ModuleController@getListeAbsCharge');
    Route::get('mesModules/justifier/groupes/{idMod}/{idAff}/{type}','ModuleController@getListeAbsJustifier');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('enseignants/repartitionRole/{filiereId}','EnseignantController@repartirRoles');
    Route::get('calendrier/{idEns}','AffectationController@affectationEnseignant');
Route::post('calendrier/valideCalendar/valide','SeanceController@valideCalendar');
Route::post('calendrier/seances/mesSeances','SeanceController@getSeanceEns');
//Route::get('calendrier/getListe/{idSeance}','AbsenceController@getListeAbsence');
Route::post('calendrier/getListe/absences/valider','AbsenceController@validerAbsence');
Route::get('absences/getAbsEtudiant','AbsenceController@getAbsEtudiant');
Route::post('validJustificatif','AbsenceController@validJustificatif');