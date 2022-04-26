<?php

use App\AnimalFact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UploadImageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

app()->singleton('App\AnimalFact', function($app){
    return new AnimalFact();
});

$t=app()->make('App\AnimalFact');

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

Route::get('/', [
    PostController::class, 'index'
])->middleware(['auth'])->name('posts.index');

Route::middleware(['auth'])->group(function(){
    Route::get('/post', [PostController::class, 'index'])->name('posts.index');
    Route::post('/post', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::put('/savepost/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/animalfact', [PostController::class,'animalFact'])->name('posts.animalFact');

    Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/save/{id}', [CommentController::class, 'update'])->name('comments.update');
    Route::get('/comments/{id}', [CommentController::class, 'page'])->name('comments.page');

    Route::post('/like/{id}', [LikeController::class, 'store'])->name('likes.store');

    Route::get('/notificationdelete/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    Route::get('uploadimage/{id}', [UploadImageController::class, 'index']);
    Route::post('saveimage/{id}', [UploadImageController::class, 'save']);

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');

   
});



require __DIR__.'/auth.php';