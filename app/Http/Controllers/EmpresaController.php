<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    public function index()
    {
        $enterprises = Empresas::all();
        return view('empresa', compact('enterprises'));
    }
}
