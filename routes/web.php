<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', [BookController::class, 'insert']);
Route::get('/update', [BookController::class, 'update']);
Route::get('/delete', [BookController::class, 'delete']);
Route::get('/select', [BookController::class, 'select']);
