## DAVID ARENAS

### Creación de un CRUD en Laravel para Gestión de Alumnos y Profesores

#### 1-Instalación de Composer y Laravel:

Instalar Composer y Laravel en el sistema. Descargamos Composer y lo movemos al directorio global, luego actualizar:

````
    curl -s https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer
    composer update
````

Una vez configurado Composer, instalamos Laravel utilizando el instalador:

#### 2-Configuración inicial del Frontend con Laravel Breeze:

Laravel Breeze simplifica la configuración inicial del frontend. Lo instalamos con el siguiente comando:
````
    php artisan breeze:install
    npm install
````
#### 3-Integración de TailwindCSS:

Instalamos y creamos un archivo de configuración de Tailwind vinculandolo al proyecto en el archivo resources/css/app.css:
````
    npm install tailwindcss 
    npx tailwindcss init
````
Incluimos las directivas de TailwindCSS en el archivo app.css
````
    @tailwind base;
    @tailwind components;
    @tailwind utilities;
````
Posteriormente vinculamos el css a la plantilla de Blade pertinente:
````
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
````

#### 1-Inicio del Servidor de Desarrollo:

Ejecutamos el servidor de desarrollo de Laravel y Vite:
````
    php artisan serve &
    npm run dev
````
#### 2-Configuración de la Base de Datos y Generación de Componentes:

Configuramos la base de datos en el archivo .env y generamos los componentes necesarios para el modelo Profesor/Alumno con el siguiente comando:
````
    php artisan make:model Profesor –all
````

Este comando específico genera un modelo llamado Profesor
junto con varios archivos relacionados. Que incluye:

Migración (Migration): Esta migración creará una tabla profesores en la base de datos, que coincidirá con el nombre del modelo en plural y minúsculas, siguiendo las convenciones de nomenclatura de Laravel.

Factoría (Factory): Las factorías son útiles para generar datos de prueba para tus modelos. Laravel crea una factoría ProfesorFactory para el modelo Profesor, lo que te permite generar datos de prueba de manera fácil y rápida.
Además se puede acompañar del uso de la biblioteca Faker, para generar datos de prueba.

Controlador (Controller): Crea un controlador para manejar las acciones CRUD (crear, leer, actualizar y eliminar) relacionadas con el modelo Profesor.

Seeder: Con el que definir los datos, y poblar ccon ellos, la base de datos para los profesores/alumnos.

Modelo (Model): Una clase de PHP para ineteractuar con una tabla de la bd y hacer acciones típicas del CRUD como insertar, borrar, consultar, actualizar.

Request: Para validar y manejar la entrada del usuario antes de procesarla en el controlador.

Policy: Para definir autorizaciones específicas, políticas de autorización personalizadas, para los modelos.

#### 3-Definición de las Rutas:

Definimos las rutas necesarias en el archivo routes/web.php para acceder a las funciones del controlador:
````
    Route::resource('profesores', 'ProfesorController');
````
Para ver las rutas definidas, utilizamos el siguiente comando:
````
    php artisan route:list --path="profesores"
````
#### 4-Ajustes Personalizados:
Realizar los ajustes necesarios, como cambiar el nombre de la tabla asociada al modelo si es necesario. Como en el caso de Profesor/Profesors/Profesores

#### 5-Implementación del CRUD en el Controlador:

Completamos las funciones index, create, store, show, edit, update y destroy en el controlador ProfesorController con la lógica correspondiente para manejar las operaciones CRUD.

#### 6-Creación de Vistas:
Creamos las vistas necesarias dentro de la carpeta resources/views/profesores para mostrar la lista de profesores, el formulario de creación y edición, así como la vista de detalles de un profesor.

#### 7-Generación y Población de la Base de Datos:
Creamos y poblamos la base de datos utilizando las migraciones y seeders:
````
    php artisan migrate:fresh –seed
````
#### 8-Paginación y Modificación del Controlador: 
En el controlador ProfesorController, en el método index(), donde obtenemos la lista de profesores, utilizamos el método paginate() para dividir los resultados en páginas:
````
use App\Models\Profesor;

public function index()
{
$profesores = Profesor::paginate(10); // Paginar cada 10 profesores
return view('profesores.index', compact('profesores'));
}
```
