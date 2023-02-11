<?php

namespace App\Http\Controllers;

use App\Models\Alumnes;
use App\Models\Enviaments;
use App\Models\Ofertas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

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
    public function index()
    {
        $alumns = Alumnes::where('id' ,'>' ,0)->pluck('id')->all();
        $shipments = Enviaments::addSelect(['alumne' => Alumnes::select('nom') -> whereColumn('id', 'enviaments.alumne_id')])
                                ->addSelect(['oferta' => Ofertas::select('descripcio') -> whereColumn('id', 'enviaments.oferta_id')])
                                ->whereIn('alumne_id', $alumns)->where('estatEnviaments', '!=', 'Finalitzat i Contractat')->paginate(5);
        return view('home', compact('shipments', 'alumns'));
    }
}
