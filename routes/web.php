<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ArchivoController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['verified'])->group( function () {
    Route::get('/bienvenida',function(){
        return view('bienvenida');
    });
    Route::get('/contacto',function(){
        return view('contacto');
    });
    Route::get('/inicio',function(){
        $producto = DB::table('productos')->get();
        return view('inicio',compact('producto'));
    });
    Route::get('/archivo_agregar',function(){
        $archivo = DB::table('archivos')->get();
        return view('archivo',compact('archivo'));
    });
});

Route::get('enviar-reporte',[ProductosController::class, 'enviarProductos']);



//Route::get('/productos/editar/{producto}',function($producto = null){
    //return view('inicio');
//});


Route::resource('/productos',ProductosController::class);
Route::post('archivo',[ArchivoController::class,'store'])->name('archivo.store');
Route::get('archivo/{archivo}/descargar',[ArchivoController::class,'descargar'])->name('archivo.descargar');
Route::get('archivo/{archivo}',[ArchivoController::class,'destroy'])->name('archivo.destroy');

//Route::get('/productos',[ProductosController::class,'index']);
//Route::get('/productos/agregar',[ProductosController::class,'create']);
//Route::post('/productos/store',[ProductosController::class,'store']);
//Route::get('/productos/editar/{numero}',[ProductosController::class,'edit']);