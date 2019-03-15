<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copies extends Model
{
    //
    public function etudiant()
    {
        return $this->belongsTo('App\Etudiant','etudiantId');
    }
}
