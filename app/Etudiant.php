<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $guarded = [];
    public function etudiant()
    {
        return $this->hasMany('App\Copies');
    }
}
