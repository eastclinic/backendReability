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


    private const RELATIONS_METHODS = [
        Service::class => 'services',
        Variation::class => 'variations',
        Doctor::class => 'doctors',
    ];

    public function getModelByAlias(string $alias) {
        return self::TARGET_MAP[$alias];
    }

    public function getAliasByModel( $model ) {
        return array_search($model, self::TARGET_MAP);
    }

    public function getRelationsMethod(string $model){
        return self::RELATIONS_METHODS[$model];
    }



}
