<?php

namespace Modules\Health\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Health\Entities\Iservice;
use Modules\Health\Entities\Service;

class VariationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Health\Entities\Variation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //todo move it out fabric or faster this code
        //Iservice::count()
        $iserviceId = $this->faker->numberBetween(1, Iservice::count());
        $serviceId = $this->faker->numberBetween(1, Service::count());
        $names = array_column($this->nameVariations, 'name');
        return [
            'name' => $this->faker->randomElement($names),
            'iservice_id' => $iserviceId,
            'service_id' => $serviceId,
        ];
    }

    protected $nameVariations = array(
        array('name' => 'Введение лекарственных препаратов в область периферического нерва (паравертебральная блокада многоуровневая)'),
        array('name' => 'Блокада тройничного нерва'),
        array('name' => 'Мануальная терапия при заболеваниях позвоночника (30 мин)'),
        array('name' => 'Пункция сустава с введением лекарственного препрарта (п/восп, лучезапястный, голеностопный, локтевой суставы)'),
        array('name' => 'Пункция сустава с введением лекарственного препарата (п/восп., коленный, плечевой суставы)'),
        array('name' => ' Рефлексотерапия при заболеваниях периферической нервной системы (аурикулотерапия, ведущий врач)'),
        array('name' => 'Индивидуальная психотерапия'),
        array('name' => 'Прием (осмотр, консультация) врача-невролога повторный (отоневролога)'),
        array('name' => 'Электрофорез лекарственных препаратов (папаин)'),
        array('name' => 'Общая магнитотерапия'),
        array('name' => 'Ультрафонофорез лекарственный (с папаином)'),
        array('name' => 'Воздействие низкоинтенсивным лазерным излучением при заболеваниях суставов (лазеротерапия)'),
        array('name' => 'Электропунктура в рефлексотерапии (ведущий врач)'),
        array('name' => 'Общий массаж медицинский (30 мин)'),
        array('name' => 'Общий массаж медицинский (45 мин)'),
        array('name' => 'Общий массаж медицинский (60 мин)'),
        array('name' => 'Общий массаж медицинский (ведущий специалист, 30 мин)'),
        array('name' => 'Общий массаж медицинский (ведущий специалист, 45 мин)'),
        array('name' => 'Общий массаж медицинский (ведущий специалист, 60 мин)'),
        array('name' => 'Блокада сухожилий и связок (околосуставное введение препаратов)'),
        array('name' => 'Внутрикостная блокада (1-уровневая)'),
        array('name' => 'Внутрикостная блокада (2-уровневая)'),
        array('name' => 'Внутрикостная блокада (многоуровневая)'),
        array('name' => 'Внутрисуставная ACP-терапия (1 пробирка, лучезапястный, голеностопный, локтевой суставы)'),
        array('name' => 'Внутрикостное капельное введение препаратов'),
        array('name' => 'Внутрисуставное введение заменителей (протезов) синовиальной жидкости (Гиалрипайер 1,5% - 2,0 мл, лучезапястный, голеностопный, локтевой суставы)'),
        array('name' => 'Околосуставное введение лекарственных препаратов (АСР-терапия, 1 пробирка)'),
        array('name' => 'Прием (осмотр, консультация) врача-гомеопата первичный'),
        array('name' => 'В/венное введение капельно Sol.Vinpocetini (Cavintoni) 5 mg/ml 5 ml+ NaCl 0,9% - 200 ml'),
        array('name' => 'В/венное введение капельно Sol.Citicolini (Цераксон, Рекогнан) 1000/4,0 ml + NaCl 0,9% 200 ml'),
        array('name' => 'В/венное введение капельно Sol. Actovegini 10,O ml + NaCl 0,9% 200 ml'),
        array('name' => 'В/венное введение капельно Sol. Actovegini 5,O ml + NaCl 0,9% 200 ml'),
        array('name' => 'В/венное введение капельно Sol.Cerebrolysini 20,0 ml + NaCl 0,9% 200 ml'),
        array('name' => 'В/венное введение капельно Sol. Cerebrolysini 10,0 ml + NaCl 0,9% 200 ml'),
        array('name' => 'Наложение повязки при нарушении целостности кожных покровов (малых сегментов)'),
        array('name' => 'Наложение повязки при нарушении целостности кожных покровов (средних сегментов)'),
        array('name' => 'Наложение повязки при нарушении целостности кожных покровов (Больших сегментов)'),
        array('name' => 'Наложение иммобилизационной повязки при вывихах (подвывихах) суставов (малых сегментов'),
        array('name' => 'Наложение иммобилизационной повязки при вывихах (подвывихах) суставов (средних сегментов)'),
        array('name' => 'Наложение иммобилизационной повязки при вывихах (подвывихах) суставов (больших сегментов)'),
        array('name' => 'Тейпирование'),
        array('name' => 'Тейпирование (ведущий врач)'),
        array('name' => 'Ударно-волновая терапия (4000 ударов, радиальная)'),
        array('name' => 'Ударно-волновая терапия (6000 ударов, радиальная)'),
        array('name' => 'Ударно-волновая терапия (8000 ударов, радиальная)'),
        array('name' => 'Введение лекарственных препаратов в область периферического нерва  (паравертебральная блокада 1-уровневая)'),
        array('name' => 'Введение лекарственных препаратов в область периферического нерва (паравертебральная блокада 2-уровневая)'),
        array('name' => 'Пункция сустава с введением лекарственного препарата (п/восп., т/бедренный сустав)'),
        array('name' => 'Прием (осмотр, консультация) врача-гомеопата повторный'),
        array('name' => 'Тракционное вытяжение позвоночника (детензор-терапия, 30 мин)'),
        array('name' => ' Рефлексотерапия при заболеваниях периферической нервной системы (аурикулотерапия, врач)'),
        array('name' => 'Гальванизация при заболеваниях нервной системы'),
        array('name' => 'Воздействие низкоинтенсивным лазерным излучением при заболеваниях мышц'),
        array('name' => 'Электропунктура в рефлексотерапии (врач)'),
        array('name' => 'Электрофорез с лекарственными препаратами'),
        array('name' => 'Бактериологический посев (кал) на возбудителей кишечной инфекции (сальмонеллы, шигеллы) с определением чувствительности к антибиотикам (включая тиф и паратиф)'),
        array('name' => 'Чрескожная электронейростимуляция при заболеваниях периферической нервной системы'),
        array('name' => 'Упражнения лечебной физкультуры с использованием подвесных систем (60 мин)'),
        array('name' => 'Упражнения лечебной физкультуры с использованием подвесных систем (30 мин)'),
        array('name' => 'Ультразвуковое исследование мягких тканей (одна анатомическая зона, врач)'),
        array('name' => 'Ультразвуковое исследование сустава (врач)'),
        array('name' => 'Ультразвуковое исследование лимфатических узлов (одна зона, врач)'),
        array('name' => 'Ультразвуковое исследование слюнных желез (врач)'),
        array('name' => 'Ультразвуковое исследование плевральной полости'),
        array('name' => 'Дуплексное сканирование сосудов (артерий и вен) верхних конечностей (врач)'),
        array('name' => 'Дуплексное сканирование артерий верхних конечностей (врач)'),
        array('name' => 'Дуплексное сканирование вен верхних конечностей  (врач)'),
        array('name' => 'Дуплексное сканирование брахиоцефальных артерий с цветным допплеровским картированием кровотока (врач)'),
        array('name' => 'Дуплексное сканирование экстракраниальных отделов брахиоцефальных артерий (врач)'),
        array('name' => 'Дуплексное сканирование брахиоцефальных артерий, лучевых артерий с проведением ротационных проб (врач)'),
        array('name' => 'Дуплексное сканирование сосудов (артерий и вен) нижних конечностей (врач)'),
        array('name' => 'Дуплексное сканирование артерий нижних конечностей (врач)'),
        array('name' => 'Дуплексное сканирование вен нижних конечностей (врач)'),
        array('name' => 'Триплексное сканирование нижней полой вены, подвздошных вен и вен нижних конечностей (комплексное, врач)'),
        array('name' => 'Дуплексное сканирование брюшного отдела аорты, подвздошных и общих бедренных артерий (врач)'),
        array('name' => 'Ультразвуковое исследование печени (врач)'),
        array('name' => 'Ультразвуковое исследование гепатобиллиарной зоны (врач)'),
        array('name' => 'Ультразвуковое исследование желчного пузыря и протоков (врач)'),
        array('name' => 'Ультразвуковое исследование поджелудочной железы (врач)'),
        array('name' => 'Ультразвуковое исследование органов брюшной полости (комплексное, врач)'),
        array('name' => 'Ультразвуковое исследование матки и придатков трансабдоминальное (врач)'),
        array('name' => 'Ультразвуковое исследование  матки и придатков трансвагиальное (врач)'),
        array('name' => 'Ультразвуковое исследование матки и придатков трансректальное (врач)'),
        array('name' => 'Ультразвуковое исследование молочных желез с допплеровским исследованием (врач)'),
        array('name' => 'Ультразвуковое исследование простаты трансабдоминальное (врач)'),
        array('name' => 'Ультразвуковое исследование предстательной железы трансректальное (врач)'),
        array('name' => 'Ультразвуковое исследование щитовидной и  паращитовидных желез (врач)'),
        array('name' => 'Ультразвуковое исследование периферических нервов (одна анатомическая область, врач)'),
        array('name' => 'Ультразвуковое исследование почек и надпочечников (врач)'),
        array('name' => 'Ультразвуковое исследование мочевыводящих путей (врач)'),
        array('name' => 'Ультразвуковое исследование почек (врач)'),
        array('name' => 'Ультразвуковое исследование мочеточников (врач)'),
        array('name' => 'Ультразвуковое исследование мочевого пузыря (врач)'),
        array('name' => 'Ультразвуковое исследование мочевого пузыря с определением остаточной мочи (врач)'),
        array('name' => 'Ультразвуковое исследование органов мошонки (врач)'),
        array('name' => 'УЗИ-навигация для проведения малоинвазивной манипуляции'),
        array('name' => 'Ультразвуковое исследование органов малого таза (комплексное, врач)'),
        array('name' => 'Ультразвуковое исследование позвоночника (врач)'),
        array('name' => 'Ультразвуковое исследование фолликулогенеза (врач)'),
        array('name' => 'Ультразвуковое исследование паращитовидных желез (врач)'),
        array('name' => 'Ультразвуковое исследование селезенки (врач)'),
        array('name' => 'Ультразвуковое исследование тазобедренного сустава (врач)'),
        array('name' => 'Ультразвуковое исследование глазного яблока (врач)'),
        array('name' => 'Ультразвуковое исследование сосудов полового члена (врач)'),
        array('name' => 'Ультразвуковое исследование желчного пузыря с определением его сократимости (врач)'),
        array('name' => 'Допплерография артерий и вен верхних конечностей (врач)'),
        array('name' => 'Допплерография артерий верхних конечностей (врач)'),
        array('name' => 'Допплерография вен верхних конечностей (врач)'),
        array('name' => 'Дуплексное сканирование артерий почек (врач)'),
        array('name' => 'Дуплексное сканирование сосудов печени (врач)'),
        array('name' => 'Дуплексное сканирование аорты (врач)'),
        array('name' => 'Дуплексное сканирование нижней полой вены и вен портальной системы (врач)'),
        array('name' => 'Допплерография вен нижних конечностей (врач)'),
        array('name' => 'Допплерография артерий и вен нижних конечностей (врач)'),
        array('name' => 'Допплерография артерий нижних конечностей (врач)'),
        array('name' => 'Триплексное сканирование вен (врач)'),
        array('name' => 'Ультразвуковое исследование надпочечников (врач)'),
        array('name' => 'Ультразвуковое исследование забрюшинного пространства (врач)'),
        array('name' => 'Остеопатическая коррекция соматических дисфункций глобальных биомеханических (педиатрическая, до 14 лет, 30 мин)'),
        array('name' => 'Остеопатическая коррекция соматических дисфункций глобальных биомеханических (педиатрическая, до 14 лет, ведущий врач, 30 мин)'),
        array('name' => 'Остеопатическая коррекция соматических дисфункций глобальных биомеханических (60 мин)'),
        array('name' => 'Тестирование на пищевую аллергию (определение специфических IgG к 90 пищевым аллергенам) IgG'),
        array('name' => 'Остеопатическая коррекция соматических дисфункций глобальных биомеханических (врач-эксперт, 90 мин)'),
        array('name' => 'Выезд на дом с консультацией'),
        array('name' => 'Выезд на дом с лечением'),
        array('name' => 'Выезд на дом с консультацией ведущий врач'),
        array('name' => 'Выезд на дом с лечением ведущий врач'),
        array('name' => 'Внуртисуставная PRP-терапия (1 пробирка,  лучезапястный, голеностопный, локтевой суставы)'),
        array('name' => 'Прием (осмотр, консультация) врача-невролога первичный'),
        array('name' => 'Прием (осмотр, консультация) врача-невролога первичный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-невролога первичный (врач-эксперт 1 кат)'),
        array('name' => 'Прием (осмотр, консультация) врача-невролога повторный'),
        array('name' => 'Прием (осмотр, консультация) врача-невролога повторный (врач эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-невролога повторный (врач-эксперт 1 кат)'),
        array('name' => 'Прием (осмотр, консультация) врача-рефлексотерапевта первичный'),
        array('name' => 'Прием (осмотр, консультация) врача-рефлексотерапевта повторный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-рефлексотерапевта первичный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-рефлексотерапевта повторный'),
        array('name' => 'Прием (осмотр, консультация) врача-рефлексотерапевта повторный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-психотерапевта первичный (60 мин)'),
        array('name' => 'Прием (осмотр, консультация) врача-психотерапевта первичный (60 мин,  ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-психотерапевта первичный (60 мин,  врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-психотерапевта повторный (60 мин)'),
        array('name' => 'Прием (осмотр, консультация) врача-психотерапевта повторный (60 мин,  ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-психотерапевта повторный (60 мин,  врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-остеопата первичный'),
        array('name' => 'Прием (осмотр, консультация) врача-остеопата первичный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-остеопата повторный'),
        array('name' => 'Прием (осмотр, консультация) врача-остеопата повторный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-остеопата повторный (врач-эксперт)'),
        array('name' => 'Осмотр (консультация) врача-физиотерапевта'),
        array('name' => 'Осмотр (консультация) врача-физиотерапевта (ведущий врач)'),
        array('name' => 'Осмотр (консультация) врача-физиотерапевта (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-терапевта первичный'),
        array('name' => 'Прием (осмотр, консультация) врача-терапевта первичный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-терапевта первичный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-терапевта повторный'),
        array('name' => 'Прием (осмотр, консультация) врача-терапевта повторный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-терапевта повторный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача мануальной терапии первичный'),
        array('name' => 'Прием (осмотр, консультация) врача мануальной терапии первичный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача мануальной терапии первичный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача мануальной терапии повторный'),
        array('name' => 'Прием (осмотр, консультация) врача мануальной терапии повторный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача мануальной терапии повторный (врач-эксперт)'),
        array('name' => 'Прием (тестирование, консультация) медицинского психолога первичный (60 мин)'),
        array('name' => 'Прием (тестирование, консультация) медицинского психолога первичный (60 мин ведущий специалист)'),
        array('name' => 'Прием (тестирование, консультация) медицинского психолога первичный (60 мин специалист-эксперт)'),
        array('name' => 'Прием (тестирование, консультация) медицинского психолога повторный (60 мин)'),
        array('name' => 'Прием (тестирование, консультация) медицинского психолога повторный (60 мин ведущий специалист)'),
        array('name' => 'Прием (тестирование, консультация) медицинского психолога повторный (60 мин специалист-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-ревматолога первичный'),
        array('name' => 'Прием (осмотр, консультация) врача-ревматолога первичный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-ревматолога первичный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-ревматолога повторный'),
        array('name' => 'Прием (осмотр, консультация) врача-ревматолога повторный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-ревматолога повторный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-акушера-гинеколога первичный'),
        array('name' => 'Прием (осмотр, консультация) врача-акушера-гинеколога первичный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-акушера-гинеколога первичный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-акушера-гинеколога повторный'),
        array('name' => 'Прием (осмотр, консультация) врача-акушера-гинеколога повторный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-акушера-гинеколога повторный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-педиатра первичный'),
        array('name' => 'Прием (осмотр, консультация) врача-педиатра первичный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-педиатра первичный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-педиатра повторный'),
        array('name' => 'Прием (осмотр, консультация) врача-педиатра повторный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-педиатра повторный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-травматолога-ортопеда первичный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-травматолога-ортопеда повторный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача-остеопата первичный (врач-эксперт)'),
        array('name' => 'Мануальная терапия при заболеваниях позвоночника (ведущий врач, 30 мин)'),
        array('name' => 'Мануальная терапия при заболеваниях позвоночника (врач-эксперт, 30 мин)'),
        array('name' => 'Мануальная терапия при заболеваниях позвоночника (60 мин)'),
        array('name' => 'Мануальная терапия при заболеваниях позвоночника (ведущий врач, 60 мин)'),
        array('name' => 'Мануальная терапия при заболеваниях позвоночника (врач-эксперт, 60 мин)'),
        array('name' => 'Мануальная терапия при заболеваниях суставов (30 мин)'),
        array('name' => 'Мануальная терапия при заболеваниях суставов (ведущий врач, 30 мин)'),
        array('name' => 'Мануальная терапия при заболеваниях суставов (врач-эксперт, 30 мин)'),
        array('name' => 'Мануальная терапия при заболеваниях суставов (60 мин)'),
        array('name' => 'Мануальная терапия при заболеваниях суставов (ведущий врач, 60 мин)'),
        array('name' => 'Мануальная терапия при заболеваниях суставов (врач-эксперт, 60 мин)'),
        array('name' => 'Прием (осмотр, консультация) врача общей практики первичный'),
        array('name' => 'Прием (осмотр, консультация) врача общей практики первичный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача общей практики первичный (врач-эксперт)'),
        array('name' => 'Прием (осмотр, консультация) врача общей практики повторный'),
        array('name' => 'Прием (осмотр, консультация) врача общей практики повторный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача общей практики повторный (врач-эксперт)'),
        array('name' => 'Профилактический прием (осмотр, консультация) врача-акушера-гинеколога'),
        array('name' => 'Прием (осмотр, консультация) врача-акушера-гинеколога беременной первичный'),
        array('name' => 'Прием (осмотр, консультация) врача-акушера-гинеколога беременной повторный'),
        array('name' => 'Кольпоскопия'),
        array('name' => 'Получение цервикального мазка (ДНКом)'),
        array('name' => 'Получение влагалищного мазка (ДНКом)'),
        array('name' => 'Получение соскоба с шейки матки (ДНКом)'),
        array('name' => 'Биопсия шейки матки радиоволновая (без стоимости гистологического исследования, Сургидрон)'),
        array('name' => 'Биопсия шейки матки ножевая (без стоимости гистологического исследования)'),
        array('name' => 'Кардиотокография плода (один плод)'),
        array('name' => 'Наложение компресса на кожу'),
        array('name' => 'Электроэксцизия новообразования вульвы ( цена за 1 кв см)'),
        array('name' => 'Электроэксцизия шейки матки (до 2см кв., без стоимости обезболивания и гистологического исследования)'),
        array('name' => 'Электродиатермоконизация шейки матки'),
        array('name' => 'Введение внутриматочной спирали (без стоимости спирали)'),
        array('name' => 'Микроспринцевание (ирригация) влагалища'),
        array('name' => 'Тампонирование лечебное влагалища'),
        array('name' => 'Пункция заднего свода влагалища'),
        array('name' => 'Реконструкция влагалища (гелем: пластика клитора, половых губ, увеличение точки G, коррекция недержания мочи, возрастных изменений)'),
        array('name' => 'Спринцевание влагалища'),
        array('name' => 'Удаление инородного тела из влагалища'),
        array('name' => 'Инстилляция уретры'),
        array('name' => 'Введение акушерского разгружающего поддерживающего кольца (пессария)'),
        array('name' => 'Извлечение акушерского разгружающего поддерживающего кольца (пессария)'),
        array('name' => 'Введение, извлечение влагалищного поддерживающего кольца (пессария)'),
        array('name' => 'Внутриматочное введение спермы донора'),
        array('name' => 'Марсупиализация абсцесса или кисты женских половых органов'),
        array('name' => 'Консультация аллерголога-иммунолога первичная'),
        array('name' => 'Остеопатическая коррекция соматических дисфункций глобальных биомеханических (педиатрическая, до 14 лет, врач-эксперт, 30 мин)'),
        array('name' => 'Остеопатическая коррекция соматических дисфункций глобальных биомеханических (научный руководитель, 30 мин)'),
        array('name' => 'Остеопатическая коррекция соматических дисфункций глобальных биомеханических (научный руководитель, 15 мин)'),
        array('name' => 'Регистрация электрокардиограммы'),
        array('name' => 'Ультразвуковое исследование плода (1-й триместр) (врач)'),
        array('name' => 'Ультразвуковое исследование средостения'),
        array('name' => 'Ультразвуковое исследование гепатобиллиарной зоны с функциональными пробами (врач)'),
        array('name' => 'Массаж передней брюшной стенки медицинский (висцеральная терапия, 30 мин)'),
        array('name' => 'Электронейростимуляция головного мозга'),
        array('name' => 'Лазерное облучение крови'),
        array('name' => 'Лазерофорез'),
        array('name' => 'Составление меню диетического питания'),
        array('name' => 'Консультация аллерголога-иммунолога повторная'),
        array('name' => 'Упражнения лечебной физкультуры с использованием подвесных систем (ведущий специалист, 30 мин)'),
        array('name' => 'Упражнения лечебной физкультуры с использованием подвесных систем (ведущий специалист, 60  мин)'),
        array('name' => 'Лечебная физкультура при заболеваниях позвоночника (30 мин)'),
        array('name' => 'Лечебная физкультура при заболеваниях позвоночника (ведущий специалист, 30 мин)'),
        array('name' => 'Лечебная физкультура при заболеваниях позвоночника (ведущий специалист, 60 мин)'),
        array('name' => 'Ирригационная анестезия'),
        array('name' => 'Инфильтрационная анестезия'),
        array('name' => 'Удаление доброкачественных новообразований кожи методом электрокоагуляции (1 единица)'),
        array('name' => 'Удаление доброкачественных новообразований кожи методом электрокоагуляции (2-5 единиц)'),
        array('name' => 'Удаление доброкачественных новообразований кожи методом электрокоагуляции (6-10 единиц)'),
        array('name' => 'Биопсия тканей матки (Пайпель биопсия)'),
        array('name' => 'Внутривлагалищный ультрафонофорез при заболеваниях женских половых органов (Гинетон)'),
        array('name' => 'Дуплексное сканирование интракраниальных отделов брахиоцефальных артерий (врач)'),
        array('name' => 'Удаление внутриматочной спирали (простое, за "усы")'),
        array('name' => 'Удаление внутриматочной спирали (сложное)'),
        array('name' => 'Введение внутриматочной спирали (Мирена, без стоимости спирали)'),
        array('name' => 'Зондирование влагалища'),
        array('name' => 'Амниоцентез трансвагинальный'),
        array('name' => 'Биопсия вульвы (без стоимости гистологического исследования)'),
        array('name' => 'Электродиатермоконизация шейки матки (менее 2см кв, без стоимости обезболивания и гистологического исследования)'),
        array('name' => 'Электродиатермоконизация шейки матки (более 2см кв, без стоимости обезболивания и гистологического исследования)'),
        array('name' => 'Восстановление девственной плевы'),
        array('name' => 'Рассечение девственной плевы (без стоимости обезболивания)'),
        array('name' => 'Удаление новообразования малой половой губы'),
        array('name' => 'Удаление полипа женских половых органов (без стоимости гистологического исследования)'),
        array('name' => 'Расширение шеечного канала (бужирование)'),
        array('name' => 'Снятие швов с шейки матки'),
        array('name' => 'Введение лекарственных препаратов интравагинально'),
        array('name' => 'Лазерная вапоризация шейки матки (эрозия до 2см кв, Сургидрон, без стоимости обезболивания и гистологического исследования)'),
        array('name' => 'Лазерная вапоризация шейки матки (эрозия более 2см кв, Сургидрон, без стоимости обезболивания и гистологического исследования)'),
        array('name' => 'Эхокардиография'),
        array('name' => 'Панель пищевых аллергенов № 15 (апельсин, банан, яблоко, персик) IgG'),
        array('name' => 'Постановка пиявок (до 5 штук)'),
        array('name' => 'Массаж лица медицинский (60 мин)'),
        array('name' => 'Панель пищевых аллергенов № 2 (треска, тунец, креветки, лосось, мидии) IgG'),
        array('name' => 'Панель пищевых аллергенов № 1 (арахис, миндаль, фундук, кокос, бразильский орех) IgG'),
        array('name' => 'Панель 19 Пищевая панель (мед, фруктоза, подсолнечник, кокос, кедровый орех, миндаль, кешью, фисташки) IgG'),
        array('name' => 'Подкожное введение лекарственных препаратов (фармакопунктура)'),
        array('name' => 'Допплерография артерий и вен верхних конечностей (ведущий врач)'),
        array('name' => 'Допплерография вен верхних конечностей (ведущий врач)'),
        array('name' => 'Массаж передней брюшной стенки медицинский (висцеральная терапия, 60 мин)'),
        array('name' => 'Ультразвуковое исследование головного мозга (врач)'),
        array('name' => 'Пособие по подбору ортопедических стелек (изготовление)'),
        array('name' => 'Пособие по подбору ортопедических стелек (коррекция)'),
        array('name' => 'Пособие по подбору ортопедических стелек (изготовление детям, до 30 разм)'),
        array('name' => 'Пособие по подбору ортопедических стелек (коррекция, детям, до 30 разм)'),
        array('name' => 'Прием (осмотр, консультация) врача-травматолога-ортопеда повторный'),
        array('name' => 'Прием (осмотр, консультация) врача-травматолога-ортопеда повторный (ведущий врач)'),
        array('name' => 'Прием (осмотр, консультация) врача-рефлексотерапевта первичный (ведущий врач)'),
        array('name' => 'Ударно-волновая терапия (2500 ударов, радиальная)')
    );


}

