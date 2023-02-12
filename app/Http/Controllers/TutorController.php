<?php

namespace App\Http\Controllers;

use App\Models\Alumnes;
use App\Models\Empresas;
use App\Models\Estudis;
use App\Models\Ofertas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TutorController extends Controller
{
    public function index()
    {
        if(Auth::user()->coordinator === 1) {
            $enterprises = Empresas::where('id', '>', 0)->pluck('id')->all();
            $studentsInfo = DB::table('alumnes')
                ->where('practiques', '=', 0)->get();
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
    public function filterByYear(){
        if(Auth::user()->coordinator === 1) {
            $enterprises = Empresas::where('id', '>', 0)->pluck('id')->all();
            $studentsInfo = DB::table('alumnes')
                ->where('practiques', '=', 0)->get();;
        }
        else{
            $enterprises = Empresas::where('id', '=', Auth::user()->group)->pluck('id')->all();
            $studentsInfo = DB::table('alumnes')
                ->where('practiques', '=', 0)
                ->where('idEstudi', '=', Auth::user()->group)
                ->where('curs', '=', Carbon::now()->format('Y'))->paginate(5);
        }
        $offers = Ofertas::addSelect(['empresa' => Empresas::select('nom') -> whereColumn('id', 'ofertas.idEmpresa')])
            ->addSelect(['estudi' => Estudis::select('nom') -> whereColumn('id', 'ofertas.idEstudi')])
            ->whereIn('idEmpresa', $enterprises)
            ->where('curs', '=', Carbon::now()->format('Y'))->paginate(5);
        return view('ofertas-tutor', compact('offers', 'studentsInfo'));
    }
    public function filterByVacancies(){
        if(Auth::user()->coordinator === 1) {
            $enterprises = Empresas::where('id', '>', 0)->pluck('id')->all();
            $studentsInfo = DB::table('alumnes')
                ->where('practiques', '=', 0)->get();
        }
        else{
            $enterprises = Empresas::where('id', '=', Auth::user()->group)->pluck('id')->all();
            $studentsInfo = DB::table('alumnes')
                ->where('practiques', '=', 0)
                ->where('idEstudi', '=', Auth::user()->group)
                ->where('numVacants', '>=', 1)->paginate(5);;
        }
        $offers = Ofertas::addSelect(['empresa' => Empresas::select('nom') -> whereColumn('id', 'ofertas.idEmpresa')])
            ->addSelect(['estudi' => Estudis::select('nom') -> whereColumn('id', 'ofertas.idEstudi')])
            ->whereIn('idEmpresa', $enterprises)
            ->where('numVacants', '>=', 1)->paginate(5);
        return view('ofertas-tutor', compact('offers', 'studentsInfo'));
    }

    public function sendOffer($id){
        $oferta = Ofertas::findOrFail($id);
        $oferta -> numVacants =  $oferta -> numVacants -1;
        $oferta -> save();
        return redirect()->back()->with('status', "alert-success")->with('value', "Vacancies changed.");
    }
}
