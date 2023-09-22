<?php

namespace App\Http\Api;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class getStories extends Api
{

    public function initialize(): PendingRequest
    {
        return Http::acceptJson()->baseUrl('https://fakestoreapi.com');
    }

}
