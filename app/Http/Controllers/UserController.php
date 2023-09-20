<?php

namespace App\Http\Controllers;

use Crm\User\Models\User;
use Crm\User\Services\UserService;
use Crm\User\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;
    const TOKEN_NAME = 'personal';

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(){
       return $this->userService->index();
    }
    public function show($id){
        return   $this->userService->show($id);
    }
    public function store(UserRequest $request)
    {
        $user = $this->userService->store($request);
        return response()->json([
           'user' => $user ,
            'token'=> $user->createToken(self::TOKEN_NAME)->plainTextToken
        ]);
    }
}
