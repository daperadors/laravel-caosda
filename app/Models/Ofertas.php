<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ofertas extends Model
{
    use HasFactory;
    protected $table = 'ofertas';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'descripcio','numVacants','curs','nomContacte','cognomContacte','correuContacte'];

    public function empresa() {
        return $this->belongsTo(Empresas::class, 'idEmpresa', 'id');
    }

    public function estudi() {
        return $this->belongsTo(Empresas::class, 'idCicle', 'id');
    }

    public function alumnos() {
        return $this->belongsToMany(Alumnes::class, 'enviaments');
    }

}
