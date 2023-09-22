<?php

namespace App\Http\Controllers;

use Crm\Customer\Requests\CustomerRequest;
use Crm\Customer\Services\CustomerExportService;
use Crm\Customer\Services\customerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private customerService $customerService;
    private CustomerExportService $customerExportService;

    public function __construct(customerService $customerService ,CustomerExportService $customerExportService){
        $this->customerService = $customerService;
        $this->customerExportService = $customerExportService;
    }

    public function index()
    {
        return $this->customerService->index();
    }

    public function show($id)
    {
        return $this->customerService->show((int)$id);
    }

    public function store(CustomerRequest $request)
    {
        return $this->customerService->store($request);
    }
    public function export(Request $request)
    {
        return $this->customerExportService->export($request->get('format','json'));
    }

    public function update(CustomerRequest $request, $id)
    {
        return $this->update($request, (int)$id);
    }

    public function destery($id)
    {
        $this->customerService->destery((int)$id);
    }

}
