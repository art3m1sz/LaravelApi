<?php

use Illuminate\Support\Facades\Route;


// Aliasing the Request class to avoid name collision
use Illuminate\Http\Request as HttpRequest; 

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\UserController;

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::get('/logs', [LogsController::class, 'index']);
Route::get('/logs/{id}', [LogsController::class, 'show']);
Route::post('/logs', [LogsController::class, 'store']);
Route::put('/logs/{id}', [LogsController::class, 'update']);
Route::delete('/logs/{id}', [LogsController::class, 'destroy']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user', [UserController::class, 'store']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);

// Route::apiResource('categories', CategoryController::class);
// Route::apiResource('products', ProductController::class);


// Route::middleware('auth:sanctum')->get('/user', function (HttpRequest $request) {
//     return $request->user();
// });

