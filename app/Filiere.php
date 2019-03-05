<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
	public function filiere()
	{
       return $this->hasMany('App\Promotion');   
    }
}
