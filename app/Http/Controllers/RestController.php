<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class RestController extends Controller
{
    /**
     * @param array $data
     * @return JsonResponse
     */
    protected function getErrorResponse(array $data = []): JsonResponse
    {
        return response()->json([
            'success' => false,
            'result' => $data
        ]);
    }

    /**
     * @param array $data
     * @return JsonResponse
     */
    protected function getSuccessResponse(array $data = []): JsonResponse
    {
        return response()->json([
            'success' => true,
            'result' => $data
        ]);
    }
}
