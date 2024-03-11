<x-layouts.layout>
    <div class="flex justify-center pt-5">
        <form action="/profesores" method="post" class="">
            @csrf
            <x-input-label>Nombre</x-input-label>
            <input type="text" name="nombre" placeholder="Ejmp: Pepe" class="input
            input-bordered w-full max-w-xs mb-2" />
            @foreach($errors->get('nombre') as $error)
                <div>
                    {{$error}}
                </div>
            @endforeach
            <x-input-label>Apellido</x-input-label>
            <input type="text" name="apellido" placeholder="Ejmp: Pérez" class="input
            input-bordered w-full max-w-xs mb-2" />
            @foreach($errors->get('apellido') as $error)
                <div>
                    {{$error}}
                </div>
            @endforeach
            <x-input-label>Departamento</x-input-label>
            <input type="text" name="departamento" placeholder="Informatica" class="input
            input-bordered w-full max-w-xs mb-2" />
            @foreach($errors->get('departamento') as $error)
                <div>
                    {{$error}}
                </div>
            @endforeach
            <x-input-label>TLF</x-input-label>
            <input type="text" name="telefono" placeholder="976123456" class="input
            input-bordered w-full max-w-xs mb-2" />
            @foreach($errors->get('telefono') as $error)
                <div>
                    {{$error}}
                </div>
            @endforeach
            <x-input-label>Email</x-input-label>
            <input type="text" name="email" placeholder="are@gmail.com" class="input
            input-bordered w-full max-w-xs mb-2" />
            @foreach($errors->get('email') as $error)
                <div>
                    {{$error}}
                </div>
            @endforeach
            <x-input-label>Dni</x-input-label>
            <input type="text" name="dni" placeholder="17760766M" class="input
            input-bordered w-full max-w-xs mb-2" />
            @foreach($errors->get('dni') as $error)
                <div>
                    {{$error}}
                </div>
            @endforeach
            <div>
                <button type="submit" class="mt-3 p-2 bg-lime-600 text-amber-50">Enviar</button>
            </div>
        </form>
    </div>
</x-layouts.layout>
