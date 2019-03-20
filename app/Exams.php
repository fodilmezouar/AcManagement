<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    //
    public function module()
    {
        return $this->belongsTo('App\Module','module_id');
    }
}
