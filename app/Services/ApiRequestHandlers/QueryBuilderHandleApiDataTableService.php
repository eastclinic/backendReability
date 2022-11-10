<?php


namespace App\Services\ApiRequestHandlers;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class QueryBuilderHandleApiDataTableService
{
    public function build( $query, FormRequest $request )  {


        $requestData = $request->validated();
        //$query = $model::query();
        //если нужно выдать только заданные сущности
        if(isset($requestData['ids']) && is_array($requestData['ids'])){
            return $query->whereIn('id', $query['ids']);
        }

        //пагинация
        $offset = (isset($requestData['page']) && isset($requestData['itemsPerPage'])) ? ( $requestData['page'] - 1 ) * $requestData['itemsPerPage']: 0;

        $limit = (isset($requestData['itemsPerPage'])) ? $requestData['itemsPerPage']: 10;
        error_log($offset);
        error_log($limit);


        $query->offset($offset)->limit($limit);
        //сортировка
        if(isset($requestData['sortBy']) && isset($requestData['sortDesc'])){
            foreach ($requestData['sortBy'] as $f => $field){
                $query->orderBy($field, ($requestData['sortDesc'][$f] === 'false') ? 'asc' : 'desc');
            }
        }


        $countItemsOnPage = (isset($requestData['itemsPerPage'])) ? $requestData['itemsPerPage']*1 : 3;
        $query->getModel()->setPerPage( $countItemsOnPage );


        return $query;
    }

}
