<?php


namespace Modules\Health\Services\VariationsCalculators\DoctorUseVariationCalculator;
use Illuminate\Support\Collection;

class UseBySkill
{
    protected bool $merge = false;
    protected bool $filter = false;
    protected Collection $collection;


    public function buildQuery($query) {
        //this calc use skills doctor and variation
        $query->with('variations', function ($query){
            $alias = $query->getQuery()->from;
            $query->addSelect($alias.'.id', $alias.'.skill');
        });
        $query->with('info', function($query){
            $alias = $query->getQuery()->from;
            $query->addSelect($alias.'.id', $alias.'.skill');

        });

        return $query;
    }




    public function calculate(Collection $collectionFromDB, array $outData = [])    {
        //находим и сохраняем пути до докторов
        //если коллекция по докторам, то сохраняем метку что заданная коллекция по докторам
        //находим и сохраняем пути до вариаций внутри докторов
        //обходим коллекцию

        foreach ( $collectionFromDB as $doctor ){
            if(!$outData[$doctor->id]) $outData[$doctor->id] = ['id' => $doctor->id, 'variations' => [] ];
            if(!$doctor->info || !$doctor->variations) continue;
            foreach ($doctor->variations as $variation){
                //if(!$variation->skill) continue;
                if(!$this->filter && !$outData[$doctor->id]['variations'][$variation->id]){
                    $outData[$doctor->id]['variations'][$variation->id] = ['id' => $variation->id];
                }

                if($variation->skill && $doctor->info->skill === $variation->skill){
                    if($this->merge){
                        $outData[$doctor->id]['variations'][$variation->id] += ($outData[$doctor->id]['variations'][$variation->id])
                            ? $outData[$doctor->id]['variations'][$variation->id] + ['id' => $variation->id, 'useBySkill' => true]
                            : ['id' => $variation->id, 'useBySkill' => true];
                    }
                }elseif (!$variation->skill && !$this->filter){

                }


                $fe = 123;
            }
            $fer = $doctor->info->skill;
        }


        return ;
    }

    public function merge(Collection $collectionFromDB, array $outData = []){
        $this->merge = true;
        return [];
    }

    public function filter(Collection $collectionFromDB, array $outData = []) {
        $this->filter = true;
        return [];
    }

    public function filterAndMerge(Collection $collectionFromDB, array $outData = []) {
        $this->merge = true;
        $this->filter = true;

    }



}
