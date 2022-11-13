<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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


//classe - metodo estatico - callback
Route::get('/', function () {
    return view('principal');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//route model binding
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');

Route::post('/imagenes',[ImagenController::class, 'store'])->name('imagenes.store');

Route::post('/posts',[PostController::class, 'store'])->name('posts.store');





// Route::get('/muro', [LoginController::class, 'index'])->name('post.index');



// Route::get('/tienda', function () {
//     return view('tienda');
// });
