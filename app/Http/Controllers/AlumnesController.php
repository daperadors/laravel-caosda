<?php

namespace App\Http\Controllers;

use App\Models\Alumnes;
use App\Models\Estudis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumnesController extends Controller
{
    public function addAlumnes($nom, $cognoms, $dni, $curs, $telefon, $correu, $practiques){
        $data = [
            'nom'=>$nom,
            'cognoms'=>$cognoms,
            'dni'=>$dni,
            'curs'=>$curs,
            'telefon'=>$telefon,
            'correu'=>$correu,
            'practiques'=>$practiques,
            'cv'=>"cvExample"
        ];
        Alumnes::create($data);
        return "Alumno añadido correctamente";
    }
    public function updateAlumnes($id,$nom, $cognoms, $dni, $curs, $telefon, $correu, $practiques){

        $record = Alumnes::find($id);

        if ($record) {
            $record->nom = $nom ;
            $record->cognoms = $cognoms;
            $record->dni = $dni;
            $record->curs = $curs;
            $record->telefon = $telefon;
            $record->correu = $correu;
            $record->practiques = $practiques;
            $record->save();

            return 'Alumne updated successfully';
        } else {
            return 'Alumne not found';
        }
    }
    public function index(){
        $groupsInfo = Estudis::all();
        if(Auth::user()->coordinator === 1){
            $groups = Estudis::where('id' ,'>' ,0)->pluck('id')->toArray();
            $students= Alumnes::addSelect(['groupname' => Estudis::select('nom') -> whereColumn('id', 'alumnes.idEstudi')])
                ->whereIn('idEstudi', $groups)->paginate(5);
            return view('students', compact('students', 'groupsInfo'));
        }

        $groups = Estudis::where('id' ,'=' ,Auth::user()->group)->pluck('id')->toArray();
        $students= Alumnes::addSelect(['groupname' => Estudis::select('nom') -> whereColumn('id', 'alumnes.idEstudi')])
            ->whereIn('idEstudi', $groups)->paginate(5);
        return view('students', compact('students', 'groupsInfo'));
    }
}
