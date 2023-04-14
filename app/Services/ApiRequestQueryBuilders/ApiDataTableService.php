<?php


namespace App\Services\ApiRequestQueryBuilders;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class ApiDataTableService extends ApiRequestQueryBuilderAbstractService
{
    public function build( $query, FormRequest $request )  {


        $requestData = $request->validated();
        //$query = $model::query();
        //если нужно выдать только заданные сущности
        $ids = ( isset($requestData['id']) && $requestData['id'] ) ? [ $requestData['id'] ] : [];
        if(!$ids && isset($requestData['ids']) && $requestData['ids']) $ids = $requestData['ids'];
        if($ids){
            return $query->whereIn('id', $ids);
        }

        //пагинация
        $offset = (isset($requestData['page']) && isset($requestData['per_page'])) ? $requestData['page'] * $requestData['per_page']: 0;

        $limit = (isset($requestData['per_page'])) ? $requestData['per_page']: 10;


        $query->offset($offset)->limit($limit);
        //sort
        if(isset($requestData['sort'])){
            if(is_array($requestData['sort'])){
                foreach ($requestData['sort'] as $field => $trend){
                    $query->orderBy($field, ( $trend > 0 ) ? 'asc' : 'desc');
                }
            }
        }


        //if(isset($requestData['sort']) && isset($requestData['sortDesc'])){

        //сортировка
        if(isset($requestData['sortBy']) && isset($requestData['sortDesc'])){
            foreach ($requestData['sortBy'] as $f => $field){
                $query->orderBy($field, ($requestData['sortDesc'][$f] === 'false') ? 'asc' : 'desc');
            }
        }


        $countItemsOnPage = (isset($requestData['per_page'])) ? $requestData['per_page']*1 : 10;
        $query->getModel()->setPerPage( $countItemsOnPage );


        return $query;
    }

}
