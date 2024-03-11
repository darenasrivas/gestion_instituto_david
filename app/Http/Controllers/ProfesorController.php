<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfesorRequest;
use App\Http\Requests\UpdateProfesorRequest;
use App\Models\Profesor;
use Illuminate\Support\Facades\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* Cuando ejecutemos la vista alumnos...*/
       /* $profesores = Profesor::all();*/
        $profesores = Profesor::paginate(5);
        $page = Request::get('page') ?? 1;
        /* Devuelvo vista blade de alumnos.listado y le paso tot */
        return view("profesores.listado",compact("profesores","page"));

        /*        return view("profesores.listado",["profesores"=>$profesores]);*/
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("profesores.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    //StoreProfesorRequest es una clase en particular

    //Doy de alta, recupero y doy una vista con todos los profesores
    //Flash() genera una variable de sesion de un solo uso. Variable de sesion llamada status
    //Variable de sesion STATUS. De un solo uso. Con el valor "Se ha creado..."

    public function store(StoreProfesorRequest $request)
    {
        $valores = $request->input();
        $profesor = new Profesor($valores);
        $profesor->save();
        $profesores = Profesor::all();
        session()->flash("status","Se ha creado el profesor $profesor->nombre");
        return view ("profesores.listado",["profesores"=>$profesores]);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * no funciona edit(Profesor $profesor), por que la tabla Profesor, no existe.
     * Utilizando el modelo profesor, utilizamos un método find, que localiza un profesor cuya clave coincida con el ID
     */
    public function edit($id)
    {
        $profesor = Profesor::find($id);
        return view ("profesores.editar",["profesor"=>$profesor]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfesorRequest $request, $id)
    {
        $profesor = Profesor::find($id);
        $valores = $request->input();
        $profesor->update($valores);
        $profesores = Profesor::all();
        session()->flash("status","Se ha actualizado el profesor $profesor->nombre");
        return view ("profesores.listado",["profesores"=>$profesores]);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profesor = Profesor::find($id);
        $profesor->delete();
/*        $profesores = Profesor::all();*/
        $profesores = Profesor::paginate(5);
        session()->flash("status","Se ha borrado el profesor $profesor->nombre");
        return view ("profesores.listado",["profesores"=>$profesores]);
        //
    }
}
