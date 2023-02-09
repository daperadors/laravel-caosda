<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EmpresaController extends Controller
{
    public function index()
    {
        $enterprises = Empresas::select()->paginate(5);
        return view('empresa', compact('enterprises'));
    }
    public function addEmpresa($nom, $adreça, $telefon, $correu)
    {
        $empresa = new Empresas();
        $empresa -> nom = $nom;
        $empresa -> adreça = $adreça;
        $empresa -> telefon = $telefon;
        $empresa -> correu = $correu;
        $empresa -> save();
        //$auxempresa = Empresas::findOrFall($empresa->id);
        //return $empresa -> toJSON();
        return Redirect::to('empresa');
    }

    public function setEmpresa($id, $nom, $adreça, $telefon, $correu)
    {
        $empresa = Empresas::findOrFall($id);
        $empresa -> nom = $nom;
        $empresa -> adreça = $adreça;
        $empresa -> telefon = $telefon;
        $empresa -> correu = $correu;
        $empresa -> save();

    }
}
