<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\backend\NoticiaController;
use App\Http\Controllers\NewsController;
use App\Models\User;
use Illuminate\Http\Request;

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



/*
|--------------------------------------------------------------------------
| Ruta de blogs ("leer mas")
|--------------------------------------------------------------------------
*/
Route::get('/blog/{news}', [NewsController::class, 'news'])->middleware(['auth'])->name('news');
/*
|--------------------------------------------------------------------------
| Ruta de cracion de usuarios sin login
|--------------------------------------------------------------------------
*/
Route::get('/nuevo', [UserController::class, 'index']);
/*
|--------------------------------------------------------------------------
| Post de UserController
|--------------------------------------------------------------------------
*/
Route::post('users', [UserController::class, 'store'])->name('users.store');;
/*
|--------------------------------------------------------------------------
| Delete de usuarios
|--------------------------------------------------------------------------
*/
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');;
/*
|--------------------------------------------------------------------------
| resourse de news
|--------------------------------------------------------------------------
*/
Route::resource('news', NoticiaController::class)
    ->middleware('auth')
    ->except('show');

/*
|--------------------------------------------------------------------------
| Ruta de Noticias
|--------------------------------------------------------------------------
*/

Route::get('/Noticias', [NoticiaController::class, 'noticias'])->name('newss');

/*
|--------------------------------------------------------------------------
|Ruta de Home
|--------------------------------------------------------------------------
*/
Route::get('/', [NoticiaController::class, 'home'])->name('home');

/*
|--------------------------------------------------------------------------
| auth require, para que funcione el autentificador de brezee
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

Auth::routes();