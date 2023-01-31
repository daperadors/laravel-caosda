<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enviaments extends Model
{
    use HasFactory;
    protected $table = "enviaments";
    protected $primaryKey = "id";
    protected $fillable = ["id", "alumne_id", "oferta_id", "observacions", "estatEnviaments"];
}
