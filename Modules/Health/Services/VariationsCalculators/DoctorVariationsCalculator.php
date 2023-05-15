<?php


namespace Modules\Health\Services\VariationsCalculators;



use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Modules\Health\Services\GraphRelations;
use Modules\Health\Services\VariationsCalculators\DoctorUseVariationCalculator\DoctorUseVariationCalculator;

class DoctorVariationsCalculator
{

    protected Collection $collection;
    protected bool $putData = false;
    protected ?array $variationsIds = null;
    protected ?array $doctorsIds = null;





    public function forCollection($collection):self {
        $graph = new GraphRelations();
        //add wrapper by base class
        $relationName = $graph->getRelationName($collection->getQueueableClass());
        if(!$relationName) throw new \Exception('No set relations name for '.$collection->getQueueableClass());
        $this->collection =$collection;
        //$this->collection = collect([$relationName => $collection]);
        //$relations = $collection->getQueueableRelations();

//        $ed = [
//            2 =>['variations' => [ 3=> ['id' => 3, 'use' => true], 8 => ['id' => 8, 'use' => false]]]
//        ];

        $data = ['doctors' => $collection->toArray()];
        $this->doctorsIds = $this->getKeys($data, 'doctors');
        $this->variationsIds = $this->getKeys($data, 'variations');



//        foreach ($ed as $doctorId => $vari){
//            //обходим исходный массив
//            $data = $this->searhd($data, $doctorId, $vari['variations']);
//        }
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

    public function mergeCalcData():Collection    {

        if( !$this->collection )return collect([]);
        if( !$this->variationsIds || !$this->doctorsIds )   return $this->collection;
        //need calculators
        $doctorsUseVariations = (new DoctorUseVariationCalculator())
            ->forDoctorsIds( $this->doctorsIds )
            ->forVariationsIds( $this->variationsIds )
            ->mergeData()
            ->get();

        //merge collections
        return $this->collection;
    }

    public function filter():Collection {
        return $this->collection;
    }
    public function filterWithMergeCalcData():Collection {
        return $this->collection;
    }

    protected function get():Collection{
        return $this->collection;
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

    protected function searhd(array $data, $doctorId, $vari = [], $isDoc = false):array {
        //обходим исходный массив
        //если сейчас $key === doctors и задан $doctorId
        //значит включается алгоритм поиска вариаций во вложенных уровнях массива
        foreach ($data as $key => $item){
            if(!is_array($item)) continue;
            if($key === 'doctors' && $item[$doctorId]){
                $data[$key][$doctorId] = $this->searhd($item[$doctorId], $doctorId, $vari, true);
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
            $data[$key] = $this->searhd($item, $doctorId, $vari, $isDoc);

        }
        return $data;
    }


}
