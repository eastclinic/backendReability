<?php


namespace App\Services\Graph;


use Modules\Health\Entities\Doctor;
use Modules\Health\Entities\Service;
use Modules\Health\Entities\Variation;

class RelationGraph
{

    protected array $graph = [['seoServices', 'services', 'variation', 'doctor']];
    protected array $resultModelsAliases = [];
    protected array $graphFiltered = [];
    protected array         $modelAliases = [
        'doctor' => Doctor::class,
        'service' => Service::class,
        'variation' => Variation::class,
        //'seoResource' => SeoResource::class,




    ];

    protected array $modelToAlias = [
        'Modules\Health\Entities\Doctor' => 'doctor',
        'Modules\Health\Entities\Service' => 'service',
        'Modules\Health\Entities\Variation' => 'variation',
    ];

    public function __construct()    {
        if(!$this->graph){
            throw new \Exception('Not Fill Graph');
        }
    }


    public function withResponse( array $modelsAliases):self    {
        $this->resultModelsAliases = $modelsAliases;
        return $this;
    }

    public function withModel($model):self {

        return $this;
    }


    protected function graphFilter(array $graph, array $modelsResult = []):array {
        $graphFiltered = [];
        if(!$modelsResult)  return $graph;
        //todo create algorithm for filter graph
        //определяем ветки графа которые подходят для relation mirror
        //для этого обходим массив $graph и определяем ветки, в которых есть более 1 элемента из массива $models
        //для каждой ветки выбираем наибольший путь
        //отфильтровали граф, по заданным узлам - моделям

        $graphFiltered = [ 'service', 'variation', 'doctor'];//mock

        return $graphFiltered;
    }

    public function stalker( array $collections = []): self    {
        if(!$this->graphFiltered) {
            $this->graph = $this->graphFilter($this->graph, ($this->resultModelsAliases) ? $this->resultModelsAliases : []);
        }


        //запускаем прямой обход графа
        //stalker forward
        //graphForward = $this->stalkerForwardGraph($graph);
        $graphModels = [];
        $prevNode = null;
        foreach($this->graph as $key => $node){
            if(is_array($node)) {
                //если node это массив запускаем рекурсию этой функции

            }
            elseif (is_string($node)){
                //если node это строка, значит это псевдоним модели
                //выбираем модели из бд
                //при этом могут быть ограничения
                // примеру $requestData['doctorsIds']
                //или $requestData['servicesIds']
                if($this->modelAliases[$node]){
                    //если нашли класс соответствующий node
                    //выборка из бд
                    $graphModels[$node] = $model = $this->modelAliases[$node]::query();

                    //проверяем, есть ли предыдущий node
                    $prevModelAlias = (isset($graph[ $key - 1 ]) && $graph[ $key - 1 ] && is_string($graph[ $key - 1 ])) ? $graph[ $key - 1 ] : false;
                    //проверяем есть ли следующий node
                    $nextModelAlias = (isset($graph[ $key + 1 ]) && $graph[ $key + 1 ] && is_string( $graph[ $key + 1 ] )) ? $graph[ $key + 1 ] : false;
                    //проверяем что бы у node model были методы $prevModelAlias и $nextModelAlias,
                    // которые возвращают коллекции
                    if(($prevModelAlias && !method_exists($model, $prevModelAlias.'Graph'))
                        || ($nextModelAlias && !method_exists($model, $nextModelAlias.'Graph'))){
                        //если метода нет, то заканчиваем с ошибкой. Это обязательное условие для работы графа
                        break;
                    }


                }
            }
        }


        return $this;
    }
}
