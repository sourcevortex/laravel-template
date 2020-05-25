<?php

namespace App\Http\Middleware;

use App\Enums\ExceptionEnums;
use App\Helpers\ModelHelpers;
use App\Http\Responses;
use Closure;
use Illuminate\Http\Request;

class ErrorHandlerMiddleware
{
    /**
     * @var \Throwable
     */
    public $exception;

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * @var \Illuminate\Http\Response
         */
        $response = $next($request);
        if (is_null($response->exception)) return $next($request);

        $statusCode = $response->getStatusCode();
        $this->exception = $response->exception;
        $exceptionClass = get_class($response->exception);

        // TODO: Maybe will be needed move this to another file
        $returnResponses = [
            /**
             * Generic errors
             */
            ExceptionEnums::NOT_FOUND => [
                'message' => 'Not found',
                'devMessage' => "Route {$request->getPathInfo()} not found.",
                'code' => 404
            ],

            /**
             * Eloquent errors
             */
            ExceptionEnums::ELOQUENT_MODEL_NOT_FOUND => [
                'message' => ModelHelpers::getNameFromException($this->exception) . " with this ID not found.",
                'code' => 404
            ],

            /**
             * Auth errors (JWT)
             */
            ExceptionEnums::JWT_EXPIRED => [
                'message' => 'Your session is expired, please sign in again.',
                'code' => 401
            ],
            ExceptionEnums::JWT_INVALID => [
                'message' => 'Invalid token.',
                'code' => 401
            ],
        ];

        $errorAttrs = $returnResponses[$exceptionClass] ?? $returnResponses[$statusCode] ?? [];

        return Responses::Error(
            $this->exception,
            $errorAttrs['message'] ?? 'Unknow error, try again later.',
            $errorAttrs['devMessage'] ?? "Exception class {$exceptionClass}",
            $errorAttrs['status'] ?? "error",
            $errorAttrs['code'] ?? 500
        );
    }
}
