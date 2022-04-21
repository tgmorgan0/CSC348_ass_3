<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::middleware(['auth'])->group(function(){
    Route::put('/post/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/post', [PostController::class, 'index'])->name('posts.index');
    Route::post('/post', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';