<?php
require_once 'rest-client.php';

$weatherDataEndpoint = 'http://dataservice.accuweather.com/';
$weatherDataAPIKey = 'YOUR-API-KEY';

class Weather
{
    public function getLocation($query) {
        global $weatherDataEndpoint, $weatherDataAPIKey;
        $searchUrl = "${weatherDataEndpoint}locations/v1/search?apikey=$weatherDataAPIKey&q=$query";
        return get($searchUrl, array())[0];
    }

    public function getCurrentWeather($locationKey) {
        global $weatherDataEndpoint, $weatherDataAPIKey;
        $currentWeatherUrl = "${weatherDataEndpoint}/currentconditions/v1/$locationKey?apikey=$weatherDataAPIKey";
        return get($currentWeatherUrl, array())[0];
    }

}