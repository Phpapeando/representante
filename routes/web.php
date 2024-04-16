<?php

use App\Http\Controllers\SiteRepresentanteController;
use App\Http\Controllers\SiteRepresentanteDocController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SiteRepresentanteController::class, 'index'])->name('representante-index');

//Representantes rotas
Route::get('/representante', [SiteRepresentanteController::class, 'index'])->name('representante-index');
Route::POST('/representante/enviar', [SiteRepresentanteController::class, 'store'])->name('representante-enviar');
Route::get('/representante/obrigado', [SiteRepresentanteController::class, 'obrigado'])->name('representante-obrigado');
Route::get('/representante/erro', [SiteRepresentanteController::class, 'erro'])->name('representante-erro');
Route::get('/representante#contact', [SiteRepresentanteController::class, 'index'])->name('representante-index-contact');


//RepresentanteDoc rotas
Route::POST('/documentos/enviar/{id}', [SiteRepresentanteDocController::class, 'enviar'])->where('id', '[0-9]+')->name('documentos-enviar');
Route::POST('/documento/delete', [SiteRepresentanteDocController::class, 'destroy'])->name('documento-destroy');
Route::POST('/documentos/enviar-documentos/{id?}', [SiteRepresentanteDocController::class, 'enviarDocumentos'])->where('id', '[0-9]+')->name('enviar-documentos');
Route::get('/representante/proxima-etapa/{id?}', [SiteRepresentanteDocController::class, 'index'])->where('id', '[0-9]+')->name('representante-documentos');
Route::get('/representante/proxima-etapa/{id?}'.'#contact', [SiteRepresentanteDocController::class, 'index'])->where('id', '[0-9]+')->name('representante-documentos-contact');