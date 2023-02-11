<?php

namespace App\Http\Controllers;

use App\Models\Alumnes;
use App\Models\Empresas;
use App\Models\Estudis;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;

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
    public function updateAlumnes(Request $request, $id){

        $record = Alumnes::findOrFail($id);

            $record->nom = $request -> name ;
            $record->cognoms = $request -> surnames;
            $record->dni = $request -> dni;
            $record->curs = $request -> curs;
            $record->telefon = intval($request -> telefon);
            $record->correu =  $request -> email;
            $record->practiques = $request -> practiques === "on" ? 1 : 0;
            $record->save();
        return redirect()->back();
    }

    public function deleteAlumne($id){
        Schema::disableForeignKeyConstraints();
        $alumne = Alumnes::findOrFail($id);
        $alumne->delete();
        Schema::enableForeignKeyConstraints();
        return Redirect::to('students');
    }

    public function UdpdateCV(Request $request, $id) {

        $alumne = Alumnes::findOrFail($id);
        $alumne -> cv = $request -> cvUpload;
        $alumne->save();
        return redirect()->back();
    }

    public function ViewCV($id) {
        $cv = Alumnes::findOrFail($id);
        $pathToFile = storage_path('app/public' . $cv -> cv);
        //$file = ['cv' => $cv];
        //file = public_path(). "/prueba.pdf";
        //$file = public_path()."/prueba.pdf";
        $header = array(
            'Content-Type: application/pdf',
        );
        return response()->download($pathToFile, $cv -> cv, $header);
        //return down
        //return Response::download($file);
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
