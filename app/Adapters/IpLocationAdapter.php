<?php

namespace App\Adapters;

use App\Interfaces\LocationInterface;
use Stevebauman\Location\Facades\Location;

class IpLocationAdapter implements LocationInterface
{
    private $ip;
    
    public function __construct($ip)
    {
        if($ip === '127.0.0.1'){
            $this->ip = '178.62.200.218';
        }else{
            $this->ip = $ip;
        }
    }

    private function getCityFromIp(){
        $position = Location::get($this->ip);
        return $position->cityName;
    }

    public function getCity()
    {
        return $this->getCityFromIp();
    }
}