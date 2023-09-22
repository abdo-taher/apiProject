<?php

namespace App\Http\Controllers;

use App\Http\Api\getProduct;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Traits\ForwardsCalls;

class teatApiController extends Controller
{

    // this is An idea to bring the Api and for develop

    public function index(){
        $data = (new getProduct)->get('products');
        return $data;
    }

}
