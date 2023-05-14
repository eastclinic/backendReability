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
    protected array $variationsPaths = [];
    protected array $doctorsPaths = [];
    protected ?Collection $variationsIds = null;
    protected ?Collection $doctorsIds = null;


    protected function searhd(array $data, $doctorId, $vari = [], $isDoc = false):array {
        //обходим исходный массив
        //если сейчас $key === doctors и задан $doctorId
        //значит включается алгоритм поиска вариаций во вложенных уровнях массива
        foreach ($data as $key => $item){
            if($key === 'doctors' && $item[$doctorId]){
                $data[$key] = $this->searhd($item[$doctorId], $doctorId, $vari, true);
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
            if(is_array($item)){
                $data[$key] = $this->searhd($item, $doctorId, $vari, $isDoc);
            }

        }
        return $data;
    }



    public function forCollection($collection):self {
        $graph = new GraphRelations();
        //add wrapper by base class
        $relationName = $graph->getRelationName($collection->getQueueableClass());
        if(!$relationName) throw new \Exception('No set relations name for '.$collection->getQueueableClass());
        $this->collection =$collection;
        //$this->collection = collect([$relationName => $collection]);
        //$relations = $collection->getQueueableRelations();

        $ed = [
            2 =>['variations' => [ 3=> ['id' => 3, 'use' => true], 8 => ['id' => 8, 'use' => false]]]
        ];

        $data = ['doctors' => $collection->toArray()];

        foreach ($ed as $doctorId => $vari){
            //обходим исходный массив
            $data = $this->searhd($data, $doctorId, $vari['variations']);
        }

       //$dde3 = collect(['doctors' => $data]);
        //$ter = $dde3->pluck('doctors.*.id');
        $fdf  = $collection->getQueueableRelations();



        $paths = $graph->getPathOfCollection($collection);
        //add base class to paths
        $paths = $graph->addBaseToPaths($paths, $collection);
        //get variations after doctors paths
        $variationsPaths = $graph->getPathsByTargets(['doctors', 'variations'], $paths);
        $doctorsPaths = array_unique($graph->getPathsByTargets(['doctors'], $paths));
        if(!$variationsPaths || !$doctorsPaths) return $this;
        $this->variationsPaths = $variationsPaths = $graph->removeBaseFromPaths( $variationsPaths );
        $this->doctorsPaths =$doctorsPaths = $graph->removeBaseFromPaths( $doctorsPaths );

        $this->variationsIds = $graph->getIdsByPaths($variationsPaths, $collection);
        $this->doctorsIds = $graph->getIdsByPaths($doctorsPaths, $collection);

        return $this;
    }

    public function mergeCalcData():Collection    {

        if( !$this->collection )return collect([]);
        if( !$this->variationsIds || !$this->doctorsIds )   return $this->collection;
        //need calculators
        $doctorsUseVariations = (new DoctorUseVariationCalculator())
            ->forCollection($this->collection)
            ->forDoctorsIds( $this->doctorsIds )
            ->forVariationsIds( $this->variationsIds )
            ->withDoctorsPaths($this->doctorsPaths)
            ->withVariationsPaths($this->variationsPaths)
            ->mark()
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



}
