<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seance;
use App\Affectation;
class SeanceController extends Controller
{
    public function valideCalendar(Request $request){
        $affectations = Affectation::where('enseignant_id','=',$request->input('ensId'))->get();
        foreach ($affectations as $affectation) {
            Seance::where("affectation_id","=",$affectation->id)->delete();
        }
         $seances = $request->input("seances");
         foreach($seances as $seance){
         	$sc = new Seance();
         	$sc->jour = $seance['jour'];
         	$sc->heureDebut = $seance['startHour'];
         	$sc->heureFin= $seance['endHour'];
         	$sc->affectation_id = $seance['idAffect'];
         	$sc->type = $seance['type'];
         	$sc->save();
         }
         $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = "success";
        return response()->json($valid);
    }
    public function getSeanceEns(Request $request){
    	$idEns = $request->input('ensId');
    	$seances = DB::table('seances')
            ->join('affectations', 'seances.affectation_id', '=', 'affectations.id')
            ->select('seances.id','seances.jour', 'seances.heureDebut', 'seances.heureFin','seances.affectation_id','type')
            ->get();
        $tab = array();
        foreach ($seances as $seance) {
        	$affect = Affectation::find($seance->affectation_id);
        	$nomGroupe = $affect->groupe->libelle;
        	$nomModule = $affect->module->libelle;
        	$type = $seance->type;
        	$title = $nomModule." ".$nomGroupe." ".$type;
        	$tab[]=array("idSeance"=>$seance->id,"title"=>$title,"jour"=>$seance->jour,"start"=>$seance->heureDebut,"end"=>$seance->heureFin,"idAffect"=>$seance->affectation_id);
        }
         $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = $tab;
        return response()->json($valid);
    }
}
