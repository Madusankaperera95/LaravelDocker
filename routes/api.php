<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('student',[\App\Http\Controllers\StudentController::class,'store']);

Route::post('user',[\App\Http\Controllers\UserController::class,'store']);

Route::post('user/change-password',[\App\Http\Controllers\UserController::class,'changePassword']);




