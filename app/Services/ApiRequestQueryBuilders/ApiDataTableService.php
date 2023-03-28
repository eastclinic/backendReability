<?php


namespace App\Services\ApiRequestQueryBuilders;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ApiDataTableService extends ApiRequestQueryBuilderAbstractService
{
    public function build( $query, FormRequest $request )  {


        $requestData = $request->validated();
        //$query = $model::query();
        //если нужно выдать только заданные сущности
        if(isset($requestData['ids']) && is_array($requestData['ids'])){
            return $query->whereIn('id', $query['ids']);
        }

        //пагинация
        $offset = (isset($requestData['page']) && isset($requestData['per_page'])) ? $requestData['page'] * $requestData['per_page']: 0;

        $limit = (isset($requestData['per_page'])) ? $requestData['per_page']: 10;
        error_log($offset);
        error_log($limit);


        $query->offset($offset)->limit($limit);
        //сортировка
        if(isset($requestData['sortBy']) && isset($requestData['sortDesc'])){
            foreach ($requestData['sortBy'] as $f => $field){
                $query->orderBy($field, ($requestData['sortDesc'][$f] === 'false') ? 'asc' : 'desc');
            }
        }


        $countItemsOnPage = (isset($requestData['per_page'])) ? $requestData['per_page']*1 : 3;
        $query->getModel()->setPerPage( $countItemsOnPage );


        return $query;
    }

}
