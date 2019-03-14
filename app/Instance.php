<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Absence;

class Instance extends Model
{
     public function hasAbsence($idEtudiant,$idInstance){
          $instance = Instance::find($idInstance);
          $absence = Absence::where('instance_id','=',$idInstance)->where('etudiant_id','=',$idEtudiant)->get();
          if(sizeof($absence) >= 1)
          	return true;
          return false;
     }
}
