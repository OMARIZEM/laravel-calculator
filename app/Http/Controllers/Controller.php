<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function respondWithsuccess(mixed $data = null, int $code = 200): JsonResponse
    {
        return response()->json([
            "success" => true,
            "data" => $data
        ])->setStatusCode($code);
    }

    protected function respondWithError(string $message = "An External Error occured.", array $errors = [], int $code = 500): JsonResponse
    {
        return response()->json([
            "success" => false,
            "message" => $message,
            "errors" => $errors
        ])->setStatusCode($code);
    }
}
