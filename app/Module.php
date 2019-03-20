<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Module extends Model
{
	public function weekCourant(){
		$tab = DB::select("SELECT WEEK('".date("Y-m-d")."',0) as nbrWeek");
       return $tab[0]->nbrWeek;
	}
    public function absencesParMonth($grpId){
    	if($grpId)
      $tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc,affectations as af where abs.instance_id = ins.id   and YEAR(date_ins) = '".date("Y")."' and MONTH(date_ins) = '".date("m")."' and ins.seance_id = sc.id  and sc.affectation_id = af.id and af.module_id = ".$this->id." and etudiant_id in (SELECT id From etudiants where groupe_id = ".$grpId.")");
  else
  	$tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc,affectations as af where abs.instance_id = ins.id   and YEAR(date_ins) = '".date("Y")."' and MONTH(date_ins) = '".date("m")."' and ins.seance_id = sc.id  and sc.affectation_id = af.id and af.module_id = ".$this->id);
      if(sizeof($tab) >= 1)
         return $tab[0]->cpt;
      return 0;
	}
	 public function absencesParToday($grpId){
	 	if($grpId)
      $tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc,affectations as af where abs.instance_id = ins.id   and date_ins = '".date("Y-m-d")."' and ins.seance_id = sc.id  and sc.affectation_id = af.id and af.module_id = ".$this->id." and etudiant_id in (SELECT id From etudiants where groupe_id = ".$grpId.")");
      else
      	  $tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc,affectations as af where abs.instance_id = ins.id   and date_ins = '".date("Y-m-d")."' and ins.seance_id = sc.id  and sc.affectation_id = af.id and af.module_id = ".$this->id);
      if(sizeof($tab) >= 1)
         return $tab[0]->cpt;
      return 0;
	}
	public function absencesParWeek($grpId){
		if($grpId)
       $tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc,affectations as af where abs.instance_id = ins.id   and WEEK(date_ins) = '".$this->weekCourant()."' and YEAR(date_ins) = '".date("Y")."' and ins.seance_id = sc.id  and sc.affectation_id = af.id and af.module_id = ".$this->id." and etudiant_id in (SELECT id From etudiants as es where es.groupe_id = ".$grpId.")");
   else
   	$tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc,affectations as af where abs.instance_id = ins.id   and WEEK(date_ins) = '".$this->weekCourant()."' and YEAR(date_ins) = '".date("Y")."' and ins.seance_id = sc.id  and sc.affectation_id = af.id and af.module_id = ".$this->id);
      if(sizeof($tab) >= 1)
         return $tab[0]->cpt;
      return 0;
	}
    //
    public function module()
    {
        return $this->hasMany('App\Exams');
    }

}
