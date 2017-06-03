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