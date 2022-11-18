<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SellingController;
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

Route::get('/insert', [App\Http\Controllers\BookController::class, 'insert']);
Route::get('/select', [App\Http\Controllers\BookController::class, 'select']);
Route::get('/update', [App\Http\Controllers\BookController::class, 'update']);
Route::get('/delete', [App\Http\Controllers\BookController::class, 'delete']);

Route::get('/dissociate', [App\Http\Controllers\BookController::class, 'dissociate']);

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
