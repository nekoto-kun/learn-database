<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SellingController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/book')->group(function () {
    Route::get('/insert', [BookController::class, 'insert']);
    Route::get('/update', [BookController::class, 'update']);
    Route::get('/delete', [BookController::class, 'delete']);
    Route::get('/select', [BookController::class, 'select']);
    Route::get('/restore', [BookController::class, 'restore']);
});

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
