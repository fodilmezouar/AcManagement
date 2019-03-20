<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Absence;
use Illuminate\Support\Facades\DB;
use App\Module;
use App\Groupe;
class Promotion extends Model
{
    public function filiere()
	{
		return $this->belongsTo('App\Filiere','filiere_id');
	}
	public function weekCourant(){
		$tab = DB::select("SELECT WEEK('".date("Y-m-d")."',0) as nbrWeek");
       return $tab[0]->nbrWeek;
	}
	public function absencesToday($grpId){
		if($grpId)
			$tab = DB::select("SELECT count(*) as cpt  FROM absences where instance_id in (SELECT id From instances WHERE date_ins = '".date('Y-m-d')."') and etudiant_id in (SELECT id From etudiants where groupe_id = ".$grpId.")");
		else
            $tab = DB::select("SELECT count(*) as cpt  FROM absences where instance_id in (SELECT id From instances WHERE date_ins = '".date('Y-m-d')."') and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id."))");
      return $tab[0]->cpt;
	}
	public function absencesweek($grpId){
		if($grpId)
			$tab = DB::select("SELECT count(*) as cpt  FROM absences where instance_id in (SELECT id From instances WHERE WEEK(date_ins,0) = '".$this->weekCourant()."' and YEAR(date_ins) = '".date("Y")."') and etudiant_id in (SELECT id From etudiants where groupe_id = ".$grpId.")");
		else
      $tab = DB::select("SELECT count(*) as cpt  FROM absences where instance_id in (SELECT id From instances WHERE WEEK(date_ins,0) = '".$this->weekCourant()."' and YEAR(date_ins) = '".date("Y")."') and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id."))");
      return $tab[0]->cpt;
	}
	public function absencesMonth($grpId){
		if($grpId)
			$tab = DB::select("SELECT count(*) as cpt  FROM absences where instance_id in (SELECT id From instances WHERE MONTH(date_ins) = '".date("m")."' and YEAR(date_ins) = '".date("Y")."') and etudiant_id in (SELECT id From etudiants where groupe_id = ".$grpId.")");
		else
      $tab = DB::select("SELECT count(*) as cpt  FROM absences where instance_id in (SELECT id From instances WHERE MONTH(date_ins) = '".date("m")."' and YEAR(date_ins) = '".date("Y")."') and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id."))");
      return $tab[0]->cpt;
	}
	public function absencesGroupe($type){
		switch ($type) {
			case 'today':
				$tab = DB::select("SELECT libelle,count(*) as cpt  FROM absences as abs,etudiants as ets,groupes as grs where instance_id in (SELECT id From instances WHERE date_ins = '".date("Y-m-d")."') and abs.etudiant_id = ets.id and ets.groupe_id = grs.id group by grs.id");
				break;
			case 'week':
				$tab = DB::select("SELECT libelle,count(*) as cpt  FROM absences as abs,etudiants as ets,groupes as grs where instance_id in (SELECT id From instances WHERE WEEK(date_ins) = '".$this->weekCourant()."' and YEAR(date_ins) = '".date("Y")."') and abs.etudiant_id = ets.id and ets.groupe_id = grs.id group by grs.id");
				break;
			default:
				$tab = DB::select("SELECT libelle,count(*) as cpt  FROM absences as abs,etudiants as ets,groupes as grs where instance_id in (SELECT id From instances WHERE MONTH(date_ins) = '".date("m")."' and YEAR(date_ins) = '".date("Y")."') and abs.etudiant_id = ets.id and ets.groupe_id = grs.id group by grs.id");
				break;
		}
      
      return $tab;
	}
	public function groupes(){
        $groupes = Groupe::where('promotion_id','=',$this->id)->orderBy('id','asc')->get();
        return $groupes;
	}
	public function absencesParMonth($grpId){
		if($grpId)
      $tab = DB::select("SELECT MONTH(date_ins) as month, count(*) as cpt  FROM absences as abs,instances as ins where abs.instance_id = ins.id   and YEAR(date_ins) = '".date("Y")."' and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id." and id = ".$grpId.")) group by MONTH(date_ins)");
  else
  	$tab = DB::select("SELECT MONTH(date_ins) as month, count(*) as cpt  FROM absences as abs,instances as ins where abs.instance_id = ins.id   and YEAR(date_ins) = '".date("Y")."' and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id.")) group by MONTH(date_ins)");
      return $tab;
	}
	public function absencesParTdMonth($grpId){
		if($grpId)
			$tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id   and YEAR(date_ins) = '".date("Y")."' and MONTH(date_ins) = '".date("m")."' and ins.seance_id = sc.id and sc.type='td' and etudiant_id in (SELECT id From etudiants where groupe_id = ".$grpId.")");
		else
      $tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id   and YEAR(date_ins) = '".date("Y")."' and MONTH(date_ins) = '".date("m")."' and ins.seance_id = sc.id and sc.type='td' and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id."))");
      if(sizeof($tab) >= 1)
         return $tab[0]->cpt;
       return 0;
	}
	public function absencesParTdWeek($grpId){
		if($grpId)
			$tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id   and YEAR(date_ins) = '".date("Y")."' and WEEK(date_ins) = '".$this->weekCourant()."' and ins.seance_id = sc.id and sc.type='td' and etudiant_id in (SELECT id From etudiants where groupe_id = ".$grpId.")");
	    else
      $tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id   and YEAR(date_ins) = '".date("Y")."' and WEEK(date_ins) = '".$this->weekCourant()."' and ins.seance_id = sc.id and sc.type='td' and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id."))");
      if(sizeof($tab) >= 1)
         return $tab[0]->cpt;
       return 0;
	}
	public function absencesParTpWeek($grpId){
		if($grpId)
			$tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id   and YEAR(date_ins) = '".date("Y")."' and WEEK(date_ins) = '".$this->weekCourant()."' and ins.seance_id = sc.id and sc.type='tp' and etudiant_id in (SELECT id From etudiants where groupe_id = ".$grpId.")");
		else
      $tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id   and YEAR(date_ins) = '".date("Y")."' and WEEK(date_ins) = '".$this->weekCourant()."' and ins.seance_id = sc.id and sc.type='tp' and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id."))");
      if(sizeof($tab) >= 1)
         return $tab[0]->cpt;
       return 0;
	}

	public function absencesParTpToday($grpId){
		if($grpId)
			 $tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id  and date_ins = '".date("Y-m-d")."' and ins.seance_id = sc.id and sc.type='tp' and etudiant_id in (SELECT id From etudiants where groupe_id = ".$grpId.")");
		else
          $tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id  and date_ins = '".date("Y-m-d")."' and ins.seance_id = sc.id and sc.type='tp' and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id."))");
      if(sizeof($tab) >= 1)
         return $tab[0]->cpt;
       return 0;
	}
	public function absencesParTdToday($grpId){
      if($grpId)
			 $tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id  and date_ins = '".date("Y-m-d")."' and ins.seance_id = sc.id and sc.type='td' and etudiant_id in (SELECT id From etudiants where groupe_id = ".$grpId.")");
		else
          $tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id  and date_ins = '".date("Y-m-d")."' and ins.seance_id = sc.id and sc.type='td' and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id."))");
      if(sizeof($tab) >= 1)
         return $tab[0]->cpt;
       return 0;
	}
	public function absencesParTpMonth($grpId){
		if($grpId)
			$tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id   and YEAR(date_ins) = '".date("Y")."' and MONTH(date_ins) = '".date("m")."' and ins.seance_id = sc.id and sc.type='tp' and etudiant_id in (SELECT id From etudiants where groupe_id = ".$grpId.")");
		else
      $tab = DB::select("SELECT count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id   and YEAR(date_ins) = '".date("Y")."' and MONTH(date_ins) = '".date("m")."' and ins.seance_id = sc.id and sc.type='tp' and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id."))");
     
      if(sizeof($tab) >= 1)
         return $tab[0]->cpt;
       return 0;
	}
	public function modules(){
		$modules = Module::where("promotion_id","=",$this->id)->get();
		return $modules;
	}
	public function absencesMatin($grpId){
		if($grpId)
      $tab = DB::select("SELECT MONTH(date_ins) as month, count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id  and ins.seance_id = sc.id and sc.heureDebut >= '08:30:00' and sc.heureFin <= '13:00:00' and YEAR(date_ins) = '".date("Y")."'  and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id." and id = ".$grpId.")) group by MONTH(date_ins)");
  else
  	$tab = DB::select("SELECT MONTH(date_ins) as month, count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id  and ins.seance_id = sc.id and sc.heureDebut >= '08:30:00' and sc.heureFin <= '13:00:00' and YEAR(date_ins) = '".date("Y")."' and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id.")) group by MONTH(date_ins)");
      return $tab;
	}
	public function absencesSoir($grpId){
		if($grpId)
      $tab = DB::select("SELECT MONTH(date_ins) as month, count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id  and ins.seance_id = sc.id and sc.heureDebut >= '13:30:00' and sc.heureFin <= '17:30:00' and YEAR(date_ins) = '".date("Y")."'  and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id." and id = ".$grpId.")) group by MONTH(date_ins)");
  else
  	$tab = DB::select("SELECT MONTH(date_ins) as month, count(*) as cpt  FROM absences as abs,instances as ins,seances as sc where abs.instance_id = ins.id  and ins.seance_id = sc.id and sc.heureDebut >= '13:30:00' and sc.heureFin <= '17:30:00' and YEAR(date_ins) = '".date("Y")."' and etudiant_id in (SELECT id From etudiants where groupe_id in (select id from groupes where promotion_id = ".$this->id.")) group by MONTH(date_ins)");
      return $tab;
	}
	
}
