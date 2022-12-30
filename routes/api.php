<?php

use App\Http\Controllers\CarroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/carros", "App\Http\Controllers\CarroController@store");
Route::get("/carros", "App\Http\Controllers\CarroController@index");
Route::delete("/carros/{id}", "App\Http\Controllers\CarroController@destroy");
Route::get("/carros/{id}", "App\Http\Controllers\CarroController@show");
Route::put("/carros/{id}", "App\Http\Controllers\CarroController@update");