<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/a24/register', [AuthController::class, 'register'])->name('register');
Route::post('/a24/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/a24/auth/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
