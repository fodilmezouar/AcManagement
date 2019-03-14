<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    public function groupe()
	{
		return $this->belongsTo('App\Groupe','groupe_id');
	}
	public function module()
	{
		return $this->belongsTo('App\Module','module_id');
	}
}
