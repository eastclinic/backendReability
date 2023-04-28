<?php


namespace Modules\Health\Services;
//use Modules\Reviews\Entities\DoctorReview;
use Modules\Doctors\Entities\Doctor;


class ModelAlias
{
    private const TARGET_MAP = [
        'doctor' => \Modules\Health\Entities\Doctor::class,
        'service' => \Modules\Health\Entities\Service::class,
        'variation' => \Modules\Health\Entities\Variation::class,
    ];

    public function getModelByAlias(string $alias) {
        return self::TARGET_MAP[$alias];
    }

    public function getAliasByModel( $model ) {
        return array_search($model, self::TARGET_MAP);
    }

}
