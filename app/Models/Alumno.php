<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Nivel de seguridad, solo permito recoger esos campos al introducirlos y enviar */
class Alumno extends Model
{
    use HasFactory;
    protected $fillable = ["nombre","apellido","direccion","telefono"];
    public function idiomas(){
        return $this->hasMany(Idioma::class);
    }
}
