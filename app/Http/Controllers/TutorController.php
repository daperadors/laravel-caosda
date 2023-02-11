<?php

namespace App\Http\Controllers;

use App\Models\Alumnes;
use App\Models\Empresas;
use App\Models\Estudis;
use App\Models\Ofertas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TutorController extends Controller
{
    public function index()
    {
        if(Auth::user()->coordinator === 1) {
            $enterprises = Empresas::where('id', '>', 0)->pluck('id')->all();
            $studentsInfo = DB::table('alumnes')->get();
        }
        else{
            $enterprises = Empresas::where('id', '=', Auth::user()->group)->pluck('id')->all();
            $studentsInfo = DB::table('alumnes')
                ->where('practiques', '=', 0)
                ->where('idEstudi', '=', Auth::user()->group)->get();
        }
        $offers = Ofertas::addSelect(['empresa' => Empresas::select('nom') -> whereColumn('id', 'ofertas.idEmpresa')])
            ->addSelect(['estudi' => Estudis::select('nom') -> whereColumn('id', 'ofertas.idEstudi')])
            ->whereIn('idEmpresa', $enterprises)->paginate(5);
        return view('ofertas-tutor', compact('offers', 'studentsInfo'));
    }
}
