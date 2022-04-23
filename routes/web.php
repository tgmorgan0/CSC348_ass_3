<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UploadImageController;

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
    Route::get('/post', [PostController::class, 'index'])->name('posts.index');
    Route::post('/post', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::put('/savepost/{id}', [PostController::class, 'update'])->name('posts.update');

    Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/save/{id}', [CommentController::class, 'update'])->name('comments.update');

    Route::post('/like/{id}', [LikeController::class, 'store'])->name('likes.store');
    //Route::post('/notification', [NotificationController::class, 'store'])->name('notifications.store');

    Route::get('/notificationdelete/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    Route::get('uploadimage/{id}', [UploadImageController::class, 'index']);
    Route::post('saveimage/{id}', [UploadImageController::class, 'save']);

});



require __DIR__.'/auth.php';