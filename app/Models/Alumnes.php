<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnes extends Model
{
    use HasFactory;
    protected $table = "alumnes";
    protected $primaryKey = "id";
    protected $fillable = ["id", "nom", "cognoms", "dni", "curs", "cicle", "telefon", "correu", "practiques", "cv"];
    public function tutorEmpresa(){
        return $this->hasOne(Empresas::class);
    }
    public function ofertas(){
        return $this->belongsToMany(Ofertas::class, 'enviaments');
    }

}
