<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('welcome');
   
});

//Muestra el formulario GET
Route::get('/weather-form', [WeatherController::class, 'showForm']);
//Procesa el formulario POST
Route::post('/weather-result', [WeatherController::class, 'posttWeather']);

