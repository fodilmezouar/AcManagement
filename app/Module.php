<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    public function module()
    {
        return $this->hasMany('App\Exams');
    }
}
