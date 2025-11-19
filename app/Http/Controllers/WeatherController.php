<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{

    public function showForm(){
        return view('weather-form');
    }

    //Procesa el formulario post
    public function posttWeather(Request $request){
        $city=$request->input('city');
        $baseUrl=config('services.weatherapi.url');
        $apikey=config('services.weatherapi.key');

        $response=Http::get("$baseUrl/current.json", [
            'key' => $apikey,
            'q' => $city,
            'lang' => 'es'
        ]);

        return view ('weather-result', ['data' => $response->json()]);

    }

    //Función para obtnener el clima actual de una ciudad vía API

    public function getWeather($city){
        $baseUrl=config('services.weatherapi.url');
        $apikey=config('services.weatherapi.key');

        $response=Http::get("$baseUrl/current.json", [
            'key' => $apikey,
            'q' => $city,
            'lang' => 'es'
        ]);

        return response()->json($response->json());
    }
}
