<?php


namespace Modules\Health\Services\VariationsCalculators\DoctorUseVariationCalculator;
use Illuminate\Support\Collection;

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
//        $eagerLoads = $query->getEagerLoads();
        $alias = $query->getQuery()->from;
        $query->with('variations', function ($query){
            $alias = $query->getQuery()->from;
            $query->addSelect($alias.'.id', $alias.'.skill');
        });
        $query->with('info', function($query){
            $alias = $query->getQuery()->from;
            $query->addSelect($alias.'.id', $alias.'.skill');

        });


//        if($eagerLoads){
//            if($eagerLoads['variations']){
//                $eagerLoads['variations']->addSelect($alias.'.skill');
//            }else{
//                $query->with('variations', function ($query) use ( $alias ){
//                    $query->addSelect($alias.'.skill');
//                });
//            }
//
//        }
        return $query;
    }


    public function calculate(Collection $collection):Collection    {
        $fewf = $collection->first();
        $classModel = ( $collection->first() ) ?  get_class($collection->first()) : null;
        //work if
        if( !$classModel || $classModel !== 'Modules\Health\Entities\Doctor') return collect();
        foreach ( $collection as $doctor ){
            $fer = $doctor->info->skill;
        }



        return collect();
    }


}
