<?php

namespace App\Services\ErrorHandleService\Strategies;

use App\Services\ErrorHandleService\ErrorHandleDTO;
use App\Services\ErrorHandleService\Interfaces\IErrorHandleStrategy;
use Illuminate\Http\Request;
use Throwable;

final class JWTStrategy implements IErrorHandleStrategy
{
    /**
     * @param Request $request
     * @param Throwable $exception
     * @return ErrorHandleDTO
     */
    public function run(Request $request, Throwable $exception): ErrorHandleDTO
    {
        return (new ErrorHandleDTO())
            ->setMessage('Your does not have access in this resource')
            ->setDevMessage('Your request doesn\'t have a token in the header')
            ->setCode(401);
    }
}
