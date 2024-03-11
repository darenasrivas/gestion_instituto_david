<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;
use Illuminate\Support\Facades\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* Devuelve x alumnos */
        $alumnos = Alumno::paginate(5);
        /* Recoger el numero de pagina */
        $page = Request::get('page') ?? 1;
        /* Cuando ejecutemos la vista alumnos...vemos todos */
        /* $alumnos = Alumno::all();*/
        /* Devuelvo vista blade de alumnos.listado y le paso tot */
  /*      return view("alumnos.listado",["alumnos"=>$alumnos]);*/
        return view("alumnos.listado",compact("alumnos","page"));

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       /* $page = Request::get('page');*/
/*        $alumnos = Alumno::paginate(5);
        $page = Request::get("page");*/
        return view("alumnos.create");
       /* return view("alumnos.create");*/
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /* Crea un alumnno con todos los valores que el metemos en los campos, guarda, visualiza todos */

    public function store(StoreAlumnoRequest $request)
    {
        $valores = $request->input();
        $alumno = new Alumno($valores);
        $alumno->save();
        $alumnos = Alumno::all();
        session()->flash("status","Se ha creado el alumno $alumno->nombre");
        return view ("alumnos.listado",["alumnos"=>$alumnos]);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view ("alumnos.show", compact("alumno"));
    }

    /**
     * Show the form for editing the specified resource.
     */

    /* Lleva a la vista editar.blade.php */

    public function edit(Alumno $alumno)
    {
        $page = Request::get("page");
        return view ("alumnos.editar",compact("alumno","page"));
/*        return view ("alumnos.editar",["alumno"=>$alumno]);*/
        //
    }

    /**
     * Update the specified resource in storage.
     */

    /* Formulario y alumno a modificar */
    /* Leo los valores del formulario */
    /* Updateo, recojo y enseño vista */

    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {

   /*   $datos_nuevos = $request ->input();
        $alumno->updateOrFail ($datos_nuevos );
        return redirect ("alumnos?page= $page");*/

        $page = Request::get("page");
        $valores = $request->input();
        $alumno->update($valores);
         $alumnos = Alumno::paginate(5);
        session()->flash("status","Se ha actualizado el alumno $alumno->nombre");
/*        return response()->redirectTo(route("alumnos.index",["page"=>$page]));*/
        return view ("alumnos.listado",["alumnos"=>$alumnos, "page"=>$page]);
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    /* Recibe el ID en $alumno */
    public function destroy(Alumno $alumno)
    {

        $alumno->delete();
        $alumnos = Alumno::paginate(5);
        $page = Request::get("page");
        session()->flash("status","Se ha borrado el alumno $alumno->nombre");
        return view ("alumnos.listado",["alumnos"=>$alumnos, "page"=>$page]);
        //
    }
}
