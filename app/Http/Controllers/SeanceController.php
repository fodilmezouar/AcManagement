<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seance;
use App\Affectation;
use App\Instance;
class SeanceController extends Controller
{
    public function valideCalendar(Request $request){
        $affectations = Affectation::where('enseignant_id','=',$request->input('ensId'))->get();
         $seances = $request->input("seances");
         foreach($seances as $seance){
            $sc = null;
            if($seance['seanceId'] != "-1")
                $sc = Seance::find($seance['seanceId']);
            else
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
        $valid['messages'] = "success babe";
        return response()->json($valid);
    }
    public function getSeanceEns(Request $request){
    	$idEns = $request->input('ensId');
    	$seances = DB::table('seances')
            ->join('affectations', 'seances.affectation_id', '=', 'affectations.id')
            ->where('affectations.enseignant_id',"=",$idEns)
            ->select('seances.id','seances.jour', 'seances.heureDebut', 'seances.heureFin','seances.affectation_id','type')
            ->get();
        $seancesPass = DB::table('instances')
            ->join('seances', 'instances.seance_id', '=', 'seances.id')
            ->join('affectations', 'seances.affectation_id', '=', 'affectations.id')
            ->where('affectations.enseignant_id',"=",$idEns)
            ->where('instances.date_ins',"<",date("Y-m-d", strtotime('last sunday')))
            ->select('instances.date_ins','seances.id','seances.jour', 'seances.heureDebut', 'seances.heureFin','seances.affectation_id','type')
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
        $tabPass = array();
        foreach ($seancesPass as $seancePass) {
            $affect = Affectation::find($seance->affectation_id);
            $nomGroupe = $affect->groupe->libelle;
            $nomModule = $affect->module->libelle;
            $type = $seance->type;
            $title = $nomModule." ".$nomGroupe." ".$type;
            $tabPass[]=array("idSeance"=>$seancePass->id,"title"=>$title,"jour"=>$seancePass->jour,"start"=>$seancePass->heureDebut,"end"=>$seancePass->heureFin,"idAffect"=>$seancePass->affectation_id,"dateInstance"=>$seancePass->date_ins);
        }
         $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = $tab;
        $valid['passes'] = $tabPass;
        return response()->json($valid);
    }
    public function getSeances($idEns){
        $seances = DB::table('seances')
            ->join('affectations', 'seances.affectation_id', '=', 'affectations.id')
            ->where('affectations.enseignant_id',"=",$idEns)
            ->select('seances.id','seances.jour', 'seances.heureDebut', 'seances.heureFin','seances.affectation_id','type')
            ->get();
        $tab = array();
        foreach ($seances as $seance) {
            $affect = Affectation::find($seance->affectation_id);
            $nomGroupe = $affect->groupe->libelle;
            $nomModule = $affect->module->libelle;
            $type = $seance->type;
            $title = $nomModule.",".$nomGroupe.",".$type;
            $tab[]=array("idSeance"=>$seance->id,"title"=>$title,"jour"=>$seance->jour,"start"=>$seance->heureDebut,"end"=>$seance->heureFin,"idAffect"=>$seance->affectation_id,"groupeId"=>$affect->groupe_id);
        }
         $valid['success'] = array('success' => false, 'messages' => array());
        $valid['success'] = true;
        $valid['messages'] = $tab;
        return response()->json($valid);
    }
}
