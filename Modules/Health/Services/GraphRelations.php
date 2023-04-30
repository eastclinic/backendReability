<?php


namespace Modules\Health\Services;
//use Modules\Reviews\Entities\DoctorReview;
use Illuminate\Database\Eloquent\Model;
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

}
