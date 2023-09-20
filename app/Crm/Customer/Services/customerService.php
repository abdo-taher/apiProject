<?php

namespace Crm\Customer\Services;

use Crm\Customer\Events\CreateCustomer;
use Crm\Customer\Requests\CustomerRequest;
use Crm\Customer\Models\CustomerModel;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;

class customerService
{
    public function index()
    {
        $data = CustomerModel::all();
        return $data ?? \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function show($id)
    {
        $data = CustomerModel::find($id);
        return $data ?? \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function store(CustomerRequest $request)
    {
        $data = new CustomerModel();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->phone = $request->phone;
        $data->save();

        event(new CreateCustomer($data));

        return $data ?? \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }
    public function export(Request $request)
    {
        dd($request->get('format','json'));
        return $format ?? \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function update(CustomerRequest $request, $id)
    {
        $data = CustomerModel::find($id);
        if (!$data) {
            return \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return $data ?? \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }

    public function destery($id)
    {
        $data = CustomerModel::find($id);
        $data->delete();
        return $data ?? \response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }
}
