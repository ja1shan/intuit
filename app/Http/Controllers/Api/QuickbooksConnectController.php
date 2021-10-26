<?php

namespace App\Http\Controllers\Api;

use App\Services\QuickbooksService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuickbooksConnectController
{
    public function connect(): JsonResponse
    {
        $dataService = new QuickbooksService();
        return response()->json([
            'authorizationCodeUrl' => $dataService->getAuthorizationCodeUrl()
        ]);
    }

    public function getAuthorization(Request $request): JsonResponse
    {
        $dataService = new QuickbooksService();
        $quickbooksToken = $dataService->getAccessToken($request->code, $request->realmID);

        return response()->json([
            'quickbooks_token' => $quickbooksToken
        ]);
    }
}
