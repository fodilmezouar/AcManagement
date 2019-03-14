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
                          <a class='element-box el-tablo' href='#' style='background-color: #e1e1e1;'>
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
    	return view('gPrel.attachement')->with(['enseignants'=>$enseignants,'idModule'=>$id,'moduleName'=>$moduleName,'promoName'=>$promo->libelle,'promoId'=>$promo->id]);
    }
    //role 1 chef , 2 charge , 3 assistant
    public function validerAttachement(Request $request){
    	$module = Module::find($request->input('moduleId'));
    	$module->enseignant_id = $request->input('enseignantId');
    	$module->save(); 
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
            return view('gAbs.modulesEns')->with('modules',$modules);
    }
    public function getGroupes($idModule,$idEns){
           $groupesEns = DB::select("SELECT affectations.id as affId,groupes.id as grId,libelle,td,tp FROM affectations , groupes WHERE affectations.enseignant_id = ".$idEns." AND
              affectations.module_id = ".$idModule." AND affectations.groupe_id = groupes.id");
            return view('gAbs.groupesEns')->with('groupesEns',$groupesEns);
    }
    
    public function getListeAbs($idModule,$idAff,$type){
           $affectation = Affectation::find($idAff);
           $students = Etudiant::where('groupe_id','=',$affectation->groupe_id)->get();
           $seance = Seance::where('affectation_id','=',$idAff)->where('type','=',$type)->get();
           $instances = Instance::where('seance_id','=',$seance->get(0)->id)->orderBy('id','asc')->get();
            return view('gAbs.listeAbsComplete')->with(['students'=>$students,'instances'=>$instances]);
    }
}
