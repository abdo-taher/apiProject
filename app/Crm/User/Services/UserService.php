<?php

namespace Crm\User\Services;

use Crm\User\Events\CreateUser;
use Crm\User\Models\User;
use Crm\User\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function index(){
        $data = User::all();
        return $data ??  response()->json(['status'=>'Not Found'],\Illuminate\Http\Response::HTTP_NOT_FOUND);
    }
    public function show($id){
        $data = User::where('id',$id)->get()->first();
        return $data ??  response()->json(['status'=>'Not Found'],\Illuminate\Http\Response::HTTP_NOT_FOUND);
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        event(new CreateUser($user));

        return $user ??  response()->json(['status'=>'Not Found'],\Illuminate\Http\Response::HTTP_NOT_FOUND);
    }

}
