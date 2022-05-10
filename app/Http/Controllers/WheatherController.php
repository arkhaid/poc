<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;
use App\Adapters\IpLocationAdapter;
use App\Http\Resources\HomeResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\WeatherResource;
use Stevebauman\Location\Facades\Location;

class WheatherController extends Controller
{

    private $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index(Request $request){

        $location = new IpLocationAdapter($request->ip());

        $response = [
          'user' => Auth::user(),
          'weather' => $this->weatherService->getWeather($location)
        ];

        if ($request->accepts(['text/html'])) {
            return view('home', ['response' => $response]);
        }

        if ($request->accepts(['application/json'])) {
            return new WeatherResource($response);
        }
        
    }

}
