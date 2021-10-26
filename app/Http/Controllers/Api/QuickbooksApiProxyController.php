<?php

namespace App\Http\Controllers\Api;

use App\Models\QuickbooksApi\Entities\QuickbookEntity;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuickbooksApiProxyController
{
    public function proxyRequest(Request $request): JsonResponse
    {
        try {
            $client = new Client([
                'headers' => [
                    'Authorization' => 'Bearer ' . $request->token,
                    'Content-Type' => $request->content_type ?? 'application/json',
                    'Accept' => 'application/json',
                ]
            ]);
            $response = $client->request('GET', QuickbookEntity::SANDBOX_URL . $request->endpoint);
            $response = json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            $failedCode = $e->getCode();
            $response = 'error';
        }

        return response()->json([
            'failed_code' => $failedCode ?? null,
            'response' => $response
        ]);
    }
}
