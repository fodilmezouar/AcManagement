<?php

namespace App\Http\Controllers;

use App\Exports\EtudiantsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Sheet;
use App\Etudiant;
class EtudiantController extends Controller
{
    public function export($grpId) 
    {
    	Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
        $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
        });
        return Excel::download(new EtudiantsExport($grpId), 'students.xlsx');
    }
    public function deleteEtudiant(Request $request){
    	$etudiant = Etudiant::find($request->input("etudiantId"));
    	$etudiant->delete();
    	$valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "success";
        return response()->json($valid);
    }
    public function editEtudiant(Request $request){
    	$etudiant = Etudiant::find($request->input('etudiantId'));
    	$etudiant->numero = $request->input('numero');
    	$etudiant->nom = $request->input('nom');
    	$etudiant->prenom = $request->input('prenom');
    	$etudiant->naissance = $request->input('naissance');
    	$etudiant->save();
    	$valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "success";
        return response()->json($valid);
    }
    public function addEtudiant(Request $request){
       $etudiant = new Etudiant();
       $etudiant->groupe_id = $request->input("grpId");	
       $etudiant->numero = $request->input('numero');
    	$etudiant->nom = $request->input('nom');
    	$etudiant->prenom = $request->input('prenom');
    	$etudiant->naissance = $request->input('naissance');
    	$etudiant->save();
    	$valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = '<tr class ="block" id="'.$etudiant->id.'"><td class="numeroTd">'.$etudiant->numero.'</td><td class="nomTd">'.$etudiant->nom.'</td><td class="prenomTd">'.$etudiant->prenom.'</td><td class="naissanceTd">'.$etudiant->naissance.'</td>
                            <td>
                              <div class="btn-group">
                                <button class="btn btn-outline-primary edit" data-toggle="modal" id="'.$etudiant->id.'" data-target="#editEtudiantModal"><i class="os-icon os-icon-ui-49"></i>
                                </button>
                                <button class="btn btn-outline-danger supp" id="'.$etudiant->id.'" data-toggle="modal" data-target="#suppEtudiantModal" ><i class="os-icon os-icon-ui-15"></i></button>
                              </div>
                            </td>
                           </tr>';
        return response()->json($valid);
    }
}
