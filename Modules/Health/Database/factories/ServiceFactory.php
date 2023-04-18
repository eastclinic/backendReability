<?php

namespace Modules\Health\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Health\Entities\Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $services = array_column($this->health_services, 'name');
        return [
                'name' => $this->faker->unique()->randomElement($services)
            //
        ];
    }

    protected $health_services = array(
        array('name' => 'Висцеральная терапия'),
        array('name' => 'Консультация остеопата'),
        array('name' => 'Консультация сексолога'),
        array('name' => 'Консультация гомеопата'),
        array('name' => 'Консультация эндокринолога'),
        array('name' => 'Консультация невролога'),
        array('name' => 'Получение уретрального отделяемого'),
        array('name' => 'Изготовление ортопедических стелек Форм Тотикс'),
        array('name' => 'Изготовление ортопедических стелек Форм Тотикс (детям, до 30 размера)'),
        array('name' => 'Коррекция ортопедических стелек Форм Тотикс'),
        array('name' => 'Пункция суставов с дипроспаном'),
        array('name' => 'Внутрисуставное введение заменителей синовиальной жидкости Интраджект (тазобедренный сустав) '),
        array('name' => 'Внутрисуставная инъекция с вязкоэластичным хондропротектором Нолтрекс'),
        array('name' => 'Прием психолога (повторный)'),
        array('name' => 'Консультация ревматолога (повторная)'),
        array('name' => 'Консультация аллерголога-иммунолога (повторная) '),
        array('name' => 'Консультация уролога (повторная)'),
        array('name' => 'Консультация терапевта (повторная) '),
        array('name' => 'Консультация диетолога (онлайн) '),
        array('name' => 'УЗИ паращитовидных желез'),
        array('name' => 'Консультация гинеколога-эндокринолога '),
        array('name' => 'Зондирование влагалища'),
        array('name' => 'Биопсия шейки матки радиоволновая'),
        array('name' => 'Внутрисуставная инъекция Гиалрипайер'),
        array('name' => 'Гирудотерапия (до 5 пиявок)'),
        array('name' => 'Дополнительная пиявка'),
        array('name' => 'Золотая игла для похудения'),
        array('name' => 'Аурикулотерапия'),
        array('name' => 'Цуботерапия'),
        array('name' => 'Мокса-терапия'),
        array('name' => 'Фармакопунктура'),
        array('name' => 'Аппаратная кинезиотерапия'),
        array('name' => 'Индивидуальное занятие ЛФК с инструктором'),
        array('name' => 'Групповое занятие ЛФК с инструктором'),
        array('name' => 'Экзарта + ЛФК'),
        array('name' => 'Флоатинг'),
        array('name' => 'УЗИ плода (2-3 триместр)'),
        array('name' => 'Ультразвуковая диагностика пола плода (с 14 недель)'),
        array('name' => 'Лечебный массаж'),
        array('name' => 'Массаж шейно-воротниковой зоны'),
        array('name' => 'Массаж лица'),
        array('name' => 'Введение акушерского разгружающего поддерживающего кольца (пессария)'),
        array('name' => 'Китайский точечный массаж'),
        array('name' => 'Вызов врача на дом'),
        array('name' => 'Консультация гинеколога (повторная)'),
        array('name' => 'Электронейростимуляция'),
        array('name' => 'Консультация отоневролога'),
        array('name' => 'Консультация терапевта'),
        array('name' => 'УЗИ мягких тканей (одна анатомическая зона)'),
        array('name' => 'УЗИ сустава'),
        array('name' => 'УЗИ лимфатических узлов (одна анатомическая зона)'),
        array('name' => 'УЗИ слюнных желез'),
        array('name' => 'УЗИ плевральной полости'),
        array('name' => 'Дуплексное сканирование сосудов (артерий и вен) верхних конечностей'),
        array('name' => 'Дуплексное сканирование артерий верхних конечностей'),
        array('name' => 'Дуплексное сканирование вен верхних конечностей'),
        array('name' => 'Дуплексное сканирование брахиоцефальных артерий с цветным допплеровским картированием кровотока'),
        array('name' => 'Дуплексное сканирование экстракраниальных отделов брахиоцефальных артерий'),
        array('name' => 'Дуплексное сканирование брахиоцефальных артерий, лучевых артерий с проведением ротационных проб'),
        array('name' => 'Дуплексное сканирование сосудов (артерий и вен) нижних конечностей'),
        array('name' => 'Дуплексное сканирование артерий нижних конечностей'),
        array('name' => 'Дуплексное сканирование вен нижних конечностей'),
        array('name' => 'Триплексное сканирование нижней полой вены, подвздошных вен и вен нижних конечностей (комплексное)'),
        array('name' => 'Дуплексное сканирование брюшного отдела аорты, подвздошных и общих бедренных артерий'),
        array('name' => 'УЗИ печени'),
        array('name' => 'УЗИ гепатобиллиарной зоны'),
        array('name' => 'УЗИ желчного пузыря и протоков'),
        array('name' => 'УЗИ поджелудочной железы'),
        array('name' => 'УЗИ органов брюшной полости (комплексное)'),
        array('name' => 'УЗИ матки и придатков трансабдоминальное'),
        array('name' => 'УЗИ матки и придатков трансвагинальное '),
        array('name' => 'УЗИ матки и придатков трансректальное'),
        array('name' => 'УЗИ молочных желез с допплеровским исследованием'),
        array('name' => 'УЗИ предстательной железы трансабдоминальное'),
        array('name' => 'УЗИ предстательной железы трансректальное'),
        array('name' => 'УЗИ щитовидной железы и паращитовидных желез'),
        array('name' => 'УЗИ периферических нервов (одна анатомическая область)'),
        array('name' => 'УЗИ почек и надпочечников'),
        array('name' => 'УЗИ мочевыводящих путей'),
        array('name' => 'УЗИ почек'),
        array('name' => 'УЗИ мочеточников'),
        array('name' => 'УЗИ мочевого пузыря'),
        array('name' => 'УЗИ мочевого пузыря с определением остаточной мочи'),
        array('name' => 'УЗИ органов мошонки'),
        array('name' => 'Парауретральная блокада'),
        array('name' => 'СМАРТ-ПРОСТ'),
        array('name' => 'УЗИ органов малого таза (комплексное)'),
        array('name' => 'УЗИ позвоночника'),
        array('name' => 'Коррекция ортопедических стелек Форм Тотикс (детям, до 30 размера)'),
        array('name' => 'Внутрисуставная PRP-терапия (1 пробирка, т/бедренный сустав)'),
        array('name' => 'Извлечение акушерского разгружающего поддерживающего кольца (пессария)'),
        array('name' => 'Гинекологический массаж'),
        array('name' => 'Баночный массаж'),
        array('name' => 'Массаж Гуаша'),
        array('name' => 'Внутрикостное капельное введение препаратов'),
        array('name' => 'Внутрикостная блокада'),
        array('name' => 'Паравертебральная блокада'),
        array('name' => 'Блокада грушевидной мышцы'),
        array('name' => 'Блокада тройничного нерва'),
        array('name' => 'Остеопатия'),
        array('name' => 'Тейпирование'),
        array('name' => 'Детензор-терапия (вытяжение позвоночника)'),
        array('name' => 'Мануальная терапия'),
        array('name' => 'Индивидуальная нейрокоррекция (БАК)'),
        array('name' => 'Консультация психотерапевта'),
        array('name' => 'Семейная консультация психолога'),
        array('name' => 'Электрофорез с папаином'),
        array('name' => 'Магнитотерапия'),
        array('name' => 'Фонофорез'),
        array('name' => 'Фонофорез с папаином'),
        array('name' => 'Электростимуляция'),
        array('name' => 'Гальванизация'),
        array('name' => 'Электропунктура'),
        array('name' => 'Лазеротерапия'),
        array('name' => 'Ударно-волновая терапия радиальная'),
        array('name' => 'Консультация врача-физиотерапевта'),
        array('name' => 'Плазмолифтинг интимной зоны'),
        array('name' => 'Инъекция внутримышечная'),
        array('name' => 'Инъекция внутривенная'),
        array('name' => 'Капельное введение препаратов'),
        array('name' => 'Консультация врача'),
        array('name' => 'Консультация гастроэнтеролога'),
        array('name' => 'Иглорефлексотерапия'),
        array('name' => 'Консультация педиатра'),
        array('name' => 'Консультация врача общей практики'),
        array('name' => 'Консультация семейного врача'),
        array('name' => 'Консультация аллерголога-иммунолога'),
        array('name' => 'Консультация ревматолога'),
        array('name' => 'Консультация мануального терапевта'),
        array('name' => 'Консультация травматолога-ортопеда'),
        array('name' => 'Консультация уролога'),
        array('name' => 'Консультация психотерапевта (повторная)'),
        array('name' => 'Консультация рефлексотерапевта'),
        array('name' => 'Семейная психотерапия'),
        array('name' => 'Консультация рефлексотерапевта'),
        array('name' => 'Консультация гинеколога'),
        array('name' => 'Консультация логопеда'),
        array('name' => 'УЗИ ранних сроков'),
        array('name' => 'Фолликулометрия'),
        array('name' => 'УЗИ глазного яблока'),
        array('name' => 'УЗИ сосудов полового члена'),
        array('name' => 'УЗИ желчного пузыря с определением его сократимости'),
        array('name' => 'УЗИ селезенки'),
        array('name' => 'УЗИ надпочечников'),
        array('name' => 'УЗИ забрюшинного пространства'),
        array('name' => 'УЗДГ почечных артерий'),
        array('name' => 'УЗИ сосудов печени'),
        array('name' => 'УЗИ тазобедренного сустава'),
        array('name' => 'Триплексное сканирование сосудов нижних конечностей'),
        array('name' => 'Триплексное сканирование вен'),
        array('name' => 'УЗИ гепатобиллиарной зоны с функциональными пробами'),
        array('name' => 'Допплерография артерий и вен верхних конечностей'),
        array('name' => 'Допплерография артерий верхних конечностей'),
        array('name' => 'Допплерография вен верхних конечностей'),
        array('name' => 'Дуплексное сканирование артерий почек'),
        array('name' => 'Дуплексное сканирование сосудов печени'),
        array('name' => 'Дуплексное сканирование аорты'),
        array('name' => 'Дуплексное сканирование нижней полой вены и вен портальной системы'),
        array('name' => 'Допплерография вен нижних конечностей'),
        array('name' => 'Допплерография артерий и вен нижних конечностей'),
        array('name' => 'Допплерография артерий нижних конечностей'),
        array('name' => 'УЗИ плода (1-й триместр)'),
        array('name' => 'УЗИ средостения'),
        array('name' => 'Дуплексное сканирование интракраниальных отделов брахиоцефальных артерий'),
        array('name' => 'Эхокардиография'),
        array('name' => 'УЗИ головного мозга'),
        array('name' => 'Консультация сексолога (повторная) '),
        array('name' => 'Консультация диетолога'),
        array('name' => 'Консультация геронтолога'),
        array('name' => 'Консультация кардиолога'),
        array('name' => 'Консультация врача ЛФК'),
        array('name' => 'Консультация дерматолога'),
        array('name' => 'Консультация эндокринолога (онлайн)'),
        array('name' => 'Консультация косметолога'),
        array('name' => 'Консультация паразитолога'),
        array('name' => 'Консультация гепатолога'),
        array('name' => 'Консультация врача-флеболога'),
        array('name' => 'Спермограмма'),
        array('name' => 'Инъекции ботулотоксина'),
        array('name' => 'Анализы на ВИЧ'),
        array('name' => 'Липопротеин'),
        array('name' => 'Биопсия вульвы'),
        array('name' => 'Биопсия шейки матки ножевая'),
        array('name' => 'Бужирование цервикального канала'),
        array('name' => 'Введение внутриматочной спирали (без стоимости спирали) '),
        array('name' => 'Кольпоскопия'),
        array('name' => 'Липидный обмен'),
        array('name' => 'Коагулограмма'),
        array('name' => 'Фруктозамин'),
        array('name' => 'Пайпель-биопсия эндометрия'),
        array('name' => 'Лазерная терапия в урологии'),
        array('name' => 'Амниоцентез трансвагинальный'),
        array('name' => 'Снятие швов с шейки матки'),
        array('name' => 'Санация влагалища'),
        array('name' => 'Удаление кисты бартолиновой железы'),
        array('name' => 'Восстановление девственной плевы'),
        array('name' => 'Удаление кондилом'),
        array('name' => 'Дефлорация (рассечение девственной плевы)'),
        array('name' => 'Составление меню диетического питания (с 2-х недельным ведением доктора)'),
        array('name' => 'ЧЭНС (Чрескожная электронейростимуляция)'),
        array('name' => 'Хивамат терапия'),
        array('name' => 'Околосуставное введение гиалуроновой кислоты'),
        array('name' => 'Кардиограмма'),
        array('name' => 'Околосуставное введение лекарственных препаратов (ACP-терапия, 1 пробирка)'),
        array('name' => 'Околосуставное введение лекарственных препаратов (PRP-терапия, 1 пробирка)'),
        array('name' => 'Внутрисуставная ACP-терапия (1 пробирка, т/бедренный сустав)'),
        array('name' => 'Гидромассаж'),
        array('name' => 'Ботулинотерапия'),
        array('name' => 'УЗИ-навигация для проведения малоинвазивной манипуляции'),
        array('name' => 'Блокада сухожилий и связок'),
        array('name' => 'Висцеральная остеопатия'),
        array('name' => 'Лазерофорез'),
        array('name' => 'Получение соскоба с шейки матки '),
        array('name' => 'Пункция сустава (коленный, плечевой суставы)'),
        array('name' => 'Получение цервикального мазка'),
        array('name' => 'Получение влагалищного мазка'),
        array('name' => 'Прием психолога'),
        array('name' => 'Пункция сустава (лучезапястный, голеностопный, локтевой суставы)'),
        array('name' => 'Пункция тазобедренного сустава'),
        array('name' => 'Получение соскоба из уретры'),
        array('name' => 'Сбор секрета простаты'),
        array('name' => 'Вправление парафимоза'),
        array('name' => 'Замена цистостомического дренажа'),
        array('name' => 'ЛОД-терапия с фотостимуляцией'),
        array('name' => 'Вакуумное воздействие (при эректильных нарушениях)'),
        array('name' => 'Радиоволновое удаление полипа уретры'),
        array('name' => 'Удаление катетера Фолея'),
        array('name' => 'Консультация нейрохирурга'),
        array('name' => 'Контрастная эхогистеросальпингоскопия (проводится 3-х кратно)'),
        array('name' => 'Инстилляция мочевого пузыря'),
        array('name' => 'Инстилляция уретры'),
        array('name' => 'Массаж простаты'),
        array('name' => 'Спринцевание влагалища'),
        array('name' => 'Диадинамотерапия'),
        array('name' => 'Интерференцтерапия'),
        array('name' => 'Лазеропунктура'),
        array('name' => 'СМВ-терапия'),
        array('name' => 'Смт-терапия'),
        array('name' => ' УВЧ'),
        array('name' => 'Физиолечение'),
        array('name' => 'Лазерная вапоризация шейки матки'),
        array('name' => 'Электрофорез'),
        array('name' => 'Раздельное диагностическое выскабливание цервикального канала'),
        array('name' => 'Анализ АЛТ'),
        array('name' => 'Гомоцистеин'),
        array('name' => 'Мочевина анализ'),
        array('name' => 'Пункция заднего свода влагалища'),
        array('name' => 'Реконструкция влагалища'),
        array('name' => 'Удаление инородного тела из влагалища'),
        array('name' => 'Анализ кала на кишечные инфекции'),
        array('name' => 'Микроспринцевание (ирригация) влагалища'),
        array('name' => 'Анализ на ротавирус'),
        array('name' => 'Общий анализ кала'),
        array('name' => 'Анализ на гарднеллу'),
        array('name' => 'Антитела ТТГ'),
        array('name' => 'Прогестерон'),
        array('name' => 'Щелочная фосфата'),
        array('name' => 'Креатинин анализ'),
        array('name' => 'Ударно-волновая терапия фокусированная'),
        array('name' => 'Тампонирование влагалища лечебное'),
        array('name' => 'Ферритин'),
        array('name' => 'Общий анализ крови + СОЭ с лейкоцитарной формулой'),
        array('name' => 'Удаление внутриматочной спирали '),
        array('name' => 'Прокальцитонин'),
        array('name' => 'C-реактивный белок (C-Reactive Protein) - высокочувствительный метод - СРБ'),
        array('name' => 'Д димер анализ'),
        array('name' => 'Удаление полипа женских половых органов'),
        array('name' => 'Мочевая кислота (МК)'),
        array('name' => 'Гинетон (внутривлагалищный ультрафонофорез)'),
        array('name' => 'Марсупиализация кисты или абсцесса'),
        array('name' => 'Постановка банок'),
        array('name' => 'Консультация артролога'),
        array('name' => 'Консультация вертебролога'),
        array('name' => 'Консультация вертеброневролога'),
        array('name' => 'Консультация вегетолога'),
        array('name' => 'Консультация врача первичного приёма'),
        array('name' => 'Приём реабилитолога'),
        array('name' => 'Удаление новообразования вульвы '),
        array('name' => 'Каудальная блокада '),
        array('name' => 'Радиоволновое лечение шейки матки '),
        array('name' => 'Остеопатия детская'),
        array('name' => 'Составление меню диетического питания '),
        array('name' => 'Консультация офтальмолога'),
        array('name' => 'Магнитотерапия'),
        array('name' => 'Нейропсихологическая диагностика '),
        array('name' => 'Индивидуальная клинико-психологическая коррекция '),
        array('name' => 'АСТ анализ'),
        array('name' => 'Анализ на Helicobacter pylori '),
        array('name' => 'Креатинкиназа'),
        array('name' => 'Внутрисуставное введение заменителей синовиальной жидкости Интраджект (локтевой, голеностопный, лучезапястный суставы)'),
        array('name' => 'Внутрисуставное введение заменителей синовиальной жидкости Интраджект (коленный, плечевой суставы)'),
        array('name' => 'Нейропсихологическая реабилитация'),
        array('name' => 'ВЛОК (Внутривенное лазерное облучение крови)'),
        array('name' => 'Клинико-психологическое консультирование'),
        array('name' => 'Околосуставное введение лекарственных препаратов (ACP-терапия, 2 пробирки)'),
        array('name' => 'Внутрисуставная PRP-терапия (1 пробирка, коленный, плечевой суставы)'),
        array('name' => 'Внутрисуставная PRP-терапия (1 пробирка, лучезапястный, голеностопный, локтевой суставы)'),
        array('name' => 'Внутрисуставная ACP-терапия (1 пробирка, лучезапястный, голеностопный, локтевой суставы)'),
        array('name' => 'Внутрисуставная ACP-терапия (1 пробирка, коленный, плечевой суставы)')
    );


}
