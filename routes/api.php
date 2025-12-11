<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;


//API para obtener el clima actual de una ciudad    
Route::get('/weather/{city}', [WeatherController::class, 'getWeather']);
