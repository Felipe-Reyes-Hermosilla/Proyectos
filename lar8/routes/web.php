<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Models\User;

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

Route::get('/noticias', [NewsController::class, 'newss'])->name('newss');
Route::get('/noticias/blog/{news}', [NewsController::class, 'news'])->name('news');

Route::get('/nuevo', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store'])->name('users.store');;
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');;


Route::get('/test', function () {
    $users = User::all()->take(1);

    foreach($users as $user){
        echo " $user->id $user->name $user->email $user->password <br>";
    }

})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/prueba', function () {
    return view('custom_dashboard');
});


