<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProfesorController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Cuando recibo una solicitud de ruta main, visualiza una pagina/vista llamada main
// Si es view, es una solicitud por get

Route::view('main', 'main');

Route::view('/','prueba');

Route::view('productos','prueba2');

// Las vistas solicitadas están en resources/views

// 1. Maneras de visualizar
// Cuando me solicitan por get, algo, devuelvo una funcion (retorna) una vista

// Alternativa para renombrar las rutas. Referenciamos las rutas. (por url o nombre de la ruta)
Route::get('/', function () {
    return view('prueba');
})->name("index");



// 2.
// Lo mismo con funcion anonima

Route::get("main", fn()=>view ("main"));

// 3.
// Lo mas usual, hacerlo por controladores
// Ejecuto un método que va a devolver una clase

Route::get("main", [MainController::class=>"index"]);

// CRUD ROUTES SOLICITUDES

// Route::get("alumnos", AlumnoController::class, "index");
// Route::post("alumnos", AlumnoController::class, "store");

// Automaticamente lo podemos hacer con:
// La ruta está especificada arriba en use

Route::resource("alumnos", AlumnoController::class);

// Método resource. Que crea todas las solicitudes posibles para acceder a un recurso.
// Ver arriba el namespace de ProfesorCOntroller - LA ruta
// ante la solicitud profesores, ejecuta este metodo con este controlador

Route::resource("profesores", ProfesorController::class);

// EJEMPLOS de distintas rutas para gestionar mi CRUD. Habria varias.
// LARAVEL con resource, crea todas las rutas. create, edit, update, show......

// Cuando solicite por get, ejecuta el metodo create
// Route::get("alumnos/{alumno}", `[ProfesorController::class, "edit"])


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
