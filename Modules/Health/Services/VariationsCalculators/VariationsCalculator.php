<?php


namespace Modules\Health\Services\VariationsCalculators;



use Illuminate\Database\Eloquent\Collection;

class VariationsCalculator
{

    protected Collection $collection;
    protected bool $putData = false;

    public function forCollection($collection):self {
        $this->collection = $collection;
        //обходим коллекцию и находим где скрываются вариации
        //сохраняем путь как добраться до вариации
        //сохраняем части пути как добраться до вариации
        //если среди пути есть доктора и вложенные вариации тогда возможны калькуляции
        //если нет, тогда просто возвращаем коллекцию
        //$first
        $variationsPaths = $this->getVariationPathOfCollection($collection);
        //нужны только те пути которые содержат doctors и variations
        //если внешняя коллекция содержит доктора то отталкиваемся от нее
        //либо ищем doctors в путях


        return $this;
    }

    public function get():Collection    {
        return $this->collection;
    }

    public function IsUse():self  {
        //в методе определяются вариации которые используются доктором
        //если доктор не указан то нет смысла
        return $this;
    }

    protected function putData():self {
        $putData = true;
        return $this;
    }


    protected function getVariationPathOfCollection($collection, $level = 0) {
        $baseModel = $collection->first();
        $keys = $baseModel->getRelations();
        if(!$keys) return '';
        $outKeys = [];
        foreach ($keys as $key => $relatedCollection){
            $relKeys = $this->getVariationPathOfCollection($relatedCollection, $level+1);
            if(!$relKeys) return $keys;
            if(is_array($relKeys)){
                foreach (array_keys($relKeys) as $k){
                    $outKeys[$key.'.'.$k] = $key.'.'.$k;
                }
            }
            if(is_string($relKeys)){
                $outKeys[$key.'.'.$relKeys] = $key.'.'.$relKeys;
            }
        }

        if($level === 0){
            $modelName = class_basename($baseModel);
            $rKeys = $outKeys;
            if($modelName === 'Doctor'){
                $rKeys = array_map( function ($rk){
                    $ttt = strrpos($rk, 'variations');
                    return 'doctor.'.$rk;
            }, $outKeys);
            }
            if($rKeys){
                $outKeys = array_filter($rKeys, function ($key){
                    $posDoc = strpos($key, 'doctor' );
                    $strPosVar = strpos($key, 'variations' );
                    return ($posDoc >= 0 && $strPosVar > $posDoc);
                });
            }
            $outKeys = array_map( function ($rk){
                return substr($rk, 0, strrpos($rk, 'variations')+10);
            }, array_keys($outKeys));
            return $outKeys;
        }

        return $outKeys;
    }


}
