<?php


namespace App\Services\Graph;


use Illuminate\Support\Facades\Log;
use Modules\Health\Entities\Doctor;
use Modules\Health\Entities\Service;
use Modules\Health\Entities\Variation;

class RelationGraph
{

    protected array $graph = [['seoServices', 'services', 'variation', 'doctor']];
    protected array $graphData = [];
    protected array $responseModels = [];
    protected array $graphFiltered = [];
    protected array $graphModels = [];
    protected array $graphIds = [];

    protected array $modelsWhere = [];


//    protected array         $modelAliases = [
//        'doctor' => Doctor::class,
//        'service' => Service::class,
//        'variation' => Variation::class,
//        //'seoResource' => SeoResource::class,
//
//
//
//
//    ];

    protected array $modelClassToAlias = [
        'Modules\Health\Entities\Doctor' => 'doctor',
        'Modules\Health\Entities\Service' => 'service',
        'Modules\Health\Entities\Variation' => 'variation',
    ];

    public function __construct()    {

    }


    public function withResponseModels( array $models):self    {
        $this->responseModels = $models;
        $this->graphModels = $this->composeGraph($models);
        return $this;
    }

    public function withModel($builder):self {
        $modelClass = get_class($builder->getModel());
        $this->modelsWhere[$modelClass] = $builder;
        return $this;
    }

    protected function composeGraph(array $models):array {
        $modelsWithRelations = [];

    //можно не использовать ветки и вообще граф!
    //у нас есть допустим массив по которому нужно построить ответ
    //[ 'Modules\Health\Entities\Doctor', 'Modules\Health\Entities\Service', 'Modules\Health\Entities\Variation'];
    //такой массив приходит уже от контроллера, который знает как преобразовать request данные в необходимые модели
    //может быть какой то спец класс будет этим заниматься
    //для каждой модели, ищем, relation  методы, которые возвращают коллекцию нужного типа
    //т.е для модели Modules\Health\Entities\Doctor нашли метод variations() который возвращает коллекцию Modules\Health\Entities\Variation
    //записываем в массив отфильтрованных моделей
    //[Doctor, 'Modules\Health\Entities\Variation']
    //[ Doctor::class=>['variations' => Variation::class], Service::class, Variation::class]
    //для Doctor::class проверяем есть ли Service::class, Variation::class relation methods
    //нашли 'variations'
    //заполняем массив
    //[ Doctor::class=>['variations' => Variation::class]]
    //из массива $responseModels обработаны классы Doctor::class и Variation::class, остался Service::class
    //для класса Service::class находим 'variations' => Variation::class

        foreach ($models as $model){

            $modelsWithRelations[$model] = ($model::RELATIONS_METHODS) ? $model::RELATIONS_METHODS : [];
        }


        return  $modelsWithRelations;
    }


    public function get():array{
        $this->graphData = $this->graphFillFromDB($this->graphModels);
        if(! $this->graphData) {
            return [];
        }
//        $this->graphIds = $this->graphToIds();


//        Log::info(print_r($this->graphData,1));
        return [];
    }


    protected function graphFillFromDB( array $graph ) : array {
        $graphCollections = [];

        foreach ($graph as $model => $relations){
            $q = ( isset($this->modelsWhere[$model]) ) ?
                $this->modelsWhere[$model] :
                $model::query();
            $q->addSelect('id'); //always use ids
            if( $relations ) {
                foreach ($relations as $relationModel => $relation ) {
                    if(isset($graphCollections[$relationModel]) ){
                        //если уже есть коллекция с данными из базы
                        //todo нужно взять ids и распределить в текущую коллекцию с заданными ключами
                    }
                    //todo select $relationModels, only ids with pivot data
                    //todo проверить что запрос уже может быть настроен извне, на фильтрацию по текущему pivot
                    //проверить как накладываются where по pivot
                    $q -> with([$relation => function ($query) {
                        $query->select('id');
                    }]);
//
                }
            }

            $_selectFields = $q->getQuery()->columns;
            $_sql = $q->toSql();
            $bindings = $q->getBindings();
            $graphCollections[$model] = $q->get();
            $_r = $graphCollections[$model]->toArray();
            $d = 9;

        }
        //dd($graphCollections[$model]);
        //todo так же запускаем обратный обход графа, для дофильтрации


        return $graphCollections;
    }


//    protected function graphToIds( array $graph, array $collections ){
//
//        $graph = [
//            Doctor::class=>['variations' => Variation::class],
//            Service::class=>['variations' => Variation::class],
//            Variation::class => ['doctors' => Doctor::class, 'services' => Service::class],
//        ];
//
//        $modelIds = [];
//        foreach ($graph as $node => $relations){
//            if(!$relations) continue;
//
//            foreach ($relations as $key => $relation) {
//
//            }
//
//            if(is_array($relations)) {
//                //если node это массив запускаем рекурсию этой функции
//                $modelIds[$node] = $this->collectionsToIds($path, $collections);
//            }else{
//                $modelIds[$node] = $collections[$node]->pluck('id');
//            }
//
//        }
//        return $modelIds;
//    }






    public function getRelationsData(array $graph){
        $graph = [
            Doctor::class => [
                1 => [ Variation::class => [2, 15, 16, 18, 21, 58, 68] ],
                2 => [ Variation::class => [22, 152, 162, 182, 212, 582, 682] ],
                4 => [ Variation::class => [22, 152, 162, 182, 21, 58, 68] ],
            ],
            Service::class=>['variations' => Variation::class],
            Variation::class => ['doctors' => Doctor::class, 'services' => Service::class],
        ];

        return $this->stalker($graph);
    }

//    public function filterByBaseModel($graph, $id):array {
//        $filteredGraph = [];
//        $baseModel = key($graph);
//
//        foreach ($graph as $model => $collection) {
//            foreach ($collection as $id => $relations) {
//                if ($model === $baseModel) {
//                    $filteredGraph[$model][$id] = $collection;
//                }
//                if(!$collection)  continue;
//                //if($model === $baseModel && )
//                if (!$relations) {
//                    throw new \Exception('error relations for '.$model.'. Check relationsMethods array, this model');
//                }
//                foreach ($relations as $relationModel => $relationsIds) {
//                    if($filteredGraph[$relationModel]){
//                        //array intersect
//                        $totalRelationsIds = array_intersect($filteredGraph[$relationModel], $relationsIds);
//                        $filteredGraph[$relationModel] = ( !$filteredGraph[$relationModel] ) ? $relationsIds : array_intersect($filteredGraph[$relationModel], $relationsIds);
//
//                        //if(!$totalRelationsIds)   todo тут надо придумать что делать если стала пустая модель для выдачи
//                        //либо
//                    }
//
//                }
//
//            }
//        }
//        return $graph;
//    }


    protected function stalker(array $discoveryMap, $cityBegin = null, array $roadsBegin = null): array    {
        $terrain = ($cityBegin && $roadsBegin) ? array_intersect_key(array_combine($roadsBegin, $roadsBegin),$this->graph) : $this->graph;

        foreach ($terrain as $city => $roads) {
            if($discoveryMap[$city] || !$roads) continue;

            foreach ($roads as $street => $nearCities) {
                if (!$nearCities) {
                    $discoveryMap[$city] = [];
                    continue;
                }
                foreach ($nearCities as $nearCity => $nearCityRoads) {
                    if ( $discoveryMap[$nearCity] || !$nearCityRoads ) {
                        continue;
                    }
                    $discoveryMap[$city] = $this->stalker($discoveryMap, $nearCity, $nearCityRoads );
                }
            }
        }

        return $discoveryMap;
    }



}
