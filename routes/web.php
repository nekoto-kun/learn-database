<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SellingController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', [BookController::class, 'insert']);
Route::get('/select', [BookController::class, 'select']);
Route::get('/update', [BookController::class, 'update']);
Route::get('/delete', [BookController::class, 'delete']);

Route::get('/dissociate', [BookController::class, 'dissociate']);

Route::get('/attach', [BookController::class, 'attach']);
Route::get('/detach', [BookController::class, 'detach']);
Route::get('/sync', [BookController::class, 'sync']);

Route::get('/pivot', [CategoryController::class, 'pivot']);

Route::prefix('/selling')->group(function () {
    Route::get('/select', [SellingController::class, 'select']);
    Route::get('/insert', [SellingController::class, 'insert']);
    Route::get('/update', [SellingController::class, 'update']);
    Route::get('/delete', [SellingController::class, 'delete']);
});

Route::prefix('/author')->group(function () {
    Route::get('/select', [AuthorController::class, 'select']);
    Route::get('/insert', [AuthorController::class, 'insert']);
    Route::get('/update', [AuthorController::class, 'update']);
    Route::get('/delete', [AuthorController::class, 'delete']);
});
