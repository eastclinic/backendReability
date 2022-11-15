<?php


namespace App\Services\Response;
use Illuminate\Support\Facades\Response;

class ResponseService extends Response
{
    /**
     *
     *
     * @see \App\Providers\AppServiceProvider::boot()
     * @param mixed $data
     * @param mixed $extraData
     * @param mixed $statusCode
     * @static
     */
    public static function ok($data, $extraData = [], $statusCode = 200)
    {
        return \Illuminate\Routing\ResponseFactory::ok($data, $extraData, $statusCode);
    }
    /**
     *
     *
     * @see \App\Providers\AppServiceProvider::boot()
     * @param mixed $message
     * @param mixed $statusCode
     * @static
     */
    public static function okMessage($message, $statusCode = 200)
    {
        return \Illuminate\Routing\ResponseFactory::okMessage($message, $statusCode);
    }
    /**
     *
     *
     * @see \App\Providers\AppServiceProvider::boot()
     * @param \Illuminate\Database\Eloquent\Builder $modelQuery
     * @static
     */
    public static function apiCollection($modelQuery)
    {
        return \Illuminate\Routing\ResponseFactory::apiCollection($modelQuery);
    }
    /**
     *
     *
     * @see \App\Providers\AppServiceProvider::boot()
     * @param mixed $error
     * @param mixed $errorCode
     * @static
     */
    public static function error($error, $errorCode = 422)
    {
        return \Illuminate\Routing\ResponseFactory::error($error, $errorCode);
    }
    /**
     *
     *
     * @see \App\Providers\AppServiceProvider::boot()
     * @param \Illuminate\Validation\ValidationException $exception
     * @static
     */
    public static function errorValidation($exception)
    {
        return \Illuminate\Routing\ResponseFactory::errorValidation($exception);
    }
}
