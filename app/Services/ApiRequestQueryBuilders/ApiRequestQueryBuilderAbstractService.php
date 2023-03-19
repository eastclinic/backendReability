<?php


namespace App\Services\ApiRequestQueryBuilders;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Database\Eloquent\Builder;

abstract class ApiRequestQueryBuilderAbstractService
{
    abstract public function build(  Builder $query, FormRequest $request ) ;

}
