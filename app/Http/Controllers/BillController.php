<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillRequest;
use App\Models\BillModel;
use App\Models\CustomerModel;
use App\Models\ProjectModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BillController extends Controller
{
    public function index(){
        $data = BillModel::all();
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function show($id){
        $data = BillModel::find($id);
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function indexCustomerBill($id,$customerId){

        $data = BillModel::where('customer_id',$customerId)->find($id);
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }
    public function indexProjectBill($id,$projectId){

        $data = BillModel::where('project_id',$projectId)->find($id);
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }
    public function indexCustomerAndProjectBill($id,$customerId,$projectId){

        $data = BillModel::where(['project_id',$projectId],['customer_id',$customerId])->find($id);
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function store(BillRequest $request ,$customerId,$projectId){
        $customerCount = CustomerModel::where('id',$customerId)->count();
        $ProjectCount = ProjectModel::where('id',$projectId)->count();
        if ($customerCount <= 0){
            return  \response()->json(['status'=>'Customer Not Found'], Response::HTTP_NOT_FOUND);
        }
        if ($ProjectCount <= 0){
            return  \response()->json(['status'=>'Project Not Found'], Response::HTTP_NOT_FOUND);
        }
        $data = new BillModel();
        $data->billCode = $request->billCode;
        $data->billNote = $request->billNote;
        $data->customer_id = $customerId;
        $data->project_id = $projectId;
        $data->save();

        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);

    }

    public function update(BillRequest $request , $id){
        $data =  BillModel::find($id);
        if (!$data){
            return  \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        $data->name = $request->name;

        $data->save();

        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function destery(BillRequest $request , $id){
        $data =  BillModel::find($id);
        if (!$data){
            return  \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        $data->delete();
        return $data ?? \response()->json(['status'=>'Not Found'], Response::HTTP_NOT_FOUND);
    }
}
