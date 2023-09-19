<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\CustomerModel;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    public function index(){
        $data = CustomerModel::all();
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function show($id){
        $data = CustomerModel::find($id);
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function store(CustomerRequest $request){
        $data = new CustomerModel();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->phone = $request->phone;
        $data->save();

        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function update(CustomerRequest $request , $id){
        $data =  CustomerModel::find($id);
        if (!$data){
            return  \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function destery($id){
        $data =  CustomerModel::find($id);
        $data->delete();
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }
}
