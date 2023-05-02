<?php


namespace Modules\Health\Services\VariationsCalculators\DoctorUseVariationCalculator;


class UseBySkill
{
    public function buildQuery($query) {
        //данный калькулятор использует скилы доктора и вариации
        //без обоих данных нет смысла


        $className = $query->getModel();
        $eagerLoads = $query->getEagerLoads();
        //если главная модель доктор,
//        if()
        $fffe = 44;
    }

}
