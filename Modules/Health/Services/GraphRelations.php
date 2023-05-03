<?php


namespace Modules\Health\Services;
//use Modules\Reviews\Entities\DoctorReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Modules\Health\Entities\Doctor;
use Modules\Health\Entities\Service;
use Modules\Health\Entities\Variation;


class GraphRelations
{
    private const TARGET_MAP = [
        'doctor' => Doctor::class,
        'doctors' => Doctor::class,
        'service' => Service::class,
        'services' => Service::class,
        'variation' => Variation::class,
        'variations' => Variation::class,
    ];

    private const MODEL_INFO_MAP = [
        Doctor::class => ['alias' => 'doctor', 'name' => 'Doctor'],
        Service::class => ['alias' => 'service', 'name' => 'Service'],
        Variation::class => ['alias' => 'variation', 'name' => 'Variation'],
    ];


    private const RELATIONS_METHODS = [
        Service::class => 'services',
        Variation::class => 'variations',
        Doctor::class => 'doctors',
    ];

    public function getModels():array {

        return array_keys(self::MODEL_INFO_MAP);
    }

    public function getModelByAlias(string $alias) {
        return self::TARGET_MAP[$alias];
    }

    public function getAliasByModel( $model ) {
        return self::MODEL_INFO_MAP[$model]['alias'];
    }

    public function getRelationsMethod(string $model){
        return self::RELATIONS_METHODS[$model];
    }

    public function getClassNameByModel(string $model):string {
        return self::MODEL_INFO_MAP[$model]['name'];
    }

    public function getRelationsMethods():array {
        return array_values( self::RELATIONS_METHODS );
    }

    public function getPathOfCollection($collection):array {
        $keys = $collection->first()->getRelations();
        if (!$keys) return [];
        $outKeys = [];
        foreach ($keys as $key => $relatedCollection) {
            $relKeys = $this->getPathOfCollection($relatedCollection);
            if (!$relKeys) return $keys;
            foreach (array_keys($relKeys) as $k) {
                $outKeys[$key . '.' . $k] = $key . '.' . $k;
            }
            return $outKeys;
        }
        return $outKeys;
    }
    public function addBaseToPaths( array $paths, $collection):array {
        $outPaths = [];
        $baseClass = $collection->first();
        if(!$baseClass) return $paths;
        $baseModelName = $this->getRelationsMethod(get_class($baseClass));
        if(!$baseModelName) return $paths;
        foreach ($paths as $path){
            $outPaths[] = $baseModelName.'.'.$path;
        }

        return $outPaths;
    }

    public function getPathsByTargets(array $targets, array $paths):array {
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

    public function getIdsByPaths(array $paths, Collection $collection):Collection{
        $outCollection = collect([]);
        foreach ($paths as $path){
            $outCollection = $outCollection->merge($collection->pluck($path.'.*.id'));
        }
        return $outCollection->unique();
    }
}
