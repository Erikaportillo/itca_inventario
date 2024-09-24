<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () { return view('home'); 
    }); 
    // Ruta para mostrar la vista show.blade.php
Route::get('/products/show', [ProductController::class, 'index']); 
    // Ruta para mostrar la vista create.blade.php
Route::get('/products/create', [ProductController::class, 'create']);
    // Ruta para mostrar la vista update.blade.php
Route::get('/products/edit/{product}', [ProductController::class, 'edit']); 
// Ruta para insertar producto
Route::post('/products/store', [ProductController::class, 'store']); 
// Ruta para modificar producto
Route::put('/products/update/{product}', [ProductController::class, 'update']); 
// Ruta para eliminar producto
Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy']);

Route::get('/cliente/show', [ClienteController::class, 'index']); 
    // Ruta para mostrar la vista create.blade.php
Route::get('/cliente/create', [ClienteController::class, 'create']);
    // Ruta para mostrar la vista update.blade.php
Route::get('/cliente/edit/{cliente}', [ClienteController::class, 'edit']); 
// Ruta para insertar cliente
Route::post('/cliente/store', [ClienteController::class, 'store']); 
// Ruta para modificar 
Route::put('/cliente/update/{cliente}', [ClienteController::class, 'update']); 
// Ruta para eliminar 
Route::delete('/cliente/destroy/{id}', [ClienteController::class, 'destroy']);

Route::get('/cliente', "App\Http\Controllers\ClienteController@index");


Route::get('/categoria/show', [CategoriaController::class, 'index']); 
    // Ruta para mostrar la vista create.blade.php
Route::get('/categoria/create', [CategoriaController::class, 'create']);
    // Ruta para mostrar la vista update.blade.php
Route::get('/categoria/edit/{categoria}', [CategoriaController::class, 'edit']); 
// Ruta para insertar categoria
Route::post('/categoria/store', [CategoriaController::class, 'store']); 
// Ruta para modificar 
Route::put('/categoria/update/{categoria}', [CategoriaController::class, 'update']); 
// Ruta para eliminar 
Route::delete('/categoria/destroy/{id}', [CategoriaController::class, 'destroy']);

Route::get('/categoria', "App\Http\Controllers\CategoriaController@index");


Route::get('/product', "App\Http\Controllers\ProductController@index");