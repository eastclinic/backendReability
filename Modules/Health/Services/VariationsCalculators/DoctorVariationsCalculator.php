<?php


namespace Modules\Health\Services\VariationsCalculators;



use Illuminate\Support\Collection;
use Modules\Health\Services\GraphRelations;
use Modules\Health\Services\VariationsCalculators\DoctorUseVariationCalculator\DoctorUseVariationCalculator;

class DoctorVariationsCalculator
{

    protected Collection $collection;
    protected bool $putData = false;
    protected array $variationsPaths = [];
    protected ?Collection $variationsIds = null;
    protected ?Collection $doctorsIds = null;



    public function forCollection($collection):self {
        $this->collection = $collection;
        //get paths for use in pluck()
        $graph = new GraphRelations();
        $paths = $graph->getPathOfCollection($collection);
        //add base class to paths
        $paths = $graph->addBaseToPaths($paths, $collection);
        //get variations after doctors paths
        $variationsPaths = $graph->getPathsByTargets(['doctors', 'variations'], $paths);
        $doctorsPaths = array_unique($graph->getPathsByTargets(['doctors'], $paths));
        if(!$variationsPaths || !$doctorsPaths) return $this;
        $variationsPaths = array_map(function ($p){return (strpos($p, 'doctors') === 0) ? str_replace('doctors.', '', $p):$p;}, $variationsPaths);
//        $variationsPaths = array_map(function ($p){return (strpos($p, 'doctors') === 0) ? str_replace('doctors.', '', $p):$p;}, $variationsPaths);

        $this->variationsIds = $graph->getIdsByPaths($variationsPaths, $collection);
        $this->doctorsIds = $graph->getIdsByPaths($doctorsPaths, $collection);

        return $this;
    }

    public function mergeCalcData():Collection    {

        if( !$this->collection )return collect([]);
        if( !$this->variationsIds || !$this->doctorsIds )   return $this->collection;
        //need calculators
        $doctorsUseVariations = (new DoctorUseVariationCalculator())
        ->forDoctorsIds(collect([1]))
        ->forVariationsIds(collect([2]))
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
