<?php

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');

Route::post('/post', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

Route::middleware('auth')->group(function(){
    
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');


    Route::get('admin/comments', [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');

    Route::patch('comments/{comment}/update', [App\Http\Controllers\CommentController::class, 'update'])->name('comment.update');
    
    Route::delete('/comments/{comment}/destroy', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.destroy');

    Route::get('admin/comment/replies', [App\Http\Controllers\ReplyController::class, 'index'])->name('replies.index');

});


