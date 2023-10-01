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

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController; // 必要に応じてこの行を追加
use App\Http\Controllers\MyController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminController;




Route::get('/', [LoginController::class, 'index']);
Route::get('top', [LoginController::class, 'top']);
Route::post('login', [LoginController::class, 'login']);
Route::get('mypage', [LoginController::class, 'mypage']);
Route::get('new', [UserController::class, 'new']);
Route::get('new_ok', [UserController::class, 'new_ok']);
Route::post('new_ok', [UserController::class, 'new_ok']);


// 投稿
Route::post('/post', [PostController::class, 'store']);  // Laravel 8.x以降の書き方

//テスト
Route::get('/test/{id}/image', [PostController::class, 'test']);
//マイページ
Route::get('myregi', [MyController::class, 'myregi']);

Route::get('admin', [AdminController::class, 'admin']);

Route::get('like_list', [PostController::class, 'like_list']);

Route::post('myup', [MyController::class, 'myup']);

// 
Route::post('/like', [LikeController::class, 'likePost']);

Route::get('/posts_by_user/{id}', [AdminController::class, 'postsByUser'])->name('posts_by_user');

Route::delete('/delete_user/{id}', [UserController::class, 'delete'])->name('delete_user');

Route::delete('/post/{id}', [AdminController::class, 'delete'])->name('delete_post');

Route::post('/post/edit', [PostController::class, 'edit'])->name('edit_post');


Route::get('other/{user_id}', [MyController::class, 'user'])->name('other');



