<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

Route::middleware(['cacheResponse:posts'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('homepage');
    Route::get('post/{post}', [HomeController::class, 'post'])->name('post.view');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('dashboard');
    Route::get('/post/create',[PostController::class, 'create'])->name('post.create');
    Route::post('/post/save',[PostController::class, 'save'])->name('post.save');
});

require __DIR__.'/auth.php';
