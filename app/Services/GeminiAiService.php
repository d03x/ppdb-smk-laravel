<?php

namespace App\Services;

use GuzzleHttp\Client;

class GeminiAiService
{
    public  $API_ENDPOINT = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent';
    public $API_KEY = 'AIzaSyDXqJyAcckjOBp8J0tBMgOlZ75YdUpzLq4';
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->API_KEY = env('GEMINI_API_KEY');
    }
    public function buildUrlRequest() : string{
        return sprintf("%s?key=%s",$this->API_ENDPOINT,$this->API_KEY);
    }
    public function buatPengumuman(string $command){
        $client = new Client();
        $client->post($this->buildUrlRequest())->getBody();
    }
}
