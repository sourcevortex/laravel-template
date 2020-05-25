<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

final class ModelHelpers
{
    /**
     * Extract model name from namespace
     *
     * @return string Model name without namespace
     */
    public static function getNameFromException(\Throwable $exception): string
    {
        if ($exception instanceof ModelNotFoundException) {
            $modelException = $exception;
            return str_replace("App\Models\\", "", $modelException->getModel());
        }
        return 'Register';
    }
}
