<?php

namespace Crm\User\Services;

use App\Crm\User\Requests\loginRquest;
use Crm\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class loginService
{
    public function login(loginRquest $loginRquest)
    {
        if (Auth::attempt(['email'=>$loginRquest->email,'password'=>$loginRquest->password])) {
            $user = Auth::user();
            return response()->json([
                'token' => $user->createToken('Dj')->plainTextToken,
                'name' => $user->name,
                'status' => 'Success'
            ]);

        }else{
            return  \response()->json(['status' => 'NOT UNAUTHORIZED'], Response::HTTP_UNAUTHORIZED);

        }
    }

}
