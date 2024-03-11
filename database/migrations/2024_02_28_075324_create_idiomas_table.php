<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * CascadeOndelete, borra los idiomas del alumno si borro el alumno.
     * la referencia también se puede hacer: $table->foreignId("alumno_id")->constrained(); Donde hace referencia a
     * la id de la tabla alumno en singular, separado por _
     * De la otra manera, el nombre del campo podemos ponerselo como quiera no tiene porque ser alumno_id
     */
    public function up(): void
    {
        Schema::create('idiomas', function (Blueprint $table) {
            $table->id();
            $table->string("idioma");
//            $table->foreign("alumno_id")->references("id")->on("alumnos")->cascadeOnDelete();
            $table->foreignId("alumno_id")->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idiomas');
    }
};
