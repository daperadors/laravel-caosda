<?php

namespace App\Http\Controllers;

use App\Models\Alumnes;
use App\Models\Empresas;
use App\Models\Enviaments;
use App\Models\Estudis;
use App\Models\Ofertas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\toJSON;


class InjectionController extends Controller
{
    public function getAllAlumnes(){
        $alumnes = Alumnes::all();
        return $alumnes->toJson();
    }
    public function getAllEnviaments(){
        $enviaments = Enviaments::all();
        return $enviaments->toJson();
    }
    public function getAllEstudis(){
        $estudis = Estudis::all();
        return $estudis->toJson();
    }
    public function getAllEmpresas(){
        $empresas = Empresas::all();
        return $empresas->toJson();
    }
    public function getAllOfertas(){
        $ofertas = Ofertas::all();
        return $ofertas->toJson();
    }
    public function getAllUsers(){
        $users = User::all();
        return $users->toJson();
    }
}
