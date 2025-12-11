<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    //Función para mostrar el formulario
    public function showForm(){
        return view('weather-form');
    }

    //Función que procesa el formulario y muestra el resultado
    public function posttWeather(Request $request){
        $city=$request->input('city');
        $pais=$request->input('pais');
        $region=$request->input('region');

        $baseUrl=config('services.weatherapi.url');
        $apikey=config('services.weatherapi.key');

        //Iniciamos location con el valor que el usuario ha puesto en ciudad
        $location=$city;
        if($region)$location.=", $region";
        if($pais)$location.=", $pais";
        //Realizamos la consulta a la api weatherapi
        $response=Http::get("$baseUrl/current.json", [
            'key' => $apikey,
            'q' => $location,
            'lang' => 'es'
        ]);
        
        $data=$response->json();

        $localtime=$data['location']['localtime'];
        $hour=date('H', strtotime($localtime));
        $isNight=($hour < 6 || $hour >= 18);

        //Determinar la clase CSS según la condición climática
        $condition=strtolower($data['current']['condition']['text'] ??'');
        $weatherClass='weather-sunny'; //Clase por defecto

            if (str_contains($condition, 'solead') || str_contains($condition, 'despej') || str_contains($condition, 'clar')) {
            $weatherClass =$isNight ? 'weather-clear-night' :  'weather-sunny';
        } elseif (str_contains($condition, 'nubl') || str_contains($condition, 'parcialm') || str_contains($condition, 'cubiert')) {
            $weatherClass =$isNight ? 'weather-cloudy-night' : 'weather-cloudy';
        } elseif (str_contains($condition, 'lluv') || str_contains($condition, 'chubasc')) {
            $weatherClass =$isNight ? 'weather-rainy-night' : 'weather-rainy';
        } elseif (str_contains($condition, 'torment')) {
            $weatherClass =$isNight ? 'weather-stormy-night' : 'weather-stormy';
        } elseif (str_contains($condition, 'nev')) {
            $weatherClass =$isNight ? 'weather-snowy-night' : 'weather-snowy';
        }
        
        return view ('weather-result', ['data' => $data, 'weatherClass' => $weatherClass]);
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
