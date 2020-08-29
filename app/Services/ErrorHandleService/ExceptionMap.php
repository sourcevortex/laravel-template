<?php

namespace App\Services\ErrorHandleService;

final class ExceptionMap
{
    public static function get()
    {
        return [

            /**
             * Eloquent
             */
            'Illuminate\Database\Eloquent\ModelNotFoundException' => '\ModelNotFoundStrategy',

            /**
             * JWTAuth
             */
            'Tymon\JWTAuth\Exceptions\JWTException' => '\JWTStrategy',
            'Tymon\JWTAuth\Exceptions\TokenInvalidException' => '\TokenInvalidStrategy',
            'Tymon\JWTAuth\Exceptions\TokenExpiredException' => '\TokenExpiredStrategy',
        ];
    }
}
