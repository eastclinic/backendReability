<?php


namespace App\Services\ApiRequestQueryBuilders;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Database\Eloquent\Builder;

abstract class ApiRequestQueryBuilderAbstractService
{
    //todo add type parameter $query
    abstract public function build(  $query, FormRequest $request ) ;

}
