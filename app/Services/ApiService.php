<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;

class ApiService
{
  public function getTemplate($uri, $data = ""){
    $token = strval(Auth::user()->getAccessToken()->getIdToken());
    $client = new \GuzzleHttp\Client();
    try {
      $res = $client->request(
            'GET',
            $uri,
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