<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Module;
use App\User;
use App\Promotion;
use App\Affectation;
use App\Etudiant;
use App\Seance;
use App\Instance;
use App\Groupe;
use App\Notification;
use Auth;
class ModuleController extends Controller
{
    public function addModule(Request $request) 
    {
    	$module = new Module();
        $module->libelle = $request->input('libelle');
        $module->promotion_id = $request->input('promoId');
        $module->save();
        $fragment = "<div class='col-sm-3 col-xxxl-3 blockModule' role='".$module->id."'>
                         <div>
                            <button aria-label='Close' class='close suppModule' type='button' data-target='#suppModuleModal' data-toggle='modal' role='".$module->id."'><i class='os-icon os-icon-ui-15'></i></button>
                            <button aria-label='Close' class='close editModule' type='button' data-target='#editModuleModal' data-toggle='modal' role='".$module->id."'><i class='os-icon os-icon-ui-49'></i></button>
                            <button aria-label='Close' class='close attModule' type='button' data-target='#attModuleModal' data-toggle='modal' role='".$module->id."'><i class='icon-feather-arrow-up-right'></i></button>
                          </div>
                          <a class='element-box el-tablo' href='#' style='background-color: #f2f4f8;'>
                            <div class='value' id='libelleModule'>
                              ".$module->libelle."
                            </div>
                            <div class='trending trending-down-basic'>
                                <span style='color:red;'>non affecté</span>
                            </div>
                          </a>
                        </div>";

         $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = $fragment;
        return response()->json($valid);
    }
    public function suppModule(Request $request){
       $moduleId = $request->input('moduleId');
       $affects = Affectation::where('module_id','=',$moduleId)->get();
       foreach ($affects as $aff) {
         Seance::where('affectation_id','=',$aff->id)->delete();
         $aff->delete();
       }
       Module::find($moduleId)->delete();
       $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = "yes babe";
        return response()->json($valid);
    }
    public function attacherModule($id){
    	$moduleName = Module::find($id)->libelle;
      $promo = Promotion::find(Module::find($id)->promotion_id);
      $enseignants = User::where('grade','!=',NULL)->where('filliere_id','=',$promo->filiere_id)->where('role','like','%2%')->get();
      $notifications = Notification::where("id_receiver","=",Auth::id())->orderBy('id','DESC')->get();
        $cpt = 0;
           foreach($notifications as $notif){
             if($notif->est_lit == 0){
               $cpt++;
             }
           }
      return view('gPrel.attachement')->with(['notifications'=>$notifications,'cpt'=>$cpt,'enseignants'=>$enseignants,'idModule'=>$id,'moduleName'=>$moduleName,'promoName'=>$promo->libelle,'promoId'=>$promo->id]);
    }
    //role 1 chef , 2 charge , 3 assistant
    public function validerAttachement(Request $request){
    	$module = Module::find($request->input('moduleId'));
    	$module->enseignant_id = $request->input('enseignantId');
      $module->save(); 
      $notif = new Notification();
      $notif->id_sender = Auth::id();;
      $notif->id_receiver = $module->enseignant_id;
      $notif->message = "new Module ".$module->libelle;
      $notif->date_notif = date("Y-m-d");
      $notif->type = 1;
      $notif->url = "http://127.0.0.1:8001/mesModulesCharge/".$module->enseignant_id;
      $notif->save();
    	$valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "yes babe";
        return response()->json($valid);
    }
    public function editModule(Request $request){
           $module = Module::find($request->input('moduleId'));
           $module->libelle = $request->input('libelle');
           $module->save();
           $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = "ok babe";
        return response()->json($valid);
    }
    public function modulesAssistant($idEns){
            $modules = DB::select("SELECT modules.id ,libelle FROM 
              (SELECT DISTINCT affectations.module_id from affectations WHERE affectations.enseignant_id = ".$idEns.") AS affs ,modules WHERE 
              affs.module_id = modules.id
              ");
              $notifications = Notification::where("id_receiver","=",Auth::id())->orderBy('id','DESC')->get();
        $cpt = 0;
           foreach($notifications as $notif){
             if($notif->est_lit == 0){
               $cpt++;
             }
           }
            return view('gAbs.modulesEns')->with(['modules'=>$modules,'notifications'=>$notifications,'cpt'=>$cpt]);
    }
    public function modulesCharge($idEns){
           Notification::where("id_receiver","=",Auth::id())->where('type','=',1)->where('est_lit','=',0)->update(['est_lit'=>1]);
           
            $modules = Module::where('enseignant_id','=',$idEns)->get();
            return view('gPrel.moduleEns')->with(['modules'=>$modules]);
    }
    public function modulesExclusion($idEns){
            $modules = Module::where('enseignant_id','=',$idEns)->get();
            return view('gAbs.modulesExclusion')->with(['modules',$modules]);
    }
    public function modulesAssistantJustifier($idEns){
            $modules = DB::select("SELECT modules.id ,libelle FROM 
              (SELECT DISTINCT affectations.module_id from affectations WHERE affectations.enseignant_id = ".$idEns.") AS affs ,modules WHERE 
              affs.module_id = modules.id
              ");
            return view('gAbs.modulesEns')->with(['modules'=>$modules,'justifier'=>"oui"]);
    }
    public function getStudentsExclus($idMod){
            $etudiantsExclus= DB::select("SELECT * FROM 
              etudiants as ets WHERE groupe_id in (SELECT id FROM groupes where promotion_id = (SELECT promotion_id FROM modules WHERE id = ".$idMod.")) AND
              5 <= (SELECT count(*) FROM absences as abs where abs.etudiant_id = ets.id AND
              abs.instance_id in (SELECT id FROM instances as ins where 
              ins.seance_id in (select id FROM seances where affectation_id in
              (SELECT id FROM affectations where module_id = ".$idMod.")
              )
              )
              )
              ");
            $etudiantsExclus = Etudiant::hydrate($etudiantsExclus);
            $module = Module::find($idMod);
            return view('gAbs.listeExclusion')->with(['etudiantsExclus'=>$etudiantsExclus,"module"=>$module]);
    }
    public function getGroupes($idModule,$idEns){
           $nomMod = Module::find($idModule)->libelle;
           $groupesEns = DB::select("SELECT affectations.id as affId,groupes.id as grId,libelle,td,tp FROM affectations , groupes WHERE affectations.enseignant_id = ".$idEns." AND
              affectations.module_id = ".$idModule." AND affectations.groupe_id = groupes.id");
            return view('gAbs.groupesEns')->with(['groupesEns'=>$groupesEns,"nomMod"=>$nomMod]);
    }
     public function getGroupesCharge($idModule,$idEns){
           $nomMod = Module::find($idModule)->libelle;
           $module =  Module::find($idModule);
           $groupes = Groupe::where('promotion_id','=',$module->promotion_id)->orderBy('id','asc')->get();
            return view('gPrel.groupesCharge')->with(['groupes'=>$groupes,"nomMod"=>$nomMod,"module"=>$module]);
    }
    public function getGroupesJustifier($idModule,$idEns){
           $nomMod = Module::find($idModule)->libelle;
           $groupesEns = DB::select("SELECT affectations.id as affId,groupes.id as grId,libelle,td,tp FROM affectations , groupes WHERE affectations.enseignant_id = ".$idEns." AND
              affectations.module_id = ".$idModule." AND affectations.groupe_id = groupes.id");
            return view('gAbs.groupesEns')->with(['groupesEns'=>$groupesEns,"nomMod"=>$nomMod,"justifier"=>"oui"]);
    }
    
    public function getListeAbs($idModule,$idAff,$type){
           $affectation = Affectation::find($idAff);
           $students = Etudiant::where('groupe_id','=',$affectation->groupe_id)->get();
           $seance = Seance::where('affectation_id','=',$idAff)->where('type','=',$type)->get();
           $seance = $seance->get(0);
           $seanceId= null;
           if($seance)
                $seanceId = $seance->id;
           $instances = Instance::where('seance_id','=',$seanceId)->orderBy('id','asc')->get();
           $module = Module::find($idModule);
            return view('gAbs.listeAbsComplete')->with(['students'=>$students,'instances'=>$instances,"seanceId"=>$seanceId,"seance"=>$seance,"module"=>$module,'type'=>$type]);
    }
    public function getListeAbsCharge($idModule,$idGrp,$type){
           $affectation = Affectation::where("module_id","=",$idModule)->where("groupe_id","=",$idGrp)->where($type,"=","1")->get();
           $affectation= $affectation->get(0);
           $affId = null;
           if($affectation)
             $affId = $affectation->id;
           $students = Etudiant::where('groupe_id','=',$idGrp)->orderBy('id','asc')->get();
           $seance = Seance::where('affectation_id','=',$affId)->where('type','=',$type)->get();
           $seance = $seance->get(0);
           $seanceId= null;
           if($seance)
                $seanceId = $seance->id;
           $instances = Instance::where('seance_id','=',$seanceId)->orderBy('id','asc')->get();

           $module = Module::find($idModule);
            return view('gPrel.listeAbsCompleteCharge')->with(['students'=>$students,'instances'=>$instances,"seanceId"=>$seanceId,"seance"=>$seance,"module"=>$module,"type"=>$type]);
    }
     public function getListeAbsJustifier($idModule,$idAff,$type){
            $affectation = Affectation::find($idAff);
           $students = Etudiant::where('groupe_id','=',$affectation->groupe_id)->get();
           $seance = Seance::where('affectation_id','=',$idAff)->where('type','=',$type)->get();
           $seance = $seance->get(0);
           $seanceId= null;
           if($seance)
                $seanceId = $seance->id;
           $instances = Instance::where('seance_id','=',$seanceId)->orderBy('id','asc')->get();
           $module = Module::find($idModule);
           $notifications = Notification::where("id_receiver","=",Auth::id())->orderBy('id','DESC')->get();
            return view('gAbs.listeAbsComplete')->with(['students'=>$students,'instances'=>$instances,"seanceId"=>$seanceId,"seance"=>$seance,"module"=>$module,'type'=>$type,"justifier"=>"oui"]);
    }
}
