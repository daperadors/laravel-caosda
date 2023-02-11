<?php

namespace App\Http\Controllers;

use App\Models\Estudis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstudisController extends Controller
{
    public function index(){
        $studies = Estudis::select()->paginate(5);

        return view('studies', compact('studies'));
    }
}
