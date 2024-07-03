<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GetApiController extends Controller
{
    public function getData()
    {
        $url = config('sample_api.api_url').'/posts';
        $method = 'GET';
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        $client = new Client();
        $res = $client->request($method, $url, [
            'headers' => $headers,
        ]);
        $res_code = $res -> getStatusCode();
        if($res_code == 200){
            $res_body = json_decode($res->getBody(), true);
            return view('api.index',[
                'datas' => $res_body
            ]);
        }
        
    }

    public function comment($id){
        $url = config('sample_api.api_url')."/posts/$id/comments";
        $method = 'GET';
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
        $client = new Client();
        $res = $client->request($method, $url, [
            'headers' => $headers
        ]);
        $res_code = $res -> getStatusCode();
        if($res_code == 200){
            $res_body = json_decode($res->getBody(), true);
            return view('api.comment',[
                'datas' => $res_body
                ]);
    }
}
}