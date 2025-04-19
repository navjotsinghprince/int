<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post("login", [LoginController::class, 'login']);


Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('categories', [CategoryController::class, 'getCategories']);
    Route::post('categories', [CategoryController::class, 'categories']);
    Route::put('categories/{id} ', [CategoryController::class, 'updateCategory']);
    Route::delete('categories/{id} ', [CategoryController::class, 'deleteCategory']);


    Route::get('posts', [PostController::class, 'getPosts']);
    Route::get('posts/{id}', [PostController::class, 'getpost']);
    Route::post('posts', [PostController::class, 'posts']);
    Route::put('posts/{id} ', [PostController::class, 'updatePost']);
    Route::delete('posts', [PostController::class, 'deletePost']);
});
