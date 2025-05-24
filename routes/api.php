<?php

use App\Http\Controllers\CeritaController;
use App\Http\Controllers\DatasetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/datasets', [DatasetController::class, 'index']);
Route::get('/ceritas', [CeritaController::class, 'index']);