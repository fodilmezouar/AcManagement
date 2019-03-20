<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Groupe extends Model
{
	public function weekCourant(){
		$tab = DB::select("SELECT WEEK('".date("Y-m-d")."',0) as nbrWeek");
       return $tab[0]->nbrWeek;
	}
    public function absences($type){
       switch ($type) {
			case 'today':
				$tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,etudiants as ets,groupes as grs where instance_id in (SELECT id From instances WHERE date_ins = '".date("Y-m-d")."') and abs.etudiant_id = ets.id and ets.groupe_id = grs.id and grs.id = ".$this->id);
				break;
			case 'week':
				$tab = DB::select("SELECT libelle,count(*) as cpt  FROM absences as abs,etudiants as ets,groupes as grs where instance_id in (SELECT id From instances WHERE WEEK(date_ins) = '".$this->weekCourant()."' and YEAR(date_ins) = '".date("Y")."') and abs.etudiant_id = ets.id and ets.groupe_id = grs.id and grs.id = ".$this->id);
				break;
			default:
				$tab = DB::select("SELECT libelle,count(*) as cpt  FROM absences as abs,etudiants as ets,groupes as grs where instance_id in (SELECT id From instances WHERE MONTH(date_ins) = '".date("m")."' and YEAR(date_ins) = '".date("Y")."') and abs.etudiant_id = ets.id and ets.groupe_id = grs.id and grs.id = ".$this->id);
				break;
		}
      if(sizeof($tab) >= 1)
      return $tab[0]->cpt;
  return 0;
    }
}
