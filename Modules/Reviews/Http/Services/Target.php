<?php


namespace Modules\Health\Services;
use Modules\Health\Entities\Doctor;


class Target
{
    private const TARGET_MAP = [
        'doctor' => 'Modules\Health\Entities\Doctor',
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

    public function exist(int $id)
    {

    }
    public function getTargetMap()
    {
        return self::TARGET_MAP;
    }
    public function getTargetNameByClass($class):string {
        return array_search($class, self::TARGET_MAP );
    }

}
