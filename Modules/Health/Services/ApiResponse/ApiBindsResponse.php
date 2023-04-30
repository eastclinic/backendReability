<?php


namespace Modules\Health\Services\ApiResponse;


use Illuminate\Database\Eloquent\Builder;
use Modules\Health\Http\Requests\ApiBindsRequest;

class ApiBindsResponse extends ApiBindsResponseAbstract
{

    protected ?ApiBindsResponseAbstract $responseHandler = null;



    public function answer()    {
        if(!$this->request || !$this->query) return [];

        //attempt get special handler
        $handlerClass = $this->getHandlerClass();
        if(!$handlerClass) return [];
        return ( new $handlerClass )->forRequest($this->request)->withBindsQuery($this->query)->answer();


        //return [];
    }

    protected function getHandlerClass():?string {
        if(!$this->baseClassName || !$this->targetClassName) return null;
        $className = [$this->baseClassName, $this->targetClassName];
        sort($className);
        $className = 'Modules\Health\Services\ApiResponse\BindsResponses\\'.implode('', $className);
        return (class_exists($className)) ? $className : null;
    }


}
