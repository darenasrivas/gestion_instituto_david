<x-layouts.layout>

    <div class=" flex flex-col justify-center items-center p-5">
        <div class="card w-1/3 bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Datos del alumno</h2>
                <div class="grid grid-cols-3 gap-3 ">
                    {{--PRimera columna--}}
                    <div>
                        <fieldset class="border border-2">
                            <label for="">Nombre</label>
                            {{$alumno->nombre}}
                            <label for="">Apellidos</label>
                            {{$alumno->apellidos}}
                            <label for="">Dirección</label>
                            {{$alumno->direccion}}
                        </fieldset>
                    </div>
                    {{--Segunda columna--}}
                    <div>
                        <label for="">Teléfono</label>
                        {{$alumno->telefono}}
                    </div>

                    {{--Segunda columna--}}
                    <div>
                        <fieldset>
                            <legend>Idiomas que habla {{$alumno->nombre}}</legend>
                            @foreach($alumno->idiomas as $idioma)
                                <h2>{{$idioma->idioma}}</h2>
                            @endforeach
                        </fieldset>


                    </div>

                </div>


                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Volver</button>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>
