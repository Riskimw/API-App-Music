<?php

use App\Http\Controllers\logincontroller;
use App\Http\Controllers\mahasisw_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[mahasisw_controller::class,'index']);
Route::get('create',[mahasisw_controller::class,'create']);
Route::post('store',[mahasisw_controller::class,'store']);
Route::get('edit{id}',[mahasisw_controller::class,'edit']);
Route::put('update{id}',[mahasisw_controller::class,'update']);
Route::delete('delete{id}',[mahasisw_controller::class,'destroy']);

Route::get('login',[logincontroller::class,'login'])->name('login');
Route::post('proses',[logincontroller::class,'proses']);
Route::post('logout',[logincontroller::class,'logout']);
Route::get('register',[logincontroller::class,'register']);
Route::post('prosesreg',[logincontroller::class,'prosesRegis']);
