<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, "index"])->name("usuarios.index"); 

Route::post('usuarios/create', [HomeController::class, "create"])->name("usuarios.create"); 
Route::post('usuarios/update', [HomeController::class, "update"])->name("usuarios.update"); 
Route::get('usuarios/delete-{id}', [HomeController::class, "delete"])->name("usuarios.delete"); 



