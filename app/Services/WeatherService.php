<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Interfaces\LocationInterface;
use Illuminate\Support\Facades\Cache;

class WeatherService
{
    /**
     * @param string $city
     * @return mixed
     */
    public function getWeather(LocationInterface $location)
    {
        return Cache::remember($location->getCity(), 1, function () use ($location) {
            $key = config('services.openweather_api_key');
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$location->getCity()}&appid={$key}");

            return json_decode($response->body(), true);
        });
    }
}
