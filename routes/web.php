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
/**notification*/
/**  notification **/
Route::get('/',function(){
   return view('auth.login');
});
Route::get('event', function () {
    return view("test");
});
/** clear groupe affectations */
Route::post("/groupes/flush","GroupeController@flush");
/* ---- Gestion Prel ----- */
    /*--- Promotions --- */
Route::get('configuration','FiliereController@setConfig');
Route::post('config/setFiliere','FiliereController@setFiliere');
Route::get('promotions','PromotionController@getPromos');
Route::post('promotions/ajoutPromo','PromotionController@ajoutPromo');
Route::post('promotions/suppPromo','PromotionController@suppPromo');
Route::post('promotions/editPromo','PromotionController@editPromo');
Route::get('promotions/api/getAll','PromotionController@getAll');
//Récupirer les infos d'une promotion données
Route::get('promotions/{id}','PromotionController@getGroupes');
   /** Groupes **/
Route::post('promotions/groupes/ajoutGroupe','GroupeController@import');
Route::post('promotions/groupes/suppGroupe','GroupeController@suppGroupe');
Route::post('promotions/groupes/editGroupe','GroupeController@editGroupe');
Route::get('promotions/groupes/liste/{idGroupe}','GroupeController@getStudents');
/** modules **/
Route::post('promotions/modules/ajoutModule','ModuleController@addModule');
Route::post('promotions/modules/suppModule','ModuleController@suppModule');
Route::post('promotions/modules/editModule','ModuleController@editModule');
Route::get('promotions/modules/attModule/{idModule}','ModuleController@attacherModule');
Route::post('valide/attachement','ModuleController@validerAttachement');

Route::get('getEnseignant','EnseignantController@getEnseignant');
Route::get('enseignant/createEnseignant','EnseignantController@createEnseignant');
Route::get('getInformationEnseignant/{id}','EnseignantController@getInfoEns');
Route::post('deleteEnseignant','EnseignantController@deleteEnseignant');
Route::post('enseignant/editEnseignant/{id}','EnseignantController@editEnseignant');
Route::post('/etudiants/edit','EtudiantController@editEtudiant');
Route::post('/etudiants/supp','EtudiantController@deleteEtudiant');
Route::post('/etudiants/add','EtudiantController@addEtudiant');
Route::post('/stat/getDataParWeak','PromotionController@getDataParWeak');

Route::post('/stat/getDataSoirMatin','PromotionController@getDataSoirMatin');

Route::get('repartieTache/{id}','AffectationController@attacherGroupe')->middleware('can:isCharge');
Route::get('repartieTache','AffectationController@getIndexAffect')->middleware('can:isCharge');
Route::post('repartieTache/valider','AffectationController@validerAffectation');
Route::post('enseignants/repartitionRole/validerRepartition','EnseignantController@validerRepartition');
Route::get('export/{grpId}','EtudiantController@export');
Route::get('exportListe/{grpId}','EtudiantController@export');


Auth::routes();

Route::group( ['middleware' => 'auth' ], function()
{
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('getEnseignant','EnseignantController@getEnseignant')->middleware('can:isAdmin');
    Route::get('promotions/{id}', 'PromotionController@getGroupes')->middleware('can:isAdmin');
    Route::get('getInformationEnseignant/{id}','EnseignantController@getInfoEns')->middleware('can:isAdmin');
    Route::get('promotions/modules/attModule/{idModule}','ModuleController@attacherModule');
    Route::get('promotions/groupes/liste/{idGroupe}','GroupeController@getStudents')->middleware('can:isAdmin');
    //Route::get('promotions/{id}','PromotionController@getGroupes');
    Route::get('promotions','PromotionController@getPromos')->middleware('can:isAdmin');
    Route::get('repartieTache/{id}','AffectationController@attacherGroupe')->middleware('can:isCharge');

    Route::get('enseignants/repartitionRole/{filiereId}','EnseignantController@repartirRoles')->middleware('can:isChef');

    Route::get('enseignant','EnseignantController@enseignantView')->middleware('can:isAdmin');
    Route::get('calendrier/{idEns}','AffectationController@affectationEnseignant')->middleware('can:isAss')->name("cal");
    Route::get('mesModules/{idEns}','ModuleController@modulesAssistant');
    Route::get('mesModulesCharge/{idEns}','ModuleController@modulesCharge')->middleware('can:isCharge');
    Route::get('exclusion/{idEns}','ModuleController@modulesExclusion')->middleware('can:isCharge');
    Route::get('exclusion/etudiants/{idMod}','ModuleController@getStudentsExclus')->middleware('can:isCharge');
    Route::get('mesModules/justifier/{idEns}','ModuleController@modulesAssistantJustifier')->middleware('can:isAss');
    Route::get('calendrier/getListe/{idSeance}/date/{date}','AbsenceController@getListeAbsence')->middleware('can:isAss');
    Route::get('mesModules/groupes/{idMod}/{ensId}','ModuleController@getGroupes')->middleware('can:isAss');
    Route::get('mesModulesCharge/groupes/{idMod}/{ensId}','ModuleController@getGroupesCharge')->middleware('can:isCharge');
    Route::get('mesModules/justifier/groupes/{idMod}/{ensId}','ModuleController@getGroupesJustifier')->middleware('can:isAss');
    Route::get('mesModules/groupes/{idMod}/{idAff}/{type}','ModuleController@getListeAbs')->middleware('can:isAss');

    Route::get('mesModulesCharge/groupes/{idMod}/{idGrp}/{type}','ModuleController@getListeAbsCharge');
    Route::get('mesModules/justifier/groupes/{idMod}/{idAff}/{type}','ModuleController@getListeAbsJustifier')->middleware('can:isAss');

    Route::get('anonymat','PaquetsController@getPromos');
    Route::get('exams/{id}','ExamsController@getExam');
    Route::post('exams/ajoutExam','ExamsController@ajoutExam');
    Route::post('exams/suppExam','ExamsController@suppExam');
    Route::post('exams/editExam','ExamsController@editExam');
    Route::get('enseignant/paquets/{examId}/{moduleId}','EnseignantController@getPaquets');
    Route::get('mesModulesCharge','ExamsController@modulesCharge');
    Route::get('mesModulesCharge/exam/{id}','ExamsController@getExamEns');
    Route::get('enseignant/paquets/getInformationEcart/{id}','EnseignantController@getInfoEcart');

    Route::get("affectations/{moduleId}","EnseignantController@affectGroupes");


    Route::get("affectations/{moduleId}","EnseignantController@affectGroupes");

    Route::get('modules/exam/{id}','noteController@getCopiesCorriger');
    Route::get("affectations",function(){
           return view('gprel.affect');
    });

    Route::get('note/{idPaquet}','noteController@getCopies');
    Route::post('note/valider/{id}','noteController@validerNote');
    Route::get('mesModules/corr/{idEns}','noteController@getPaquets');



});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Route::get('enseignants/repartitionRole/{filiereId}','EnseignantController@repartirRoles');
Route::get('calendrier/{idEns}','AffectationController@affectationEnseignant');
Route::post('/valideCalendar/valide','SeanceController@valideCalendar');
Route::post('calendrier/seances/mesSeances','SeanceController@getSeanceEns');
//Route::get('calendrier/getListe/{idSeance}','AbsenceController@getListeAbsence');
Route::post('calendrier/getListe/absences/valider','AbsenceController@validerAbsence');

Route::get('absences/getAbsEtudiant','AbsenceController@getAbsEtudiant');
Route::post('validJustificatif','AbsenceController@validJustificatif');


Route::get('exams/anonymat/{id}','PaquetsController@getPaquets');
Route::post('exams/anonymat/import/add','PaquetsController@import');
Route::post('exams/anonymat/paquets/suppPaquet','PaquetsController@suppPaquet');
Route::post('exams/anonymat/paquets/editPaquet','PaquetsController@editPaquet');
Route::get('anonymat/paquets/liste/{idPaquet}','PaquetsController@getCopies');
Route::post('exams/ajoutExam','ExamsController@ajoutExam');
Route::post('exams/suppExam','ExamsController@suppExam');
Route::post('exams/editExam','ExamsController@editExam');
Route::get('ens/paquets/liste/{idPaquet}','EnseignantController@getCopies');
Route::post('ens/paquets/liste/valide','EnseignantController@validerAff');
Route::post('enseignant/paquets/valide','EnseignantController@validerDelais');
Route::post('enseignant/paquets/update','EnseignantController@updateDelais');
Route::get('/validAffect','AffectationController@validAffect');
Route::get('/updateAffect','AffectationController@updateAffect');
Route::post('/notifs/lire','AffectationController@lireNotif');

