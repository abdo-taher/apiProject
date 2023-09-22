<?php

namespace App\Http\Api;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Traits\ForwardsCalls;

abstract class Api
{

    use ForwardsCalls;

    protected PendingRequest $http;

    public function __construct()
    {
        $this->http = $this->initialize();
    }

    public function __call( $method,  $params)
    {
        return $this->forwardCallTo($this->http,$method ,$params);
    }

    public abstract function initialize(): PendingRequest;

}
