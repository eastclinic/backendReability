<?php


namespace App\Services\Graph;


use Illuminate\Support\Facades\Log;
use Modules\Health\Entities\Doctor;
use Modules\Health\Entities\Service;
use Modules\Health\Entities\Variation;

class RelationGraph
{

    protected array $graph = [['seoServices', 'services', 'variation', 'doctor']];
    protected array $responseModels = [];
    protected array $graphFiltered = [];

    protected array $modelsWhere = [];


    protected array         $modelAliases = [
        'doctor' => Doctor::class,
        'service' => Service::class,
        'variation' => Variation::class,
        //'seoResource' => SeoResource::class,




    ];

    protected array $modelClassToAlias = [
        'Modules\Health\Entities\Doctor' => 'doctor',
        'Modules\Health\Entities\Service' => 'service',
        'Modules\Health\Entities\Variation' => 'variation',
    ];

    public function __construct()    {

    }


    public function withResponseModels( array $models):self    {
        $this->responseModels = $models;
        return $this;
    }

    public function withModel($model):self {
        $modelClass = get_class($model);
        if(!$modelClass) return $this;
        $modelAlias = $this->modelClassToAlias[$modelClass];
        if(!$modelAlias) return $this;
        $this->modelsWhere[$modelAlias] = $model;
        return $this;
    }


    protected function createGraph(array $responseModels):array {


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




        $g = [
            Doctor::class=>['variations' => Variation::class],
            Service::class=>['variations' => Variation::class],
            Variation::class => ['doctors' => Doctor::class, 'services' => Service::class],
        ];



        foreach ($responseModels as $modelClass){

            $d = $modelClass::all();
            if($d)
                foreach ($d as $m){
                    dd($m);
                }
            //$modelRelationsMethods = get_class_methods( $modelClass );
            //$d->getRelations();
            Log::info(print_r($d->getRelations(), 1));

        }




        $graphFiltered = [ 'service', 'variation', 'doctor'];//mock

        return $graphFiltered;
    }






    public function stalker(): self    {
        if(!$this->graphFiltered) {
            $this->graph = $this->createGraph( $this->responseModels );
        }

        return $this;
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
                if($this->modelAliases[$node]){
                    //если нашли класс соответствующий node
                    if($this->modelsWhere[$node])
                    //выборка из бд
                    $graphModels[$node] = $model = ( $this->modelsWhere[$node] ) ? $this->modelsWhere[$node] : $this->modelAliases[$node]::query();

                    //в $this->modelsWhere[Doctor::class] уже может быть фильтрация по pivot
                    //поэтом нужно проверить, вызывался ли метод реляции, или нет
                    //методы реляции хранятся в $this->createGraph()


                    //проверяем есть ли методы - алиасы моделей
                    $modelRelationsMethods = get_class_methods( $model );
                    $modelRelationsMethods = array_combine( $modelRelationsMethods, $modelRelationsMethods );



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
