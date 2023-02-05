<?php

namespace App\Http\Controllers;

use App\Models\Enviaments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getEnviaments(){
        $shipments = DB::table('enviaments')->get();
        return view('home', compact('shipments'));
        /*$ship = Auth::user();
        $shipments = Enviaments::all();
        return view('home', compact('ship', $ship, 'shipments'));*/
    }
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
    public function index()
    {
        $shipments = Enviaments::all();
        return view('home', compact('shipments'));
    }
}
