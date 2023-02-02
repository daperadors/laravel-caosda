<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudis extends Model
{
    use HasFactory;
    protected $table = 'estudis';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nom'];

    public function ofertas(){
        return $this->hasMany(Ofertas::class);
    }
    public function alumnes(){
        return $this->hasMany(Alumnes::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }

}
