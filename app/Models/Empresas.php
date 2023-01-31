<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;
    protected $table = 'empresas';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nom','adreça','telefon','correu'];

    public function alumne(){
        return $this->hasMany(Alumnes::class);
    }

    public function ofertas(){
        return $this->hasMany(Ofertas::class);
    }


}
