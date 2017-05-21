<?php

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
    return view('welcome');
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