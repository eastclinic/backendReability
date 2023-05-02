<?php


namespace Modules\Health\Services\VariationsCalculators;



use Illuminate\Support\Collection;
use Modules\Health\Services\GraphRelations;
use Modules\Health\Services\VariationsCalculators\DoctorUseVariationCalculator\DoctorUseVariationCalculator;

class VariationsCalculator
{

    protected Collection $collection;
    protected bool $putData = false;
    protected array $variationsPaths = [];
    protected Collection $variationsIds;
    protected Collection $doctorsIds;


    public function forCollection($collection):self {
        $this->collection = $collection;
        //get paths for use in pluck()
        $paths = $this->getPathOfCollection($collection);
        //add base class to paths
        $paths = $this->addBaseToPaths($paths, $collection);
        //get variations after doctors paths
        $variationsPaths = $this->getPathsByTargets(['doctors', 'variations'], $paths);
        $doctorsPaths = array_unique($this->getPathsByTargets(['doctors'], $paths));
        if(!$variationsPaths || !$doctorsPaths) return $this;
        $this->variationsIds = $this->getIdsByPaths($variationsPaths, $collection);
        $this->doctorsIds = $this->getIdsByPaths($doctorsPaths, $collection);

        return $this;
    }

    protected function getPathsByTargets(array $targets, array $paths):array {
        $outPaths = [];
        foreach ($paths as $path){
            $beginOffset = false;
            $offset = false;
            foreach ($targets as $target){
                $tstrpos = strpos($path, $target, $offset);
                if($beginOffset === false) $beginOffset = $tstrpos;
                if($tstrpos === false) {
                    $offset = false;
                    break;
                }
                $offset += $tstrpos;
            }
            if($offset !== false && $beginOffset !== false){
                $lastTarget = $targets[array_key_last($targets)];
                $outPaths[] = substr($path, $beginOffset, $offset + strlen($lastTarget));
            }
        }

        return $outPaths;
    }

    protected function getIdsByPaths(array $paths, Collection $collection):Collection{
        $outCollection = collect([]);
        foreach ($paths as $path){
            $outCollection = $outCollection->merge($collection->pluck($path.'.*.id'));
        }
        return $outCollection->unique();
    }



    public function get():Collection    {

        if( !$this->variationsIds || !$this->doctorsIds )return $this->collection;

        $doctorsUseVariations = (new DoctorUseVariationCalculator())
        ->forDoctorsIds(collect([1]))
        ->forVariationsIds(collect([2]))
        ->get();

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
    protected function addBaseToPaths( array $paths, $collection):array {
        $outPaths = [];
        $baseClass = $collection->first();
        if(!$baseClass) return $paths;
        $baseModelName = (new GraphRelations())->getRelationsMethod(get_class($baseClass));
        if(!$baseModelName) return $paths;
        foreach ($paths as $path){
            $outPaths[] = $baseModelName.'.'.$path;
        }

        return $outPaths;
    }


    protected function getPathOfCollection($collection, $level = 0)
    {
        $keys = $collection->first()->getRelations();
        if (!$keys) return [];
        $outKeys = [];
        foreach ($keys as $key => $relatedCollection) {
            $relKeys = $this->getPathOfCollection($relatedCollection, $level + 1);
            if (!$relKeys) return $keys;
            foreach (array_keys($relKeys) as $k) {
                $outKeys[$key . '.' . $k] = $key . '.' . $k;
            }
            return $outKeys;
        }
    }

}
