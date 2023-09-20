<?php

namespace Crm\Customer\Services;

use App\Crm\Customer\Exception\ExportException;
use Crm\Base\Export\ExpoetInterface;
use Crm\Customer\Models\CustomerModel;

class CustomerExportService
{

    private customerService $customerService;

    public function __construct(customerService $customerService){
        $this->customerService = $customerService;
    }

    public function export($format){
        $customer = $this->customerService->index();
        $handler = config('export.exporter')[$format] ?? null;
        if (!$handler){
            throw new ExportException(sprintf("Format Is Note Supported",$format));
        }
        $exporter =new $handler;
        if ($exporter instanceof ExpoetInterface){

            $exporter->export($customer->toArray());
        }
    }

}
