# PracticasLaravel
Curso de laravel

Tokenizar.- cada que genere un html genera un id unico que cambia siempre y se guarda en session

<h1>Instalacion:</h1>
</h3>Descargar Composer.</h3>
comprobar instalacion del composer(coimposer -version)
instalar laravel(composer global require "laravel/installer")
ir a la carpeta del proyecto y ejecutar (composer create-project --prefer-dist laravel/laravel)

levantar un servidor virtualizado:
ir a la carpeta que genero el laravel y ejecutar el comando (php artisan serve)

21052017

listar las routas ir a la carpeta de laravel: php artisan route:list
endpoint todo aquel servicio en el que pueda acceder y consumir un objeto
4 areas:configuracion, administracion, interfaz de usuario, web services
crear un controlador (php artisan make:controller carpeta/controlador)
crea un controlador con  los recursos: php artisan make:controller --resource Blog/BlogController


Laravel vistas 
identificar master layout(app.blade.php)
para renderizar contenido se utiliza 
<code>@yield('key')</code>
donde key es el clave del contenido a cargar
en la hoja hija se definen las llaves con sus respectivos contenidos
<code>
@section('key')
<div>
   <h1>Contenido</h1>
   <hr>
   <p>Se define contenido</p>
</div>
@endsection()
</code>

<h1>Laravel Engine</h1>
<code>create table laravel_cms</code>
<h3>Content Management Sistem</h3>
php artisan migrate->para migrar
php artisan migrate:rollback

si me marca error la migracion debo modificar el archivo AppServiceProviver.php
importar fachada
<code>use Illuminate\Support\Facades\Schema;</code>
y agregar dentro del boot la siguiente linea
<code>Schema::defaultStringLength(191);</code>
despues se hace un rollback para regresar a un estado anterior al error y despues reintentar la migracion