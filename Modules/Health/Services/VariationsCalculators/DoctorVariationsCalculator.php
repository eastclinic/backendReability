<?php


namespace Modules\Health\Services\VariationsCalculators;



use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Facades\Log;
use Modules\Health\Entities\Doctor;
use Modules\Health\Entities\Variation;
use Modules\Health\Services\GraphRelations;
use Modules\Health\Services\VariationsCalculators\DoctorUseVariationCalculator\DoctorUseVariationCalculator;
use Modules\Health\Services\VariationsCalculators\DoctorUseVariationCalculator\UseBySkill;

class DoctorVariationsCalculator
{

    protected Collection $collection;
    protected bool $putData = false;
    protected ?array $variationsIds = null;
    protected ?array $doctorsIds = null;
    protected array $calculatorsClasses = [
        UseBySkill::class,
//        UseByAlwaysMark::class
    ];
    protected bool $merge = false;
    protected bool $filter = false;



    public function forCollection($collection):self {
        $graph = new GraphRelations();
        //add wrapper by base class
        $relationName = $graph->getRelationName($collection->getQueueableClass());
        if(!$relationName) return $this;
        $this->collection =$collection;
        //$this->collection = collect([$relationName => $collection]);
        $relations = $collection->getQueueableRelations();

//        $ed = [
//            2 =>['variations' => [ 3=> ['id' => 3, 'use' => true], 8 => ['id' => 8, 'use' => false]]]
//        ];

        $data = ['doctors' => $this->collection->toArray()];
        $this->doctorsIds = $this->getKeys($data, 'doctors');
        $this->variationsIds = $this->getKeys($data, 'variations');


//        Arr::set();

//
//       //$dde3 = collect(['doctors' => $data]);
//        //$ter = $dde3->pluck('doctors.*.id');
//        $fdf  = $collection->getQueueableRelations();
//
//
//
//        $paths = $graph->getPathOfCollection($collection);
//        //add base class to paths
//        $paths = $graph->addBaseToPaths($paths, $collection);
//        //get variations after doctors paths
//        $variationsPaths = $graph->getPathsByTargets(['doctors', 'variations'], $paths);
//        $doctorsPaths = array_unique($graph->getPathsByTargets(['doctors'], $paths));
//        if(!$variationsPaths || !$doctorsPaths) return $this;
//        $this->variationsPaths = $variationsPaths = $graph->removeBaseFromPaths( $variationsPaths );
//        $this->doctorsPaths =$doctorsPaths = $graph->removeBaseFromPaths( $doctorsPaths );
//
//        $this->variationsIds = $graph->getIdsByPaths($variationsPaths, $collection);
//
//
//        $this->doctorsIds = $graph->getIdsByPaths($doctorsPaths, $collection);

        return $this;
    }

    public function mergeCalcData():array    {

        if( !$this->collection || !$this->variationsIds || !$this->doctorsIds )return [];
        $this->merge = true;
        $this->filter = false;
        $doctorsVariationsBinds = $this->getDoctorsVariationsBinds();


        $d = $this->updateCollectionByDoctorVariationsBinds($this->collection, $doctorsVariationsBinds);

        $data = ['doctors' => $this->collection->toArray()];
        foreach ($doctorsVariationsBinds as $doctorId => $doctorInfo){
            if(!isset($doctorInfo['variations']) || !$doctorInfo['variations']) continue;
            //обходим исходный массив
            $data = $this->searhic($data, $doctorId, $doctorInfo['variations']);
        }


        return $doctorsVariationsBinds;
        //need calculators
//        $doctorsUseVariations = (new DoctorUseVariationCalculator())
//            ->forDoctorsIds( $this->doctorsIds )
//            ->forVariationsIds( $this->variationsIds )
//            ->mergeData()
//            ->get();

        //merge collections
        return [];
    }

    public function filter():Collection {
        return $this->collection;
    }
    public function filterWithMergeCalcData():Collection {
        return $this->collection;
    }


    public function getDoctorsVariationsBinds():array {
        $doctorsUseCalculators = $this->getDoctorsUseCalculators();

        if( !$this->variationsIds || !$doctorsUseCalculators ) return [];

        //выбираем коллекцию докторов и вариаций распределенных по доктора
        //для доктора нужен только id и  skill
        //для вариаций нужны ids , skills, pivot данные
        //какие pivot данные нужны, будут решать множество калькуляторов из массива калькуляторов
        //эти калькуляторы настраивают какие еще нужны данные в запросе
        //а потом получают коллекцию сфорированную запросом, и производят какие то действия
        //в цикле обходим калькуляторы для каждого доктора,
        //калькулятор производит вычисления с переданными данными доктора, вариаций и связок
        //калькулятор не может ограничивать выборку вариаций или докторов, т.к. возможно другие вариации ожидают полный список
        //калькулятор может добавлять select  поля в запрос, или доп запросы, к другим таблицам
        //затем в цикле опрашиваются калькуляторы в порядке очередности
        //если калькулятор обрабатывает вариации, он добавляет какие то данные
        //калькулятор может удалить вариацию если посчитает нужным
        //следующие калькуляторы тоже могут удалить вариацию, если посчитают нужным
        //можно использовать метод onlyMark, что бы не удалять вариации, а проставлять метки
        //какую метку ставить решает сам калькулятор

        //межно дать возможность, извне управлять очередность и номенклатуру срабатывания калькуляторов
        $query = $this->getDoctorUseQuery();

        foreach ($doctorsUseCalculators as $calculator){
            $query = $calculator->buildQuery($query);
        }

        $collectionFromDb = $query->get();
        $f = $query->toSql();
        //получены доктора с вариациями, и с другими необходимыми данными
        //каждому калькулятору передаем исходную коллекцию,
        $outData = [];
        foreach ($doctorsUseCalculators as $calc){
            if($this->merge) $calc->mergeData($this->merge);
            if($this->filter) $calc->filterVariations($this->filter);
            $outData = $calc->mergeData($this->merge)->filterVariations($this->filter)->calculate($collectionFromDb, $outData );
        }



        return $outData;
    }

    protected function getDoctorUseQuery(){
        if($this->doctorsIds){
            $query = Doctor::whereIn('id', $this->doctorsIds)->
            with('variations', function ($query){
                $primaryKey = $query->getQuery()->from.'.'.$query->getQuery()->getModel()->getKeyName();
                $query->whereIn($primaryKey, $this->variationsIds);
            });
        }else{
            $query = Variation::whereIn('id', $this->variationsIds);

        }
        return $query;
    }


    public function IsUse():self  {
        //в методе определяются вариации которые используются доктором
        //если доктор не указан то нет смысла
        return $this;
    }

    protected function putData():self {
        $this->putData = true;
        return $this;
    }


    protected function getDoctorsUseCalculators():array {
        if(!$this->calculatorsClasses) return [];
        $calculators = [];
        foreach ($this->calculatorsClasses as $calculatorClass){
            $calculators[$calculatorClass] = new $calculatorClass();
        }
        return $calculators;
    }

    protected function getKeys( array $data, $keyName ){
        $ids = [];
        foreach ($data as $key => $item) {
            if (!is_array($item)) continue;
            if($key === $keyName){
                $keys = array_keys($item);
                return array_combine($keys, $keys);
            }
            $ids += $this->getKeys($item, $keyName);
        }
        return $ids;
    }

    protected function updateCollectionByDoctorVariationsBinds($collection, $doctorVariationsBinds, int $doctorId = 0){
        $idDoctorClass = ($collection->getQueueableClass() === 'Modules\Health\Entities\Doctor');
        foreach ($collection as $item){
            if(!$doctorId && $idDoctorClass){
                //get relations names
                $relations = $collection->getQueueableRelations();
                $doctorId = $item->id;
                if(array_search('variations', $relations ) !== false){
                    foreach ($item->variations as $variation){
                        $gr = 10;
                    }
                    continue;
                }
            }
            $collection = $this->updateCollectionByDoctorVariationsBinds($doctorVariationsBinds);
        }





        //get relations names
        $relations = $collection->getQueueableRelations();
//        if(array_search('variations', $relations ) !== false){
//
//        }else{
//            foreach ()
//            $this->updateCollectionByDoctorVariationsBinds();
//        }
        foreach ($collection as  $col){

        }
        return $collection;

    }

    protected function searhic(array $data, $doctorId, $vari = [], $isDoc = false):array {
        //обходим исходный массив
        //если сейчас $key === doctors и задан $doctorId
        //значит включается алгоритм поиска вариаций во вложенных уровнях массива
        foreach ($data as $key => $item){
            if(!is_array($item)) continue;
            if($key === 'doctors' && $item[$doctorId]){
                $data[$key][$doctorId] = $this->searhic($item[$doctorId], $doctorId, $vari, true);
                break;
            }
            if($key === 'variations' && $vari && $isDoc){
                //корректно слить вариации
                //либо отфильтровать в зависимости от задания
                $variations = [];
                foreach ($item as $vKey => $variation){
                    $variations[$vKey] = (isset($vari[$vKey]) && $vari[$vKey]) ? $variation + $vari[$vKey] : $variation;
                }
                $data[$key] = $variations;
                break;
            }
            $data[$key] = $this->searhic($item, $doctorId, $vari, $isDoc);

        }
        return $data;
    }


}
