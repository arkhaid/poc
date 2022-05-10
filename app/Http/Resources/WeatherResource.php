<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user' => [
                'id' => $this['user']['id'],
                'first_name' => $this['user']['first_name'],
                'last_name' => $this['user']['last_name'],
                'profile' => $this['user']['profile_picture'],
                'email' => $this['user']['email'],
                'created_at' => $this['user']['created_at'],
                'updated_at' => $this['user']['updated_at'],
            ],
            'main' => [
                'temp' => $this['weather']['main']['temp'],
                'pressure' => $this['weather']['main']['pressure'],
                'humidity' => $this['weather']['main']['humidity'],
                'temp_min' => $this['weather']['main']['temp_min'],
                'temp_max' => $this['weather']['main']['temp_max'],
            ],
        ];
    }
}
