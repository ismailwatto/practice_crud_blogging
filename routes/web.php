<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Route::get('/register', [RegisterController::class, 'create']);
Route::post('register/store', [RegisterController::class, 'store'])->name('registerdata');
Route::get('user/index', [RegisterController::class, 'index'])->name('user.read');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('login/store', [LoginController::class, 'store'])->name('logindata');
Route::patch('/users/{user}', [LoginController::class, 'deactivateUser'])->name('deactivateUser');
Route::patch('/users/{user}/activate', [LoginController::class, 'activateUser'])->name('activateUser');
Route::get('logout', [PostController::class, 'logout'])->name('logout');

Route::get('post/create', [PostController::class, 'create'])->name('posts.create');
Route::post('post/store', [PostController::class, 'store'])->name('posts.store');
Route::get('post/index', [PostController::class, 'index'])->name('posts.read');
Route::get('post/{id}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('post/{id}/show', [PostController::class, 'show']);
Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::post('post/{id}/update', [PostController::class, 'update'])->name('posts.update');
