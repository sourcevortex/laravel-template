<?php

namespace App\Services\ErrorHandleService\Interfaces;

use App\Services\ErrorHandleService\ErrorHandleDTO;
use Illuminate\Http\Request;
use Throwable;

interface IErrorHandleStrategy
{
    public function run(Request $request, Throwable $exception): ErrorHandleDTO;
}
