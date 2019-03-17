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
}