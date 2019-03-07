<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;
use App\User;
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
                          </div>
                          <a class='element-box el-tablo' href='#' style='background-color: #e1e1e1;'>
                            <div class='value' id='libelleModule'>
                              ".$module->libelle."
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
    	$enseignants = User::where('grade','!=',NULL)->get();
    	$moduleName = Module::find($id)->libelle;
    	return view('gPrel.attachement')->with(['enseignants'=>$enseignants,'idModule'=>$id,'moduleName'=>$moduleName]);
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
}
