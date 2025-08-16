<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\mahasiswaApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('index',[mahasiswaApiController::class,'index']);
Route::post('store',[mahasiswaApiController::class,'store']);
Route::put('update/{id}',[mahasiswaApiController::class,'update']);
Route::delete('delete/{id}',[mahasiswaApiController::class,'destroy']);
