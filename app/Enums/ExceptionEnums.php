<?php

namespace App\Enums;

final class ExceptionEnums
{
        /**
         * Generic errors
         */
        const NOT_FOUND = 404;

        /**
         * Eloquent errors
         */
        const ELOQUENT_MODEL_NOT_FOUND = 'Illuminate\Database\Eloquent\ModelNotFoundException';

        /**
         * Auth errors (JWT)
         */
        const JWT_INVALID = 'Tymon\JWTAuth\Exceptions\TokenInvalidException';
        const JWT_EXPIRED = 'Tymon\JWTAuth\Exceptions\TokenExpiredException';
}
