<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnes extends Model
{
    use HasFactory;
    protected $table = "alumnes";
    protected $primaryKey = "id";
    protected $fillable = ["id", "nom", "cognoms", "dni", "curs", "telefon", "correu", "practiques", "cv"];

    /*public function tutors(){
        return $this->belongsTo(User::class);
    }*/
    public function estudis(){
        return $this->belongsTo(Estudis::class);
    }
    public function ofertas(){
        return $this->belongsToMany(Ofertas::class, 'enviaments', 'alumne_id', 'oferta_id');
    }
}
