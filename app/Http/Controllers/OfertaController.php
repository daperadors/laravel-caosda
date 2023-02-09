<?php

namespace App\Http\Controllers;

use App\Models\Alumnes;
use App\Models\Empresas;
use App\Models\Enviaments;
use App\Models\Estudis;
use App\Models\Ofertas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OfertaController extends Controller
{
    public function index()
    {
        $enterprises = Empresas::where('id' ,'>' ,0)->pluck('id')->all();
        $offers = Ofertas::addSelect(['empresa' => Empresas::select('nom') -> whereColumn('id', 'ofertas.idEmpresa')])
            ->addSelect(['estudi' => Estudis::select('nom') -> whereColumn('id', 'ofertas.idEstudi')])
            ->whereIn('idEmpresa', $enterprises)->paginate(5);
        return view('ofertas', compact('offers'));
    }
    public function addOferta($descripcio, $numVacants, $curs, $nomContacte, $cognomContacte, $correuContacte){
        $data = [
            'descripcio'=>$descripcio,
            'numVacants'=>$numVacants,
            'curs'=>$curs,
            'nomContacte'=>$nomContacte,
            'cognomContacte'=>$cognomContacte,
            'correuContacte'=>$correuContacte
        ];
        Ofertas::create($data);
        return Redirect::to('empresa/oferta');
    }
    public function updateOferta($id, $descripcio, $numVacants, $curs, $nomContacte, $cognomContacte, $correuContacte){

        $record = Ofertas::find($id);

        if ($record) {
            $record->descripcio = $descripcio ;
            $record->numVacants = $numVacants;
            $record->curs = $curs;
            $record->nomContacte = $nomContacte;
            $record->cognomContacte = $cognomContacte;
            $record->correuContacte = $correuContacte;
            $record->save();

            return Redirect::to('empresa/oferta');
        } else {
            return 'Offer not found';
        }
    }
}
