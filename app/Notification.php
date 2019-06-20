<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Notification extends Model
{
 public function getSender(){
     
    return User::where('id','=',$this->id_sender)->get()->get(0);
 } 
}
