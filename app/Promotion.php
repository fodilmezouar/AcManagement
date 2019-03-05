<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Promotion extends Model
{
    public function filiere()
	{
		return $this->belongsTo('App\Filiere','filiere_id');
	}
}
