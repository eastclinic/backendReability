<?php


namespace Modules\Health\Services\VariationsCalculators\DoctorUseVariationCalculator;


class UseBySkill
{
    protected bool $isUse = true;

    public function buildQuery($query) {
        //this calc use skills doctor and variation
        //if in query not Doctor, it makes no sense
        $className = get_class($query->getModel());
        if($className !== 'Modules\Health\Entities\Doctor'){
            $this->isUse = false;
            return $query;
        }
        $eagerLoads = $query->getEagerLoads();
        $alias = $query->getQuery()->from;
        if($eagerLoads){
            if($eagerLoads['variations']){
                $eagerLoads['variations']->addSelect($alias.'.skill');
            }else{
                $query->with('variations', function ($query) use ( $alias ){
                    $query->addSelect($alias.'.skill');
                });
            }

        }
        return $query;
    }


}
