<?php


namespace App\Services\ApiRequestQueryBuilders;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ApiListService extends ApiRequestQueryBuilderAbstractService
{
    public function build( $query, FormRequest $request )  {


        $requestData = $request->validated();
        //$query = $model::query();
        //если нужно выдать только заданные сущности
        if(isset($requestData['ids']) && is_array($requestData['ids'])){
            return $query->whereIn('id', $query['ids']);
        }
        if(!isset($requestData['all'])){
            //пагинация
            $offset = (isset($requestData['page']) && isset($requestData['perPage'])) ? ( $requestData['page'] - 1 ) * $requestData['perPage']: 0;
            $limit = (isset($requestData['perPage'])) ? $requestData['perPage']: 10;
            $query->offset($offset)->limit($limit);
            $countItemsOnPage = (isset($requestData['perPage'])) ? $requestData['perPage']*1 : $this->perPage;
            $query->getModel()->setPerPage( $countItemsOnPage );
        }else{
            $query->getModel()->setPerPage( ($this->perPage) ?? 10000 );
        }





        //сортировка
        if(isset($requestData['sortBy']) && isset($requestData['sortDesc'])){
            foreach ($requestData['sortBy'] as $f => $field){
                $query->orderBy($field, ($requestData['sortDesc'][$f] === 'false') ? 'asc' : 'desc');
            }
        }





        return $query;
    }

}
