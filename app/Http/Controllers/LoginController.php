<?php

namespace App\Http\Controllers;

use App\Crm\User\Requests\loginRquest;
use Crm\User\Services\loginService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    private loginService $loginService;

    public function __construct(loginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(loginRquest $loginRquest)
    {
        // make event or any Things
        return $this->loginService->login($loginRquest);
    }

}
