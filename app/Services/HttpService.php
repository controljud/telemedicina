<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

abstract class HttpService 
{
    protected $url;
    protected $headers;

    public function get($endpoint, $vars = null)
    {
        $query = '';

        $firstData = true;
        if ($vars) {
            foreach($vars as $key => $value) {
                $symbol = '&';
                if ($firstData) {
                    $symbol = '?';
                    $firstData = false;
                }

                $query .= $symbol . $key . '=' . $value;
            }
        }
        
        $response = Http::withHeaders($this->headers)
            ->get($this->url . $endpoint . $vars);

        return $this->getResponse($response);
    }

    public function post($endpoint, $data)
    {
        $response = Http::withHeaders($this->headers)
            ->post($this->url . $endpoint, $data);
        
        return $this->getResponse($response);
    }

    public function getResponse($response)
    {
        if ($response->status() == Response::HTTP_OK) {
            return $response->json();
        } else {
            $message = $response->status() . ' --> ' . Response::$statusTexts[$response->status()];
            Log::error('SERVICE ERROR: ' . $message);
            
            return $message;
        }
    }
}