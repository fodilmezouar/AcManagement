<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seance;
use App\Absence;
use App\Instance;
use Illuminate\Support\Facades\DB;
class Etudiant extends Model
{
    protected $guarded = [];

    public function hasAbs($scId)
    {
        $instance = Instance::where('seance_id', '=', $scId)->where('date_ins', '=', date('Y-m-d'))->get();
        if ($instance->isEmpty())
            return false;
        else {
            $instance = $instance->get(0);
            $absence = Absence::where('etudiant_id', '=', $this->id)->get();
            return !$absence->isEmpty();
        }
    }

    public function isExclu($scId)
    {
        $estEx = DB::select("SELECT count(*) as nbrAbs from absences where etudiant_id=" .
            $this->id . " AND instance_id in  (SELECT id FROM instances where seance_id = " . $scId . ")");
        return $estEx[0]->nbrAbs >= 5;
        //dd($estEx[0]->nbrAbs." ".$this->nom);


    }

    public function etudiant()
    {
        return $this->hasMany('App\Copies');
    }

    public function isExcluType($idEtd,$idMod,$type){
        $etudiantsExclus= DB::select("SELECT * FROM 
              etudiants as ets WHERE ets.id = ".$idEtd." AND groupe_id in (SELECT id FROM groupes where promotion_id = (SELECT promotion_id FROM modules WHERE id = ".$idMod.")) AND
              5 <= (SELECT count(*) FROM absences as abs where abs.etudiant_id = ets.id AND
              abs.instance_id in (SELECT id FROM instances as ins where 
              ins.seance_id in (select id FROM seances as os where os.type = '".$type."'  AND os.affectation_id in
              (SELECT id FROM affectations as afs where afs.module_id = ".$idMod.")
              )
              )
              )
              ");
        return sizeof($etudiantsExclus) == 1;
        //dd($estEx[0]->nbrAbs." ".$this->nom);
    }
    public function nbrAbsences($idEtd,$idMod,$type){
        $etudiantsExclus= DB::select("(SELECT count(*) as cpt FROM absences as abs,etudiants as ets WHERE ets.id = ".$idEtd." AND ets.id = abs.etudiant_id AND ets.groupe_id in (SELECT id FROM groupes where promotion_id = (SELECT promotion_id FROM modules WHERE id = ".$idMod.")) AND abs.etudiant_id = ets.id AND
              abs.instance_id in (SELECT id FROM instances as ins where 
              ins.seance_id in (select id FROM seances as os where os.type = '".$type."'  AND os.affectation_id in
              (SELECT id FROM affectations as afs where afs.module_id = ".$idMod.")
              )
              )
              )
              ");
        if(sizeof($etudiantsExclus) == 1)
          return $etudiantsExclus[0]->cpt;
        else
          return 0;
        //dd($estEx[0]->nbrAbs." ".$this->nom);
    }


}

