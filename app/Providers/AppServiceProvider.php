<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Response::macro('ok', function ($data, $extraData = [], $statusCode = 200){
            if (is_array($data) || is_object($data)){
                return response()->json(['ok' => true, 'data' => $data] + $extraData, $statusCode );
            }else{
                return response()->json(['ok' => true, 'message' => $data], $statusCode );
            }
        });
        Response::macro('okMessage', function ($message, $statusCode = 200){
            return response()->json(['ok' => true, 'message' => $message], $statusCode );

        });


        Response::macro('apiCollection', function (Builder $modelQuery ){
            $itemsCollection = $modelQuery->paginate();
            return response()->json(['ok' => true, 'items' => $itemsCollection->items(),
                //'total' => $itemsCollection->count(),
                'count' => $itemsCollection->total(),
                'per_page' => $itemsCollection->perPage(),
                //'current_page' => $itemsCollection->currentPage(),
                'total_pages' => $itemsCollection->lastPage(),
//                'toSql' => $itemsCollection->toSql(),
            ]);
        });


        Response::macro('error', function ( $error, $errorCode = 422 ){
            return response()->json(['ok' => false, 'error' => $error, 'code' => $errorCode], $errorCode);
        });
        Response::macro('errorValidation', function ( ValidationException $exception ){
            return response()->json(['ok' => false, 'error' => $exception->getMessage(), 'errors'  =>$exception->errors()], $exception->status);
        });

    }
}
