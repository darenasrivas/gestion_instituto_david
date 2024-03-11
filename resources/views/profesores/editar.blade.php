<x-layouts.layout>
    <div class="flex justify-center pt-5">
        <form action="/profesores/{{$profesor->id}}" method="post" class="">
            @csrf
            @method('PUT')
            <x-input-label>Nombre</x-input-label>
            <input type="text" value="{{$profesor->nombre}}" name="nombre" placeholder="Ejmp: Pepe" class="input
            input-bordered w-full max-w-xs mb-2" />
            <x-input-label>Apellido</x-input-label>
            <input type="text" value="{{$profesor->apellido}}" name="apellido" placeholder="Ejmp: Pérez" class="input
            input-bordered w-full max-w-xs mb-2" />
            <x-input-label>Departamento</x-input-label>
            <input type="text" value="{{$profesor->departamento}}" name="departamento" placeholder="Ejmp: Informatica"
                   class="input
            input-bordered w-full max-w-xs mb-2" />
            <x-input-label>TLF</x-input-label>
            <input type="text" value="{{$profesor->telefono}}" name="telefono" placeholder="976123456" class="input
            input-bordered w-full max-w-xs mb-2" />
            <x-input-label>Email</x-input-label>
            <input type="text" value="{{$profesor->email}}" name="email" placeholder="are@gmail.com" class="input
            input-bordered w-full max-w-xs mb-2" />
            <x-input-label>Dni</x-input-label>
            <input type="text" value="{{$profesor->dni}}" name="dni" placeholder="are@gmail.com" class="input
            input-bordered w-full max-w-xs mb-2" />
            <div>
                <button type="submit" class="mt-3 p-2 bg-lime-600 text-amber-50">Actualizar</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
