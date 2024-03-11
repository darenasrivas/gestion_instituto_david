<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\Idioma;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    /* Llamamos a un metodo del modelo */
    /* Tb con factory(10), en lugar de encadenar métodos */
    /* each(), metodo que ejecuta cada una de esas 50 veces, ejecutar una funcion con parametro $alumno */
    /* funcion obtener_idiomas, que creeamos */


    private function get_idiomas():array{
        // Referencia al fichero idiomas, e idiomas como elemento
        $idiomas = config ("idiomas.idiomas");
        $idiomas_hablados=[];
        $numero_idiomas = rand(0, 4);
        if ($numero_idiomas==0)
            return [];
        $posiciones_idiomas = array_rand($idiomas, $numero_idiomas);
        if (!is_array($posiciones_idiomas))
            $idiomas_hablados[]=$idiomas[$posiciones_idiomas];
        else
           foreach($posiciones_idiomas as $pos)
                $idiomas_hablados[] = $idiomas[$pos];
        return $idiomas_hablados;
    }

    public function run(): void
    {
        Alumno::factory()->count(20)->create()->each(function($alumno){
            $idiomas_hablados = $this->get_idiomas();
            foreach ($idiomas_hablados as $idioma_hablado){
                $idioma = new Idioma();
                $idioma->idioma=$idioma_hablado;
                $idioma->alumno_id=$alumno->id;
                $idioma->save();
            }
        });
        //
    }
}
