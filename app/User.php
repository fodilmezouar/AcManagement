<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notification;
class User extends Authenticatable
{
    use Notifiable;
    //
    public function countNotifNonLit(){
        $notifications = Notification::where("id_receiver","=",$this->id)->where('est_lit','=','0')->get();
        return $notifications->count();
    }
    public function notifications(){
        $notifications = Notification::where("id_receiver","=",$this->id)->take(5)->orderBy('id','DESC')->get();
        return $notifications;
    }
}
