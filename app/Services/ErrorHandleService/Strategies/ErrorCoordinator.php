<?php

namespace App\Services\ErrorHandleService\Strategies;

use App\Services\ErrorHandleService\ErrorHandleDTO;
use App\Services\ErrorHandleService\ExceptionMap;
use Illuminate\Http\Request;
use Throwable;

final class ErrorCoordinator
{
    /**
     * @var string
     */
    private $exceptionClass;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Throwable
     */
    private $exception;

    public function __construct(
        string $exceptionClass,
        Request $request,
        Throwable $exception
    )
    {
        $this->exceptionClass = $exceptionClass;
        $this->request = $request;
        $this->exception = $exception;
    }

    /**
     * @return ErrorHandleDTO
     */
    public function call(): ErrorHandleDTO
    {
        $exceptionsArray = ExceptionMap::get();
        if (isset($exceptionsArray[$this->exceptionClass])) {
            $classWithNamespace = __NAMESPACE__ . $exceptionsArray[$this->exceptionClass];
            return (new $classWithNamespace())->run($this->request, $this->exception);
        }
        return (new ErrorHandleDTO())
            ->setMessage($this->exception->getMessage())
            ->setCode($this->exception->getCode());
    }
}
