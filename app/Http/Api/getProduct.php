<?php

namespace App\Http\Api;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class getProduct extends Api
{

    public function initialize(): PendingRequest
    {
       return Http::acceptJson()->baseUrl('https://fakestoreapi.com');
    }

}
