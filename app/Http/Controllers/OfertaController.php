<?php

namespace App\Http\Controllers;

use App\Models\Alumnes;
use App\Models\Empresas;
use App\Models\Enviaments;
use App\Models\Estudis;
use App\Models\Ofertas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;

class OfertaController extends Controller
{
    public function index()
    {
        $enterprisesInfo = Empresas::all();
        $studentsInfo = Alumnes::all();
        $groupsInfo = Estudis::all();
        $enterprises = Empresas::where('id' ,'>' ,0)->pluck('id')->all();
        $offers = Ofertas::addSelect(['empresa' => Empresas::select('nom') -> whereColumn('id', 'ofertas.idEmpresa')])
            ->addSelect(['estudi' => Estudis::select('nom') -> whereColumn('id', 'ofertas.idEstudi')])
            ->whereIn('idEmpresa', $enterprises)->paginate(5);
        return view('ofertas', compact('offers', 'studentsInfo','groupsInfo', 'enterprisesInfo'));
    }

    public function addOferta(Request $request){
        $data = [
            'descripcio'=> $request -> descripcio,
            'numVacants'=> $request -> vacants,
            'idEstudi' => $request -> group,
            'idEmpresa' => $request -> empresa,
            'curs'=> $request -> curs,
            'nomContacte'=> $request -> nomContacte,
            'cognomContacte'=> $request -> cognomContacte,
            'correuContacte'=> $request -> correuContacte
        ];
        Ofertas::create($data);
        return redirect()->back();
    }
    public function updateOferta(Request $request, $id)
    {

        $offer = Ofertas::findOrFail($id);

        $offer->descripcio = $request -> descripcio;
        $offer->numVacants = $request -> vacants;
        $offer->idEstudi = $request -> group;
        $offer->curs = $request -> curs;
        $offer->nomContacte = $request -> nomContacte;
        $offer->cognomContacte = $request -> cognomContacte;
        $offer->correuContacte = $request -> correuContacte;
        $offer->save();
        return redirect()->back();

    }

    public function deleteOffer($id){
        Schema::disableForeignKeyConstraints();
        $oferta = Ofertas::findOrFail($id);
        $oferta->delete();
        Schema::enableForeignKeyConstraints();
        return redirect()->back();
    }
}
