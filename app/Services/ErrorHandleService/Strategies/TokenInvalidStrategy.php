<?php

namespace App\Services\ErrorHandleService\Strategies;

use App\Services\ErrorHandleService\ErrorHandleDTO;
use App\Services\ErrorHandleService\Interfaces\IErrorHandleStrategy;
use Illuminate\Http\Request;
use Throwable;

final class TokenInvalidStrategy implements IErrorHandleStrategy
{
    /**
     * @param Request $request
     * @param Throwable $exception
     * @return ErrorHandleDTO
     */
    public function run(Request $request, Throwable $exception): ErrorHandleDTO
    {
        return (new ErrorHandleDTO())
            ->setMessage('Your token is invalid')
            ->setCode(401);
    }
}
