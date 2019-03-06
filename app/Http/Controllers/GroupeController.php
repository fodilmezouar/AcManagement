<?php

namespace App\Http\Controllers;
use App\Imports\EtudiantsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Groupe;
use App\Etudiant;
class GroupeController extends Controller
{
	public function import(Request $request) 
    {
    	
    	$groupe = new Groupe();
    	$libelle = $request->input('libelleModal');
        
        $groupe->libelle = $libelle;
        $groupe->promotion_id = $request->input('promoId');

        $file = $request->file('fichier');
        $file_name = $libelle.'.'.$file->getClientOriginalExtension();
        $file->move(public_path('/uploads/groupes'),$file_name);

        $groupe->fichier = 'uploads/groupes/'.$file_name;
        $groupe->save();
        
        Excel::import(new EtudiantsImport($groupe->id),$groupe->fichier);

        $fragment = "<div class='col-sm-3 col-xxxl-3 block' role='".$groupe->id."'>
                         <div>
                            <button aria-label='Close' class='close supp' type='button' data-target='#suppGroupModal' data-toggle='modal' role='".$groupe->id."'><i class='os-icon os-icon-ui-15'></i></button>
                            <button aria-label='Close' class='close edit' type='button' data-target='#editGroupModal' data-toggle='modal' role='".$groupe->id."'><i class='os-icon os-icon-ui-49'></i></button>
                          </div>
                          <a class='element-box el-tablo' href='#' style='background-color: #e1e1e1;'>
                            <div class='value' id='libelle'>
                              ".$groupe->libelle."
                            </div>
                          </a>
                        </div>";

         $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = $fragment;
        return response()->json($valid);
    }
    public function suppGroupe(Request $request){
       $groupeId = $request->input('groupeId');
       Etudiant::where('groupe_id','=',$groupeId)->delete();
       Groupe::find($groupeId)->delete();
       $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = "yes babe";
        return response()->json($valid);
    }
    public function editGroupe(Request $request){
           $groupe = Groupe::find($request->input('groupeId'));
           $groupe->libelle = $request->input('libelle');
           $groupe->save();
           $valid['success'] = array('success' => false, 'messages' => array());
           $valid['success'] = true;
           $valid['messages'] = "ok babe";
        return response()->json($valid);
    }
}
