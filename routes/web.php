<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('posts.index'); // Show all posts
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show'); // Show a single post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); // Form to create a new post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Store a new post
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit'); // Form to edit a post
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update'); // Update a post
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy'); // Delete a post

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
