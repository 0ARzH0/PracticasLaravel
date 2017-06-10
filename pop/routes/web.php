<?php
use Illuminate\Support\Facades\Cache;
use App\Tag;
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
    })->name("Blog.Index");    
    
    Route::get('/Comments', 'Blog\CommentController@index')->name("Blog.Comments");
    Route::get('/Post/{id}', 'Blog\PostController@index')->name("Blog.Post");
    
});

//Route::get('Blog/Comments', 'Blog\CommentController@index');

Route::resource('generaRecursos', 'prueba\controlador');

Route::get('formulario', function() {
    //formulario
    return view("form");
});
Route::get('formulario/{item}', 'Blog\PostController@ShowPost')->name("Blog.PostShow");

Route::get('/render', function () {
    //return view('app');
    return view('Home\contact');
});

Route::get('/comments/insert', function () {
    //return view('app');
    DB::insert('insert into tbl_comments (commentID, postID, content, status, created_at, updated_at, usuarioID, email, url) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', ['','1','Holi desde insert','A','','','1','algo@mail.com','www.algo.com']);
});

Route::get('/tags/insert', function () {
    //return view('app');
    DB::insert('insert into tags (name, frequency, created_at, updated_at) values (?, ?, ?, ?)', ['Holi','A','2017-06-10 9:10:10','2017-06-10 9:10:11']);
});

Route::get('/tags/select', function () {
    $x = DB::SELECT('SELECT * from tags WHERE tagID = ?', [3]);    
    $nombre;
    foreach ($x as $d) {
        $nombre=$d->name;
    }
    return $nombre;
});

Route::get('/tags/update', function () {
    //return view('app');
    $x=DB::update('UPDATE tags set name = "Holi actualizado" WHERE tagID=?',[3]);
    return ($x?"Exitoso":"No cambea");
});

Route::get('/tags/delete', function () {
    //return view('app');
    $x=DB::delete('DELETE FROM tags WHERE tagID=?',[2]);
    return ($x?"Listo":"No chambea");
});

//------Eloquent------
Route::any('/readeloquent', function() {
    $X = Tag::all();
    foreach ($X as $d) {
        echo "TagID: ".$d->tagID.", Nombre: ".$d->name."<br>";
    }
});


Route::any('/find/{tagID}', function($tagID) {
    //
    $tag=Tag::where('tagID',$tagID)->orderBy('tagID','asc')->take(1)->get();    
    foreach ($tag as $d) {
        echo $d->name;
    }
    echo "\n";
    return $tag;
});

Route::any('basicinsert/{name},{fr}', function($name,$fr) {
    //echo $id." ".$name;
    $Tag = new Tag;
    $Tag->name=$name;
    $Tag->frequency=$fr;
    $Tag->save();
});
Route::any('basicinsert2/{tagID},{name},{fr}', function($tagID,$name,$fr) {
    //Pendiente- ahora debo borrar el dato y despues crear uno nuevo con los datos del anterior
    $Tag = Tag::where('tagID',$tagID)->get();
    $d->tagID=$tagID;
    $d->name=$name;
    $d->frequency=$fr;
    $d->save();
});


Route::any('/createmass', function() {
    //Cuando nosotros queremos insertar algo como un array asociativo
    //nos sale el error MassAssignamenException
    //para reparar el error se modifica el modelo con la propiedad fillable
    Tag::create(['name'=>'Angel','frequency'=>'activate']);
});


Route::any('/updateeloquent/{tagID},{name}', function($tagID,$name) {
    //Actualizar registros
    Tag::where('tagID',$tagID)->update(['name'=>$name]);
});


Route::any('/destroy/{tagID}', function($tagID) {
    //Eliminar registros
    //Tag::destroy($tagID); Tag::destroy([$tagID1,$tagID2,$tagID3]); cuando el identificador es id si tiene otro nombre es con el where
    Tag::where('tagID',$tagID)->delete();
});

Route::any('/selectPDO/{tagID}', function($tagID) {
    //Select
    return Tag::where('tagID',$tagID)->get();
});
Route::any('/selectSoftDeletedPDO', function() {
    //trae los registros borrados
    return Tag::onlyTrashed()->get();
});

Route::any('/restoreSoftDeletes', function() {
    //reestablece los que estan borrados logicamente
    Tag::withTrashed()->restore();
});

Route::any('/forcedelete', function() {
    //Borrado forzoso para los que estan nborrados logicamente
    Tag::withTrashed()->where('tagID',11)->forceDelete();
});









