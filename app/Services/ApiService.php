<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use Auth;

class ApiService
{
    public function getTemplate($uri, $data = ""){
        $token = strval(session('oidc-auth.access_token')->getIdToken());
        $client = new \GuzzleHttp\Client();
        try {
        $res = $client->request(
                'GET',
                $uri . $data,
                [
                    'verify' => false,
                    'headers' => [
                        'Authorization' => 'Bearer ' . $token,
                        'Accept'        => 'application/json',
                    ]
                ]
        )->getBody()->getContents();            
            return $res;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            throw new Exception($e);  
        }
    }
    public function postTemplate($uri, $data){

    }
}