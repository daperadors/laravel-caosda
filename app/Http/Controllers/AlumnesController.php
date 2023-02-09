<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
