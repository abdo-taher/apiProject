<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\CustomerModel;
use App\Models\NoteModel;
use Symfony\Component\HttpFoundation\Response;

class NoteController extends Controller
{
    public function index(){
        $data = NoteModel::all();
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function show($id){
        $data = NoteModel::find($id);
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }
    public function indexCustomerNote($id,$customerId){
        $data = NoteModel::where('customer_id',$customerId)->find($id);
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function store(NoteRequest $request,$customerId){
        $customerCount = CustomerModel::where('id',$customerId)->count();
        if ($customerCount <= 0){
           return  \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        $data = new NoteModel();
        $data->note = $request->note;
        $data->customer_id = $customerId;
        $data->save();

        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function update(NoteRequest $request , $id){
        $data =  NoteModel::find($id);
        if (!$data){
            return  \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        $data->note = $request->note;

        $data->save();

        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function destery($id){
        $data =  NoteModel::find($id);
        if (!$data){
            return  \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        $data->delete();
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }
}
