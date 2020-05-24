<?php

namespace App\Http;

use Illuminate\Http\JsonResponse;

final class Responses
{
    /**
     * Default template for successful response
     *
     * @param string $status Generic status message
     * @param string $message Descriptive message
     * @param mixed $data Response data if needed
     * @param int $code Http status code
     * @return JsonResponse
     */
    public static function Success(
        string $message = null,
        $data = null,
        string $status = 'success',
        int $code = 200
    ): JsonResponse
    {
        $defaultResponse = ['status' => $status];
        if ($message) $defaultResponse['message'] = $message;
        if ($data) $defaultResponse['data'] = $data;
        return response()->json($defaultResponse, $code);
    }

    /**
     * Default template for not successful response
     *
     * @param string $status Generic status message
     * @param int $code Http status code
     * @param string $message Descriptive message for users
     * @param string $devMessage Descriptive message for developers
     * @param \Throwable $exception Complete expection object
     */
    public static function Error(
        string $status = 'error',
        int $code = 500,
        string $message = 'Unknow error, try again later.',
        string $devMessage = null,
        \Throwable $exception
    ): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'userMessage' => $message,
            'devMessage' => $devMessage,
            'exMessage' => $exception->getMessage(),
            'ex' => $exception,
        ]);
    }
}
