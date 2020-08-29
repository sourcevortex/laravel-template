<?php

namespace App\Services\ErrorHandleService\Strategies;

use App\Helpers\ModelHelpers;
use App\Services\ErrorHandleService\ErrorHandleDTO;
use App\Services\ErrorHandleService\Interfaces\IErrorHandleStrategy;
use Illuminate\Http\Request;
use Throwable;

final class ModelNotFoundStrategy implements IErrorHandleStrategy
{
    /**
     * @param Request $request
     * @param Throwable $exception
     * @return ErrorHandleDTO
     */
    public function run(Request $request, Throwable $exception): ErrorHandleDTO
    {
        return (new ErrorHandleDTO())
            ->setMessage(ModelHelpers::getNameFromException($exception) . "with this ID not found")
            ->setCode(404);
    }
}
