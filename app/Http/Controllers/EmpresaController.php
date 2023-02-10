<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;

class EmpresaController extends Controller
{
    public function index()
    {
        $enterprises = Empresas::select()->paginate(5);
        return view('empresa', compact('enterprises'));
    }
    public function addEmpresaURL($nom, $adreça, $telefon, $correu)
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
        $empresa = Empresas::findOrFail($id);
        $empresa -> nom = $nom;
        $empresa -> adreça = $adreça;
        $empresa -> telefon = $telefon;
        $empresa -> correu = $correu;
        $empresa -> save();

    }
    public function editEmpresa(Request $request, $id)
    {
        $empresa = Empresas::findOrFail($id);
        $empresa -> nom = $request->name;
        $empresa -> adreça = $request->address;
        $empresa -> telefon = intval($request->mobile);
        $empresa -> correu = $request->email;
        $empresa -> save();
        return Redirect::to('empresa');
    }
    public function addEmpresa(Request $request)
    {
        $empresa = new Empresas();
        $empresa -> nom = $request->name;
        $empresa -> adreça = $request->address;
        $empresa -> telefon = intval($request->mobile);
        $empresa -> correu = $request->email;
        $empresa -> save();

        return Redirect::to('empresa');
    }
    public function deleteEmpresa($id){
        Schema::disableForeignKeyConstraints();
        $empresa = Empresas::findOrFail($id);
        $empresa->delete();
        Schema::enableForeignKeyConstraints();
        return Redirect::to('empresa');
    }
}
