<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\CustomerModel;
use App\Models\ProjectModel;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    public function index()
    {
        $data = ProjectModel::all();
        return $data ?? \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function show($id)
    {
        $data = ProjectModel::find($id);
        return $data ?? \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function indexCustomerProject($id, $customerId)
    {

        $data = ProjectModel::where('customer_id', $customerId)->find($id);
        return $data ?? \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function store(ProjectRequest $request, $customerId)
    {
        $customerCount = CustomerModel::where('id', $customerId)->count();
        if ($customerCount <= 0) {
            return \response()->json(['status' => 'Customer Not Found'], Response::HTTP_NOT_FOUND);
        }
        $data = new ProjectModel();
        $data->name = $request->name;
        $data->customer_id = $customerId;
        $data->save();

        return $data ?? \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function update(ProjectRequest $request, $id)
    {
        $data = ProjectModel::find($id);
        if (!$data) {
            return \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
        }
        $data->name = $request->name;

        $data->save();

        return $data ?? \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function destery($id)
    {
        $data = ProjectModel::find($id);
        if (!$data) {
            return \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
        }
        $data->delete();
        return $data ?? \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }

}
