<?php

namespace App;
use Illuminate\Support\Facades\Http;

class AnimalFact
{
    private $apiKey;

    public function __construct(){
    }

    static function getFact(){
        $response = Http::get('https://dog-api.kinduff.com/api/facts');
        $facts = json_decode($response->body());
        $fact_text= $facts->facts[0];
        return $fact_text;
    }
}