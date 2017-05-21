<?php
use Illuminate\Support\Facades\Cache;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return View::make('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/post/5/loquequiera', function () {
    return view('about');
});
Route::get('/post/{n}/{s}', function ($n,$s) {
    return "Esta es la temporada ".$n." de la serie ".$s;
});
Route::get('admin/poster/example',array('as' => 'admin.home', function(){
    $url=route('admin.home');
    return "this url is ". $url;
}));
Route::get('about-page',function(){
    return view('other.about');
})->name('other.about');
Route::get('/cache', function (){
    return Cache::get('key');
});


Route::group(['prefix' => 'pruebasagrupaciones'], function() {
    //grupo de enrutamientos    
    
    Route::get('/', function() {
        return view('pruebas.index');
    })->name("pruebas.index");
    Route::get('/uno', function() {
        return view('pruebas.uno');
    })->name("pruebas.uno");
});

//probando git en vscode

Route::group(['prefix' => 'Blog'], function() {
    //grupo de enrutamientos    
    
    Route::get('/', function() {
        return "<h1>Holi desde el index del blog</h1>"; //acepta etiquetas
    })->name("Blog.index");    
    
    Route::get('/Comments', 'Blog\CommentController@index')->name("Blog.comments");
    
});

//Route::get('Blog/Comments', 'Blog\CommentController@index');