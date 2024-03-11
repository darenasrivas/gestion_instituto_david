<x-layouts.layout>
    <div class="flex justify-center pt-5">
        <form action="/alumnos" method="post" class="">
            @csrf
            <x-input-label>Nombre</x-input-label>
            <input type="text" name="nombre" placeholder="Ejmp: Pepe" class="input
            input-bordered w-full max-w-xs mb-2" />
            <x-input-label>Apellido</x-input-label>
            <input type="text" name="apellido" placeholder="Ejmp: Pérez" class="input
            input-bordered w-full max-w-xs mb-2" />
            <x-input-label>Dirección</x-input-label>
            <input type="text" name="direccion" placeholder="Ejmp: C/Del Roble" class="input
            input-bordered w-full max-w-xs mb-2" />
            <x-input-label>TLF</x-input-label>
            <input type="text" name="telefono" placeholder="976123456" class="input
            input-bordered w-full max-w-xs mb-2" />
            <div>
                <button type="submit" class="mt-3 p-2 bg-lime-600 text-amber-50">Enviar</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
