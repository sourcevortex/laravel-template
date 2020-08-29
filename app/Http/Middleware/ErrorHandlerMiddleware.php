<?php

namespace App\Http\Middleware;

use App\Http\Responses;
use App\Services\ErrorHandleService\Strategies\ErrorCoordinator;
use Closure;
use Illuminate\Http\Request;

class ErrorHandlerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * @var \Illuminate\Http\Response
         */
        $response = $next($request);
        if (is_null($response->exception)) return $next($request);

        $exception = $response->exception;
        $exceptionClass = get_class($response->exception);
        $errorAttrs = (new ErrorCoordinator($exceptionClass, $request, $exception))->call();

        return Responses::Error(
            $exception,
            $errorAttrs->getMessage() ?? 'Unknown error, try again later.',
            $errorAttrs->getDevMessage() ?? "Exception class {$exceptionClass}",
            $errorAttrs->getStatus() ?? "error",
            $errorAttrs->getCode() ?? 500
        );
    }
}
