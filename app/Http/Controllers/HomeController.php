<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\User;
use App\Notification;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = User::find(Auth::id());
        if(strpos($user->role, '1') !== false)
        {$promoId = $request->input('promoId');
        $promos = Promotion::all();
        $promosCourant = $promos->get(0);
        if($promoId)
            $promosCourant = Promotion::find($promoId);
        $admins = User::where('role','like','%4%')->get();
        $notifications = Notification::where("id_receiver","=",Auth::id())->orderBy('id','DESC')->get();
        $cpt = 0;
           foreach($notifications as $notif){
             if($notif->est_lit == 0){
               $cpt++;
             }
           }
        return view('home')->with(["promos"=>$promos,"promosCourant"=>$promosCourant,'admins'=>$admins,'notifications'=>$notifications,'cpt'=>$cpt]);}
        else if(strpos($user->role, '4') !== false){
            return  redirect('/promotions/');
        }
        else if(strpos($user->role, '2') !== false){
            return  redirect('/mesModulesCharge/'.Auth::id());
        }
        else{
            return  redirect('/calendrier/'.Auth::id());
        }
    }
}
