<?php


namespace Modules\Reviews\Http\Services;
use Modules\Reviews\Entities\DoctorReview;
use App\Models\Doctor;


class Target
{
    private const TARGET_MAP = [
        'doctorReview' => 'Modules\Reviews\Entities\DoctorReview',
        'doctor' => 'App\Models\Doctor',
    ];

    public function getModel(string $type) {
        if($this->checkTargetName($type)){
            $className = self::TARGET_MAP[$type];
            return $className::query();
        }
    }

    public function checkTargetName(string $targetName):bool {
        return isset(self::TARGET_MAP[$targetName]);
    }

    public function getNameList(){
        return array_keys(self::TARGET_MAP);
    }
}
