<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\User;
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
        $promoId = $request->input('promoId');
        $promos = Promotion::all();
        $promosCourant = $promos->get(0);
        if($promoId)
            $promosCourant = Promotion::find($promoId);
        $admins = User::where('role','like','%4%')->get();
        return view('home')->with(["promos"=>$promos,"promosCourant"=>$promosCourant,'admins'=>$admins]);
    }
}
