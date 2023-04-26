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
    protected array $mapModelToAlias = [];
    protected array $mapAliasToModel = [];

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

        $this->composeGraphData($models);




        return $this;
    }

    protected function composeGraphData($models):self {
        $this->graphModels = $this->composeGraph($models);
        if(!$this->graphModels) return $this; //<<<<<<<<<<<<<<<<<
        foreach ($this->graphModels as $graphModel => $graphRelations){
            $this->mapModelToAlias[$graphModel] = $graphModel::MODEL_RELATION_ALIAS;
            $this->mapAliasToModel[$graphModel::MODEL_RELATION_ALIAS] = $graphModel;
        }
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
        //fill data from db
        $this->graphData = $this->graphFillFromDB();



        //$this->graphData = $this->graphToIds( $this->graphData );


        if(! $this->graphData) {
            return [];
        }
//        $this->graphIds = $this->graphToIds();


//        Log::info(print_r($this->graphData,1));
        return [];
    }



    protected function graphFillFromDB() : array {
        $graphCollections = [];
        $graphModels = [];
        $graphModelIds = array_fill_keys(array_keys($this->graphModels), []);
        foreach ($this->graphModels as $model => $relations){
            $q = ( isset($this->modelsWhere[$model]) ) ?
                $this->modelsWhere[$model] :
                $model::query();
            //if select fields filled add id
            $selectFields = $q->getQuery()->columns;
            if(!$selectFields || !in_array('id', $selectFields)){
                $q->addSelect('id'); //always use ids
            }


            if( $relations ) {
                foreach ($relations as $relationModel => $relation ) {

                    if(isset($graphCollections[$relationModel]) ){
                        //если уже есть коллекция с данными из базы
                        //todo нужно взять ids и распределить в текущую коллекцию с заданными ключами
                    }
                    //todo select $relationModels, only ids with pivot data
                    //todo проверить что запрос уже может быть настроен извне, на фильтрацию по текущему pivot
                    $q -> with([$relation => function ($query) use($relation) {
                        $prefix = $query->getQuery()->from;
                        $query->addSelect($prefix.'.id as id');
                    }]);
//
                }
            }
            if(isset($graphModelIds[$model]) && $graphModelIds[$model]){
                $q->whereIn('id', $graphModelIds[$model]);
            }

            $s = $q->getQuery()->toSql();
            $c = $q->get();
            $graphCollections[$model] = $c;


            $modelArray = $this->collectionToKeyArray($c);


            $graphModels[$this->mapModelToAlias[$model]] = $modelArray;
            //add where relations models by get relations items ids
            if(isset($this->graphModels[$model])){
                $currentRelationsIds = $this->getRelationsIds($modelArray, $this->graphModels[$model]);
                if($currentRelationsIds){
                    $graphModelIds = array_merge_recursive($graphModelIds, $currentRelationsIds);
                }
            }
        }
        //revers filter models by ids for consistent relations
        //if necessary only fill relations of models
        //$graphCollections = $this->reversFilterByIds($graphModelIds, $graphCollections);

        //$graphCollections = $this->setRelationsById($graphCollections);
        return $graphModels;
        return $graphCollections;
    }
    protected function reversFilterByIds( array $graphModelIds, array $graphFromDb ):array {
        $graphModelCollections = $graphFromDb;
        foreach ($graphModelIds as $model => $collectionIds){
            if(isset($graphModelCollections[$model])){
                $collectionIds = ($collectionIds)  ? $collectionIds : collect([]);
                $graphModelCollections[$model] = $graphModelCollections[$model]->whereIn('id', $collectionIds);
            }
        }
        return $graphModelCollections;
    }

    protected function collectionToKeyArray($modelCollection):array {
        if( $modelCollection->count() < 1 ) return []; //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        $modelArray = $modelCollection->toArray();
        if( !$modelArray ) return []; //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        $modelArray = array_combine(array_column($modelArray, 'id'), $modelArray);
        foreach ($modelArray as $id => $item){
            if(!$item) continue;
            foreach ($item as $field=> $val){
                if(is_array($val)){
                    $modelArray[$id][$field] = array_combine(array_column($val, 'id'), $val);
                }
            }
        }
        return $modelArray;
    }

    protected function getRelationsIds($modelArray, $relationModels):array {
        $arrayIds = [];
        if( !$modelArray ) return []; //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        foreach ($relationModels as $model => $field){
            foreach ($modelArray as $id => $item){
                if(isset($item[$field]) && $item[$field] && is_array($item[$field])) {
                    $arrayIds[$model] = (isset($arrayIds[$model]) && $arrayIds[$model] ) ? $arrayIds[$model] + array_keys($item[$field]) : array_keys($item[$field]);
                }
            }
        }

        return $arrayIds;
    }


//
//    protected function graphToIds(array $graphCollections):array {
//
//        $graphByIds = [];
//        foreach ($graphCollections as $model => $collection){
//            $relationsFields = [];
//            //get relations fields
//            if(isset($this->graphModels[$model]) && $this->graphModels[$model]){
//                $relationsFields = array_values($this->graphModels[$model]);
//            }
//            if($relationsFields){
//                foreach ($relationsFields as $field){
//                    $f = $collection->variations;
//                    $collection->setRelation($field, $collection->$field()->keyBy('id'));
//                }
//            }
//
//            $r = $collection->keyBy('id')->toArray();
//            $e = 98;
////            if(!$relations && isset($graphCollections[$model])) {
////                $graphByIds[$model] = $graphCollections[$model]->pluck('id');
////                continue;
////            }
////
////            foreach ($relations as $relationModel => $relation) {
////
////            }
//
////            if(is_array($relations)) {
////                //если node это массив запускаем рекурсию этой функции
////                $modelIds[$node] = $this->collectionsToIds($path, $collections);
////            }else{
////                $modelIds[$node] = $collections[$node]->pluck('id');
////            }
//
//        }
//        return $graphByIds;
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
