<?php


namespace Modules\Health\Services\VariationsCalculators\DoctorUseVariationCalculator;


use Illuminate\Support\Collection;

class DoctorUseVariationCalculator
{
    protected Collection $doctorsIds;
    protected Collection $variationsIds;
    protected bool $onlyMark = false;
    protected array $calculators = [];


    public function forDoctorsIds(Collection $doctorsIds):self {
        $this->doctorsIds = $doctorsIds;
        return $this;
    }

    public function forVariationsIds(Collection $variationsIds):self {
        $this->variationsIds = $variationsIds;
        return $this;
    }

    public function onlyMark():self {
        $this->onlyMark = true;
        return $this;
    }

    public function withCalculators():self{
        //метод выставляте калькуляторы для обработки вариаций
        //он добавляет калькуляторы в начало массивов калькуляторов
        //дубли калькуляторов удаляются из массива
        array_unshift();
        return $this;
    }

    public function get():Collection {

        //выбираем коллекцию докторов и вариаций распределенных по доктора
        //для доктора нужен только id и  skill
        //для вариаций нужны ids , skills, pivot данные
        //какие pivot данные нужны, будут решать множество калькуляторов из массива калькуляторов
        //эти калькуляторы настраивают какие еще нужны данные в запросе
        //а потом получают коллекцию сфорированную запросом, и производят какие то действия
        //в цикле обходим калькуляторы для каждого доктора,
        //калькулятор производит вычисления с переданными данными доктора, вариаций и связок
        //калькулятор не может ограничивать выборку вариаций или докторов, т.к. возможно другие вариации ожидают полный список
        //калькулятор может добавлять select  поля в запрос, или доп запросы, к другим таблицам

        //затем в цикле опрашиваются калькуляторы в порядке очередности
        //если калькулятор обрабатывает вариации, он добавляет какие то данные
        //калькулятор может удалить вариацию если посчитает нужным
        //следующие калькуляторы тоже могут удалить вариацию, если посчитают нужным
        //можно использовать метод onlyMark, что бы не удалять вариации, а проставлять метки
        //какую метку ставить решает сам калькулятор

        //межно дать возможность, извне управлять очередность и номенклатуру срабатывания калькуляторов




        return collect([1, 2]);
    }

}
