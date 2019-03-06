<?php

namespace App\Http\Controllers;
use App\Imports\EtudiantsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Groupe;
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

        $fragment = "<div class='col-sm-3 col-xxxl-3'>
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
}
