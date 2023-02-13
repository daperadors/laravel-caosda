<?php

namespace App\Http\Controllers;


use App\Mail\TestMail;
use App\Models\Alumnes;
use App\Models\Empresas;
use App\Models\Enviaments;
use App\Models\Estudis;
use App\Models\Ofertas;
use http\Client\Curl\User;
use http\Env;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;

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
        $statesShipment = ['NoConveni', 'Finalitzat i Contractat', 'Enviament i retorna la plaça a la oferta'];
        $alumns = Alumnes::where('id' ,'>' ,0)->pluck('id')->all();
        $shipments = Enviaments::addSelect(['alumne' => Alumnes::select('nom') -> whereColumn('id', 'enviaments.alumne_id')])
                                ->addSelect(['oferta' => Ofertas::select('descripcio') -> whereColumn('id', 'enviaments.oferta_id')])
                                ->whereIn('alumne_id', $alumns)->where('estatEnviaments', '!=', 'Finalitzat i Contractat')->paginate(5);
        return view('home', compact('shipments', 'alumns','statesShipment'));
    }

    public function udpateState(Request $request, $id) {

        $enviament = Enviaments::findOrFail($id);

        $enviament->estatEnviaments = $request -> stateOffer;
        $enviament->save();
        return redirect()->back()->with('status', "alert-success")->with('value', "Shipment ".$enviament -> id." updated.");

    }

    public function sendEmail($id)
    {

        $offers = Ofertas::findOrFail($id);
        $enterprises = Empresas::where('id' ,'=' ,$offers->idEmpresa)->pluck('nom')->first();

        $details=[
            'title' => 'Oferta de la empresa '.$enterprises,
            'body' => 'Descripcio oferta '.$offers->descripcio
        ];
        $correu = "evazquez@ies-sabadell.cat";
        Mail::to($correu)->send(new TestMail($details));
        return redirect()->back()->with('status', "alert-success")->with('value', "Nou correu enviat a ".$correu);
    }
}
