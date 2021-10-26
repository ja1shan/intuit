<?php

namespace App\Http\Controllers\Api;

use App\Models\QuickbooksApi\Entities\QuickbookEntityAccount;
use App\Models\QuickbooksApi\Entities\QuickbookEntityBill;
use App\Models\QuickbooksApi\Entities\QuickbookEntityCompanyInfo;
use App\Models\QuickbooksApi\Entities\QuickbookEntityCustomer;
use App\Models\QuickbooksApi\Entities\QuickbookEntityEmployee;
use Illuminate\Http\JsonResponse;

class QuickbooksEntityController
{
    public function getEntities(): JsonResponse
    {
        $entities = [
            'account' => (new QuickbookEntityAccount())->getViewData(),
            'bill' => (new QuickbookEntityBill())->getViewData(),
            'companyInfo' => (new QuickbookEntityCompanyInfo())->getViewData(),
            'customer' => (new QuickbookEntityCustomer())->getViewData(),
            'employee' => (new QuickbookEntityEmployee())->getViewData(),
        ];

        $data = [
            'entities' => $entities,
            'default_entity' => 'account',
        ];

        return response()->json($data);
    }
}
