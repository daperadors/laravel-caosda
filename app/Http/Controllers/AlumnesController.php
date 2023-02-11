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
            'idEstudi'=>$telefon,
            'correu'=>$correu,
            'practiques'=>$practiques,
            'cv'=>"cvExample"
        ];
        Alumnes::create($data);
        return "Alumno añadido correctamente";
    }
    public function updateAlumnes(Request $request, $id){

        if($request->curriculumEdit != null || $request->curriculumEdit != ""){
        $fileName = time().'.'.$request->curriculumEdit->getClientOriginalExtension();
        $request->curriculumEdit->move(public_path('uploads'), $fileName);
        }

        $record = Alumnes::findOrFail($id);

        $record->nom = $request -> nameEdit;
        $record->cognoms = $request -> surnamesEdit;
        $record->dni = $request -> dniEdit;
        $record->curs = $request -> cursEdit;
        $record->telefon = intval($request -> telefonEdit);
        $record->correu =  $request -> emailEdit;
        $record->idEstudi =  intval($request -> groupEdit);
        if($request -> curriculumEdit != null) $record->cv =  $fileName;
        $record->practiques = $request -> practiquesEdit === "on" ? 1 : 0;
        $record->save();
        return redirect()->back();
    }

    public function addStudent(Request $request){
        $fileName = time().'.'.$request->curriculumAdd->getClientOriginalExtension();
        $request->curriculumAdd->move(public_path('uploads'), $fileName);

        $data = [
            'nom'=>$request->nameAdd,
            'cognoms'=>$request->surnamesAdd,
            'dni'=>$request->dniAdd,
            'curs'=>$request->cursAdd,
            'telefon'=>$request->telefonAdd,
            'idEstudi'=>$request->nameAdd,
            'correu'=>$request->emailAdd,
            'practiques'=>$request -> practiquesAdd === "on" ? 1 : 0,
            'cv'=>($request -> curriculumEdit != null)? $request->cv =  $fileName : ""
        ];
        Alumnes::create($data);
        return "Alumno añadido correctamente";
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
        $student = Alumnes::findOrFail($id);
        $pathToFile = public_path('uploads/'.$student -> cv);
        $header = array(
            'Content-Type: application/pdf',
        );
        if($student -> cv==null || $student -> cv=="") return redirect()->back()->with('error', 'File not found.');
        return response()->download($pathToFile, $student -> cv, $header);
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
