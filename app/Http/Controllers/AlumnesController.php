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
use Illuminate\Support\Facades\Storage;

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
        return redirect()->back()->with('status', "alert-success")->with('value', "User ".$request -> nameEdit." updated.");
    }

    public function addStudent(Request $request){

        if($request->curriculumAdd != null || $request->curriculumAdd != ""){
            $fileName = time().'.'.$request->curriculumAdd->getClientOriginalExtension();
            $request->curriculumAdd->move(public_path('uploads'), $fileName);
        }
        $curriculum = "";
        if(!is_numeric($request->mobileAdd) || is_null($request->groupAdd) || $request->groupAdd == "") return redirect()->back()->with('status', "alert-danger")->with('value', "Unexpected error creating user");
        if($request -> curriculumAdd != null) $curriculum =  $fileName;
        $data = [
            'nom'=>$request->nameAdd,
            'cognoms'=>$request->surnamesAdd,
            'dni'=>$request->dniAdd,
            'curs'=>$request->cursAdd,
            'telefon'=>$request->mobileAdd,
            'idEstudi'=>intval($request->groupAdd),
            'correu'=>$request->emailAdd,
            'practiques'=>$request -> practiquesAdd === "on" ? 1 : 0,
            'cv'=> $curriculum
        ];
        Alumnes::create($data);
        return redirect()->back()->with('status', "alert-success")->with('value', "User ".$request->nameAdd." created.");
    }
    public function deleteAlumne($id){
        Schema::disableForeignKeyConstraints();
        $alumne = Alumnes::findOrFail($id);
        $alumne->delete();
        Schema::enableForeignKeyConstraints();
        return Redirect::to('students')->with('status', "alert-warning")->with('value', "User ".$alumne -> nom." deleted.");
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
        $fileExists = public_path().'\uploads\\'.$student -> cv;
        if($student -> cv==null || $student -> cv=="" || !is_file($fileExists)) return redirect()->back()->with('status', "alert-danger")->with('value', "File not found");
        return response()->download($pathToFile, $student -> cv, $header);
        //return down
        //return Response::download($file);
    }




    public function index(){
        if(Auth::user()->coordinator === 1){
            $groupsInfo = Estudis::all();
            $groups = Estudis::where('id' ,'>' ,0)->pluck('id')->toArray();
            $students= Alumnes::addSelect(['groupname' => Estudis::select('nom') -> whereColumn('id', 'alumnes.idEstudi')])
                ->whereIn('idEstudi', $groups)->paginate(5);
            return view('students', compact('students', 'groupsInfo'));
        }
        $groupsInfo = Estudis::where('id' ,'=' ,Auth::user()->group)->get();
        $groups = Estudis::where('id' ,'=' ,Auth::user()->group)->pluck('id')->toArray();
        $students= Alumnes::addSelect(['groupname' => Estudis::select('nom') -> whereColumn('id', 'alumnes.idEstudi')])
            ->whereIn('idEstudi', $groups)->paginate(5);
        return view('students', compact('students', 'groupsInfo'));
    }
}
