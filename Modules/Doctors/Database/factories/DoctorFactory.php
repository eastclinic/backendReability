<?php

namespace Modules\Doctors\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Doctors\Entities\Doctor;

class DoctorFactory extends Factory
{
//    protected $connection = 'MODX';

//    public function configure()
//    {
////        return $this->connection('MODX');
//    }
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
//    public function definition()
//    {
//        return [
//            'iid' => $this->faker->numberBetween(1, 100),
//            'id_resource' => $this->faker->numberBetween(1, 100),
//            //'uri' => 'https://eastclinic.ru/'.$this->faker->firstName,
//            'surname' => $this->faker->lastName,
//            'name' => $this->faker->firstName,
//            'middlename' => $this->faker->firstName,
//            'fullname' => $this->faker->name,
//            'photo' => $this->faker->imageUrl(),
//            'photo_type' => $this->faker->fileExtension,
//            'photos' => json_encode([
//                ['url' => $this->faker->imageUrl()],
//                ['url' => $this->faker->imageUrl()],
//                ['url' => $this->faker->imageUrl()],
//            ]),
//            'holiday' => $this->faker->boolean,
//            'rating' => $this->faker->numberBetween(1, 10),
//            'rating5' => $this->faker->randomFloat(2, 1, 5),
//            'comments' => $this->faker->numberBetween(1, 100),
//            'show_comments' => $this->faker->boolean,
//            'child' => $this->faker->numberBetween(0, 18),
//            'pregnant' => $this->faker->boolean,
//            'diseases' => $this->faker->text,
//            'experience' => $this->faker->numberBetween(1, 50),
//            'way_experience' => $this->faker->text,
//            'show_experience' => $this->faker->boolean,
//            'telemedicine' => $this->faker->boolean,
//            'training' => $this->faker->text,
//            'longtitle' => $this->faker->text,
//            'description' => $this->faker->text,
//            'introtext' => $this->faker->text,
//            'description_full' => $this->faker->text,
//            'age_from' => $this->faker->numberBetween(0, 100),
//            'age_to' => $this->faker->numberBetween(0, 100),
//            'iskill' => $this->faker->boolean,
//            'is_primary_care' => $this->faker->boolean,
//            'is_doctor' => $this->faker->boolean,
//            'is_nurse' => $this->faker->boolean,
//            'is_analyze' => $this->faker->boolean,
//            'off' => $this->faker->boolean,
//            'research' => $this->faker->text,
//            'diploms' => $this->faker->text,
//            'quotes' => $this->faker->sentence(20),
//            'interviews' => $this->faker->text,
//            'awards' => $this->faker->text,
//        ];
//    }

    public function definition()
    {
        return $this->faker->unique()->randomElement($this->modx_doc_doctors);
    }



    protected $modx_doc_doctors = array(
        array('iid' => '0','id_resource' => '0','uri' => NULL,'surname' => NULL,'name' => 'Тест','middlename' => 'Тест','fullname' => 'Тест','photo' => NULL,'photo_type' => NULL,'photos' => NULL,'holiday' => '0','rating' => '0','rating5' => '0','comments' => '0','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '0','way_experience' => NULL,'show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => NULL,'description' => NULL,'introtext' => NULL,'description_full' => NULL,'age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => NULL,'is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000007','id_resource' => '224','uri' => 'vrachi/abramenko-valentina-nikolaevna','surname' => 'Абраменко','name' => 'Валентина','middlename' => 'Николаевна','fullname' => 'Абраменко Валентина Николаевна','photo' => 'abramenko-valentina-nikolaevna.png','photo_type' => 'png','photos' => '{"120x120": ["site/i/doc/_120x120/abramenko-valentina-nikolaevna_120x120.webp"], "232x269": ["site/i/doc/_232x269/abramenko-valentina-nikolaevna_232x269.webp"], "576x576": ["site/i/doc/_576x576/abramenko-valentina-nikolaevna_576x576.webp"]}','holiday' => '0','rating' => '98','rating5' => '4.6','comments' => '86','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => 'null','experience' => '1984','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2><br />
<ul><li>1991 — Московский Ордена Ленина Государственный Институт (МОЛГМИ) имени Н. И. Пирогова, «Лечебное дело»;<br /></li>
<li>1992 — Московский Ордена Ленина Государственный Институт (МОЛГМИ) имени Н. И. Пирогова, интернатура по «Неврологии»;<br /></li>
<li>1992 — Московская медицинская академия, «Точечный массаж ши-а-тцу»;<br /></li>
<li>1992 — Медицинская академия имени Сеченова, «Рефлексотерапия»;<br /></li>
<li>1993 — Первый Московский государственный медицинский университет имени И. М. Сеченова, «Гомеопатия»;<br /></li>
<li>1995 — Повышение квалификации по Су-джок методу у профессора Пак дже Ву, «Теоретический курс»;<br /></li>
<li>1996 — Повышение квалификации по Су джок методу у профессора Пак дже Ву, «Практический курс»;<br /></li>
<li>1998 — РМАПО, «Тематические усовершенствования по рефлексотерапии»;<br /></li>
<li>2000 — Институт восточной медицины РУДН, «Рефлексотерапия», «Фитотерапия»;</p></li>
<li>2004 — Московская медицинская академии имени И. М. Сеченова, «Рефлексотерапия с основами неврологии»;</p></li>
<li>2013 — Первый Московский государственный медицинский университет имени И. М. Сеченова, «Рефлексотерапия».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => 'null','longtitle' => 'Абраменко Валентина Николаевна, врач - Работает у нас - От [[*doc_priem]] р. - Рефлексотерапевт, Невролог [[*ratesCount]]','description' => 'Абраменко Валентина Николаевна опытный врач - невролог, рефлексотерапевт. Владеет всеми методами восточной медицины, включая иглорефлексотерапию, точечный массаж, моксотерапию, мануальную терапию, аурикулотерапию, микроиглотерапию.','introtext' => 'Абраменко Валентина Николаевна - врач рефлексотерапевт, отзывы - медицинский центр "Ист Клиник Москва"','description_full' => 'Абраменко Валентина Николаевна - врач-рефлексотерапевт, невролог, гомеопат, фитотерапевт (работает с тибетскими фитосборами). Принимает детей от 3 лет.
<p></p>
После окончания медицинской академии работала в государственных и частных медицинских учреждениях, приобрела большой опыт лечения неврологических заболеваний, невротических расстройств, болезней сердечно-сосудистой системы, аллергических, психосоматических заболеваний и болевых синдромов.
<p></p>
Валентина Николаевна считает наиболее результативной интегральную медицину. В лечении пациентов использует  методы восточной и западной медицины,  работает на результат. Виртуозно владеет всеми методами восточной медицины, включая иглорефлексотерапию, точечный массаж, моксотерапию, аурикулотерапию, микроиглотерапию (в том числе метод «Золотой иглы»), Су-Джок терапию.
<p></p>
Довольно успешно применяет акупунктуру для лечения межпозвонковых грыж больших размеров ( у пациентов, направленных на операцию). А также имеет собственные методики по омоложению лица и тела, программу «Бросаем курить», в которых максимально использованы возможности восточной медицины.
<p></p>
Член Российского общества врачей-рефлексотерапевтов. Регулярно принимает активное участие в международных и российских научных конференциях и конгрессах.
','age_from' => '5','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000021','id_resource' => '143','uri' => 'vrachi/chao-hajczyan-otzyvy-manualnyj-terapevt-massazhist-iglorefleksoterapevt','surname' => 'Хайцзянь','name' => 'Чао','middlename' => '','fullname' => 'Хайцзянь Чао','photo' => 'chao-hajczyan.jpg','photo_type' => NULL,'photos' => '{"120x120": ["assets/resourceimages/143/_120x120/Chao_1_3.0_120x120.webp", "assets/resourceimages/143/_120x120/Chao_3_2.0_120x120.webp", "assets/resourceimages/143/_120x120/Chao_4_2.0_120x120.webp", "assets/resourceimages/143/_120x120/Chao2_120x120.webp"], "232x269": ["assets/resourceimages/143/_232x269/Chao_1_3.0_232x269.webp", "assets/resourceimages/143/_232x269/Chao_3_2.0_232x269.webp", "assets/resourceimages/143/_232x269/Chao_4_2.0_232x269.webp", "assets/resourceimages/143/_232x269/Chao2_232x269.webp"], "576x576": ["assets/resourceimages/143/_576x576/Chao_1_3.0_576x576.webp", "assets/resourceimages/143/_576x576/Chao_3_2.0_576x576.webp", "assets/resourceimages/143/_576x576/Chao_4_2.0_576x576.webp", "assets/resourceimages/143/_576x576/Chao2_576x576.webp"]}','holiday' => '0','rating' => '100','rating5' => '4.7','comments' => '94','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => 'null','experience' => '1991','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
</p></li>
<li>1991 — Шаньсийский институт китайской медицины, Китай;</p></li>
<li>2009 — сертификат врача-массажиста высшей категории, Китай;</p></li>
<li>2010 — сертификат по массажу ступней высшей категории, Китай.</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => 'null','longtitle' => 'Чао Хайцзянь, врач - Работает у нас - От [[*doc_priem]] р. - Рефлексотерапевт, массажист, мануальный терапевт: [[*ratesCount]]','description' => 'Получил образование и 21 год работал в лечебных учреждениях Китая. Специалист-практик высшей квалификации, успешно применяет лечебный массаж и мягкие техники.','introtext' => '','description_full' => 'Получил образование и 21 год работал в лечебных учреждениях Китая. Специалист-практик высшей квалификации, успешно применяет лечебный массаж и мягкие техники мануальной терапии при лечении:
<ul>
<li>заболеваний опорно-двигательной системы: остеохондрозов, грыж, протрузий, последствий травм, заболеваний суставов (артритов, артрозов), сколиозов, кифозов, остеохондропатий;</li>
<li>дисфункций вегетативной нервной системы (вегетососудистой дистонии, головных болей, напряжений, мигреней, повышенной потливости, синдрома нарушения сна, «комка» в горле, гипервентиляционного синдрома — озноба в состоянии страха, ночного зуда).</li>
</ul>
Отдельным достижением являются эффективность и скорость лечения, позволяющие работать с пациентами, страдающими наиболее тяжелыми и хроническими заболеваниями.
','age_from' => '15','age_to' => '30','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000022','id_resource' => '2034','uri' => 'vrachi/coj-anzhela-sergeevna','surname' => 'Цой','name' => 'Анжела','middlename' => 'Сергеевна','fullname' => 'Цой Анжела Сергеевна','photo' => 'coj-anzhela-sergeevna.png','photo_type' => NULL,'photos' => '{"120x120": ["assets/resourceimages/2034/_120x120/Tsoy1_120x120.webp", "assets/resourceimages/2034/_120x120/Tsoy2_120x120.webp", "assets/resourceimages/2034/_120x120/Tsoy3_120x120.webp"], "232x269": ["assets/resourceimages/2034/_232x269/Tsoy1_232x269.webp", "assets/resourceimages/2034/_232x269/Tsoy2_232x269.webp", "assets/resourceimages/2034/_232x269/Tsoy3_232x269.webp"], "576x576": ["assets/resourceimages/2034/_576x576/Tsoy1_576x576.webp", "assets/resourceimages/2034/_576x576/Tsoy2_576x576.webp", "assets/resourceimages/2034/_576x576/Tsoy3_576x576.webp"]}','holiday' => '0','rating' => '96','rating5' => '4.8','comments' => '59','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '1994','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
</p></li>
<li>1994 — ТГМИ, «Лечебное дело»;</p></li>
<li>1995 — интернатура по специальности «Терапия»;</p></li>
<li>1996 — первичная специализация по специальности «Иглорефлексотерапия»;</p></li>
<li>2008 — Росcийский университет дружбы народов, «Рефлексотерапия»;</p></li>
<li>2000 — первичная специализация по специальности «Рефлексотерапия»;</p></li>
<li>2002 — соискатель на звание кандидата медицинских наук на кафедре инфекционных болезней с курсом клинической иммунологии ФУВ Воронежской медицинской академии им. Н.Н. Бурденко;</p></li>
<li>2017 — курсы повышения квалификации по специальности «Терапия», специализация и повышение квалификации по специальности «Рефлексотерапия».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Цой Анжела Сергеевна, врач - Работает у нас - Приём от [[*doc_priem]] р. - Рефлексотерапевт, врач китайской медицины: [[*ratesCount]]','description' => 'Владеет методами классической китайской акупунктуры, методиками прижигания, фармакопунктуры, электропунктуры.
Сочетание классических восточных методик с применением современных гомеопатических препаратов позволяет достигать отличных результатов в лечении','introtext' => 'Владеет методами классической китайской акупунктуры, методиками прижигания, фармакопунктуры, электропунктуры.
Сочетание классических восточных методик с применением современных гомеопатических препаратов позволяет достигать отличных результатов в лечении.','description_full' => '<p>Действительный член Профессиональной ассоциации рефлексотерапевтов.</p>
<p>Награждена Почетной грамотой Министерства здравоохранения РФ.</p>
<p>Анжела Сергеевна владеет методами классической китайской акупунктуры, методиками прижигания, фармакопунктуры, электропунктуры.</p>
<p>Сочетание классических восточных методик с применением современных гомеопатических препаратов позволяет достигать отличных результатов в лечении различных заболеваний и функциональных расстройств и состояний.</p>','age_from' => '15','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000024','id_resource' => '532','uri' => 'vrachi/yashhenko-sergej-sergeevich','surname' => 'Ященко','name' => 'Сергей','middlename' => 'Сергеевич','fullname' => 'Ященко Сергей Сергеевич','photo' => 'yashhenko-sergej-sergeevich-.jpg','photo_type' => 'png','photos' => NULL,'holiday' => '0','rating' => '96','rating5' => '4.8','comments' => '145','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => 'null','experience' => '2007','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul><li>2007 — ООМК, «Сестринское дело»;<br /></li>
<li>2018 — ЧУ ДПО «Институт КЭМВИ-ДРК», «Медицинский массаж»;<br /></li>
<li>2017 — АКУ «Триггерные точки и миофасциальный мышечный синдром ШОП»;<br /></li>
<li>2017 — «Ортобиодинамика: адаптированные артикуляционные, мобилизационно-манипуляционные техники Чешской школы Карла Левита»;<br /></li>
<li>2017 — «Мышечно-скелетная терапия мышц при болевых синдромах, мышечно-энергетические техники, мягкие техники мануальной терапии, техника апофизарного скольжения»;<br /></li>
<li>2017 — «Функциональное мышечное тестирование. Мышечно-скелетная терапия. Мышечно-энергетические техники. Детензор-терапия»;<br /></li>
<li>2017 — Международный Институт Детензорологии, «Теория и практика применения метода щадящей тракции позвоночника для профилактики и лечения заболеваний ОДА»;<br /></li>
<li>2017 — «Образование 21 века», «SPA-массаж»;<br /></li>
<li>2016 — «Образование 21 века», «Основы оздоровительного массажа»;<br /></li>
<li>2016 — R-cosmetics, «Вакуумный массаж».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => 'null','longtitle' => 'Ященко Сергей Сергеевич - [[*ratesCount]] | Кинезиолог, Массажист | [[!+unit_seoName]] - Ист Клиник','description' => 'Специализируется на снятии болевых синдромов, улучшении мобильности суставов и позвоночника. При лечении использует кинезиологические техники, мягкие массажные техники, ЛФК.','introtext' => '','description_full' => '<p>Специализируется на снятии болевых синдромов, улучшении мобильности суставов и позвоночника. При лечении использует кинезиологические, мягкие массажные техники, ЛФК.</p>
<h3>Достижения:</h3>
<p>II открытый чемпионат Московской области по медицинскому и СПА-массажу &ndash; диплом III степени.<br />Член Лиги &laquo;Массажной Единой Организации Начинающих Специалистов&raquo; № 017 от 2017 г.<br />Золотой кубок МЕОНС г. Москвы чемпионата по массажу, I место 2017 г.</p>','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000037','id_resource' => '213','uri' => 'vrachi/mitrofanov-oleg-nikolaevich','surname' => 'Митрофанов','name' => 'Олег','middlename' => 'Николаевич','fullname' => 'Митрофанов Олег Николаевич','photo' => 'mitrofanov-oleg-nikolaevich.png','photo_type' => 'png','photos' => '{"120x120": ["assets/resourceimages/213/_120x120/Mitrofanov1_120x120.webp", "assets/resourceimages/213/_120x120/Mitrofanov2_120x120.webp", "assets/resourceimages/213/_120x120/Mitrofanov3_120x120.webp", "assets/resourceimages/213/_120x120/Mitrofanov4_120x120.webp"], "232x269": ["assets/resourceimages/213/_232x269/Mitrofanov1_232x269.webp", "assets/resourceimages/213/_232x269/Mitrofanov2_232x269.webp", "assets/resourceimages/213/_232x269/Mitrofanov3_232x269.webp", "assets/resourceimages/213/_232x269/Mitrofanov4_232x269.webp"], "576x576": ["assets/resourceimages/213/_576x576/Mitrofanov1_576x576.webp", "assets/resourceimages/213/_576x576/Mitrofanov2_576x576.webp", "assets/resourceimages/213/_576x576/Mitrofanov3_576x576.webp", "assets/resourceimages/213/_576x576/Mitrofanov4_576x576.webp"]}','holiday' => '0','rating' => '100','rating5' => '5','comments' => '133','show_comments' => '1','child' => '15','pregnant' => '0','diseases' => NULL,'experience' => '2002','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
</p></li>
<li>2004 — Московский институт восстановительной медицины, «Медицинский массаж»;</p></li>
<li>2005 — ГКА имени Маймонида, «Лечебное дело»;</p></li>
<li>2010 — ГУ имени Вишневского МОНИКИ, «Неврология»;</p></li>
<li>2014 — МГМУ имени И. М.Сеченова, «Мануальная терапия»;</p></li>
<li>2017 — Институт остеопатии Мохова СЗГМУ имени И. И. Мечникова.</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Митрофанов Олег Николаевич, врач - Работает у нас - От [[*doc_priem]] р. - Остеопат, мануальный терапевт, невролог: [[*ratesCount]]','description' => 'В лечении использует мануальную терапию, остеопатию, кинезиотейпирование. ','introtext' => 'Митрофанов Олег Николаевич — мануальный терапевт, отзывы — медицинский центр «Ист Клиник Москва»','description_full' => '<br>
<p>Специализируется на неврологии и мануальной терапии (классические и мягкие техники), структуральной, краниосакральной и висцеральной остеопатии. Использует кинезиотейпирование как поддерживающее лечение в период между приемами. Лечебный, классический массаж. Имеет опыт в подготовке и реабилитации спортсменов следующих дисциплин: бег, марафон, единоборства, футбол, теннис. Принимает детей с 3 лет.</p>
','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000062','id_resource' => '2869','uri' => 'vrachi/shishov-georgij-vladimirovich','surname' => 'Шишов','name' => 'Георгий','middlename' => 'Владимирович','fullname' => 'Шишов Георгий Владимирович','photo' => 'shishov-georgij-vladimirovich-.jpg','photo_type' => 'png','photos' => '{"120x120": ["assets/resourceimages/2869/_120x120/Shishov1_120x120.webp", "assets/resourceimages/2869/_120x120/Shishov2_120x120.webp", "assets/resourceimages/2869/_120x120/Shishov3_120x120.webp", "assets/resourceimages/2869/_120x120/Shishov4_120x120.webp"], "232x269": ["assets/resourceimages/2869/_232x269/Shishov1_232x269.webp", "assets/resourceimages/2869/_232x269/Shishov2_232x269.webp", "assets/resourceimages/2869/_232x269/Shishov3_232x269.webp", "assets/resourceimages/2869/_232x269/Shishov4_232x269.webp"], "576x576": ["assets/resourceimages/2869/_576x576/Shishov1_576x576.webp", "assets/resourceimages/2869/_576x576/Shishov2_576x576.webp", "assets/resourceimages/2869/_576x576/Shishov3_576x576.webp", "assets/resourceimages/2869/_576x576/Shishov4_576x576.webp"]}','holiday' => '0','rating' => '100','rating5' => '5','comments' => '81','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2003','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
</p></li>
<li>1988 — Томский медицинский институт, военно-медицинский факультет, «Лечебное дело»;</p></li>
<li>2012 — МГУ им. М. В. Ломоносова, факультет психологии, «Практическая психология личности», «Психолог»;</p></li>
<li>2013 — ИППЛ «Генезис Практик» (Москва), «Психотерапия»;</p></li>
<li>2014 — ИППЛ «Генезис Практик» (Москва), «Психотерапия депрессивных состояний», «Практическая психология личности»;<br /></li>
<li>2015 — ИППЛ «Генезис Практик» (Москва), «Краткосрочная стратегическая психотерапия»;</p></li>
<li>2018 — ООДПО «Международная академия экспертизы и оценки» (Саратов), «Психотерапия»;</p></li>
<li>2019 — ООДМО МАЭО, «Психиатрия»;</p></li>
<li>2020 — Портал непрерывного медицинского и фармацевтического образования Министерства здравоохранения Российской Федерации, «Проблемы психического здоровья в условиях пандемии COVID-19».</p></li>
</ul>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Шишов Георгий Владимирович - [[*ratesCount]] | Психотерапевт, Психолог | [[!+unit_seoName]] - Ист Клиник ','description' => 'Шишов Георгий Владимирович - стратегический психотерапевт, семейный и индивидуальный психолог. В лечении применяет когнитивную психотерапию, краткосрочную стратегическую терапия Нардоннэ, позитивную психотерапию Роджерса.','introtext' => '','description_full' => 'Шишов Георгий Владимирович – стратегический психотерапевт, семейный и индивидуальный психолог. В лечении применяет когнитивную психотерапию, краткосрочную стратегическую терапия Нардоннэ, позитивную психотерапию Роджерса.
<p></p>
Георгий Владимирович проводит лечение депрессивных состояний, панических атак, тревожных и фобических расстройств, обсессивно-компульсивных расстройств, биполярного расстройства.
<p></p>
Помогает при семейной тирании, выявлении брачных аферистов, в преодолении страха завести ребенка и психологическое сопровождение беременных, в преодолении кризиса среднего возраста и других жизненных кризисов, проводит предсвадебные консультации.
<p></p>
Действительный член Общероссийской Профессиональной Психотерапевтической Лиги. Член Российского общества психиатров. Занимал высокие позиции в рейтингах психологов России.





','age_from' => '18','age_to' => '16','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000069','id_resource' => '2916','uri' => 'vrachi/alpaidze-georgij-zaxarovich','surname' => 'Алпаидзе','name' => 'Георгий','middlename' => 'Захарович','fullname' => 'Алпаидзе Георгий Захарович','photo' => 'alpaidze-georgij-zaxarovich.png','photo_type' => 'png','photos' => '{"120x120": ["assets/resourceimages/2916/_120x120/Alpaidze1_120x120.webp", "assets/resourceimages/2916/_120x120/Alpaidze2_120x120.webp", "assets/resourceimages/2916/_120x120/Alpaidze3_120x120.webp", "assets/resourceimages/2916/_120x120/Alpaidze4_120x120.webp"], "232x269": ["assets/resourceimages/2916/_232x269/Alpaidze1_232x269.webp", "assets/resourceimages/2916/_232x269/Alpaidze2_232x269.webp", "assets/resourceimages/2916/_232x269/Alpaidze3_232x269.webp", "assets/resourceimages/2916/_232x269/Alpaidze4_232x269.webp"], "576x576": ["assets/resourceimages/2916/_576x576/Alpaidze1_576x576.webp", "assets/resourceimages/2916/_576x576/Alpaidze2_576x576.webp", "assets/resourceimages/2916/_576x576/Alpaidze3_576x576.webp", "assets/resourceimages/2916/_576x576/Alpaidze4_576x576.webp"]}','holiday' => '0','rating' => '100','rating5' => '4.8','comments' => '115','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '1988','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
</p></li>
<li>1987 — Тбилисский государственный медицинский институт, «Лечебное дело»;</p></li>
<li>1988 — Интернатура при Тбилисском госпитале инвалидов ВОВ, «Врач-терапевт»;</p></li>
<li>2011 — Российская академия последипломного образования, «Мануальная терапия»;</p></li>
<li>2015 — ФГБУ «Федеральный медицинский биофизический центр имени А .И. Бурназяна,
«Физиотерапия»;</p></li>
<li>2017 — РУДН, «Мануальная терапия»;</p></li>
<li>2017 — Центральный многопрофильный институт, «Ревматология».</p></li>
</ul>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Алпаидзе Георгий Захарович, врач - Работает у нас - От [[*doc_priem]] р. - Ортопед, Физиотерапевт: [[*ratesCount]]','description' => 'Врач - Ортопед, физиотерапевт c медицинским опытом более 30 лет. Производит лечение суставных заболеваний, заболеваний позвоночника.','introtext' => 'Алпаидзе Георгий Захарович - ортопед, физиотерапевт отзывы - медицинский центр «Ист Клиник Москва»','description_full' => '<p>Специализируется на лечении заболеваний позвоночника и суставов в области неврологии более 30 лет.</p>
<p>Алпаидзе Георгий Захарович использует комплексные методы лечения: мягкие мануальные техники, блокады болевых симптомов позвоночника и суставов, внутрисуставное введение лечебных препаратов, лечение собственной плазмой пациента (Polifting), ударно-волновая терапия, вакуумная терапия, физиотерапевтические методы лечения.</p>','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000073','id_resource' => '2919','uri' => 'vrachi/sholshikova-aleksandra-davanovna','surname' => 'Шольшикова','name' => 'Александра','middlename' => 'Давановна','fullname' => 'Шольшикова Александра Давановна','photo' => 'sholshikova-aleksandra-davanovna.png','photo_type' => 'png','photos' => '{"120x120": ["assets/resourceimages/2919/_120x120/Sholshikova1_120x120.webp", "assets/resourceimages/2919/_120x120/Sholshikova2_120x120.webp", "assets/resourceimages/2919/_120x120/Sholshikova3_120x120.webp", "assets/resourceimages/2919/_120x120/Sholshikova4_120x120.webp"], "232x269": ["assets/resourceimages/2919/_232x269/Sholshikova1_232x269.webp", "assets/resourceimages/2919/_232x269/Sholshikova2_232x269.webp", "assets/resourceimages/2919/_232x269/Sholshikova3_232x269.webp", "assets/resourceimages/2919/_232x269/Sholshikova4_232x269.webp"], "576x576": ["assets/resourceimages/2919/_576x576/Sholshikova1_576x576.webp", "assets/resourceimages/2919/_576x576/Sholshikova2_576x576.webp", "assets/resourceimages/2919/_576x576/Sholshikova3_576x576.webp", "assets/resourceimages/2919/_576x576/Sholshikova4_576x576.webp"]}','holiday' => '0','rating' => '100','rating5' => '4.8','comments' => '92','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '1982','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul></p></li>
<li>1982 — Горьковский медицинский институт им. С. М. Кирова, «Лечебное дело» (Лечебно-профилактическое дело);</p></li>
<li>1991 — Институт медицинской паразитологии и тропической медицины им. Е. И. Марциновского, ординатура по «Медицинскойй паразитологии и тропической медицине»;</p></li>
<li>2015 — Международная Академия Остеопатии им В. Г. Артемова, «Остеопатия».</p></li>
</ul>
<h5>Курсы повышения квалификации:</h5>
</p></li>
<li>1993 — Муниципальная поликлиника города Тайбей (Тайвань), «Иглоукалывание»;</p></li>
<li>1998, 2003, 2007, 2011 — Российская медицинская академия, «Рефлексотерапия»;</p></li>
<li>2015 — Российская академия медикосоциальной реабилитации, «Рефлексотерапия»;</p></li>
<li>2016 — МФ «Институт Апледжера», «Висцеральные манипуляции»;</p></li>
<li>2016 — Институт клинической прикладной кинезиологии, «Висцеральные манипуляции»;</p></li>
<li>2017 — Международная академия остеопатии, «Остеопатия»;</p></li>
<li>2017 — МФ «Институт Апледжера», «Общее прослушивание»;</p></li>
<li>2017 — Институт клинической прикладной кинезиологии, «Техники висцерального выслушивания-1»;</p></li>
<li>2018 — Российская академия медико-социальной реабилитации, «Остеопатия».</p></li>
</ul>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Шольшикова Александра Давановна, врач - Работает у нас - От [[*doc_priem]] р. - Остеопат: [[*ratesCount]]','description' => 'Врач-остеопат c медицинским опытом более 36 лет. Проводит реабилитацию пациентов после травм и переломов конечностей, инсульта.','introtext' => 'Шольшикова Александра Давановна - остеопат, отзывы - медицинский центр «Ист Клиник Москва»','description_full' => 'Шольшикова Александра Давановна – врач-рефлексотерапевт с медицинским стажем более 38 лет.
 <p></p>
В своей работе использует комплексные методы лечения: мягкие мануальные техники, висцеральную терапию, иглоукалывание, аурикулотерапию, гирудотерапию, массажи.
 <p></p>
Также занимается реабилитацией пациентов после инсультов, переломов и травмирования конечностей.
','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000100','id_resource' => '3254','uri' => 'vrachi/popov-aleksandr-andreevich','surname' => 'Попов','name' => 'Александр','middlename' => 'Андреевич','fullname' => 'Попов Александр Андреевич','photo' => 'popov-aleksandr-andreevich.png','photo_type' => 'png','photos' => NULL,'holiday' => '0','rating' => '99','rating5' => '5','comments' => '55','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2011','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>2011 — Иркутский государственный медицинский университет, «Лечебное дело»;<br /></li>
<li>2013 — СПбГМУ им. акад. Павлова, ординатура по специальности «Неврология»;<br /></li>
<li>2016 — СПб клиника натуропатии, «Гирудотерапия»;</p></li>
<li>2018 — Horse group, «Остеопатия».</p></li>
</ul>
<h3>Курсы повышения квалификации</h3>
<li>2014 — Институт Шанг Шунг, «Традиционный тибетский массаж Ку-Нье»;<br /></li>
<li>2017 — Институт Шанг Шунг, 4-х летняя программа по оздоровительной системе тибетской медицины;<br /></li>
<li>2018 — Колледж тибетской медицины Цинхайского государственного университета, КНР, Бакалавр;<br /></li>
<li>2018 — Северо-восточный федеральный университет, «Актуальные вопросы неврологии»;<br /></li>
<li>2019 — Школа физической реабилитации профессора Арькова, «Кинезиотерапия и реабилитация»;<br /></li>
<li>2019 — Лига содействия развитию подиатрии, «Ортезирование стоп по системе Formthotics»;<br /></li>
<li>2020 — Rehab science, «Кинезиотейпирование».<br /></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Попов Александр Андреевич - [[*ratesCount]] | Невролог, Остеопат | [[!+unit_seoName]] - Ист Клиник','description' => 'Попов Александр Андреевич — врач-невролог, остеопат, специалист по тибетской медицине. Применяет структуральные, краниальные, висцеральные остеопатические методы, мягкие техники мануальной терапии, кинезиотейпирование, ударно-волновую терапию.','introtext' => 'Попов Александр Андреевич - невролог, мануальный терапевт, отзывы - медицинский центр «Ист Клиник Москва»','description_full' => '<p>Попов Александр Андреевич &mdash; врач-невролог, остеопат, специалист по тибетской медицине.</p>
<p>&nbsp;</p>
<p>Применяет структуральные, краниальные, висцеральные остеопатические методы, мягкие техники мануальной терапии, кинезиотейпирование, ударно-волновую терапию.</p>
<p>&nbsp;</p>
<p>Проводит подбор и коррекцию ортопедических стелек Formthotics. Использует пульсовую диагностику, даёт индивидуальные рекомендации по питанию и образу жизни, согласно тибетской медицине. Применяет методы внешней терапии ТТМ: массаж Ку-Нье, компрессы хорме, моксотерапию, вакуумтерапию.</p>','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000142','id_resource' => '3851','uri' => 'vrachi/denisov-gennadij-mixajlovich','surname' => 'Денисов','name' => 'Геннадий','middlename' => 'Михайлович','fullname' => 'Денисов Геннадий Михайлович','photo' => 'denisov-gennadij-mixajlovich.png','photo_type' => 'png','photos' => '{"120x120": ["assets/resourceimages/3851/_120x120/Denisov_1_3.0_120x120.webp", "assets/resourceimages/3851/_120x120/Denisov2_120x120.webp", "assets/resourceimages/3851/_120x120/Denisov3_120x120.webp", "assets/resourceimages/3851/_120x120/Denisov4_120x120.webp", "assets/resourceimages/3851/_120x120/Denisov5_120x120.webp"], "232x269": ["assets/resourceimages/3851/_232x269/Denisov_1_3.0_232x269.webp", "assets/resourceimages/3851/_232x269/Denisov2_232x269.webp", "assets/resourceimages/3851/_232x269/Denisov3_232x269.webp", "assets/resourceimages/3851/_232x269/Denisov4_232x269.webp", "assets/resourceimages/3851/_232x269/Denisov5_232x269.webp"], "576x576": ["assets/resourceimages/3851/_576x576/Denisov_1_3.0_576x576.webp", "assets/resourceimages/3851/_576x576/Denisov2_576x576.webp", "assets/resourceimages/3851/_576x576/Denisov3_576x576.webp", "assets/resourceimages/3851/_576x576/Denisov4_576x576.webp", "assets/resourceimages/3851/_576x576/Denisov5_576x576.webp"]}','holiday' => '0','rating' => '100','rating5' => '5','comments' => '104','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '1977','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
</p></li>
<li>1976 — Калининский Государственный Медицинский Институт;</p></li>
<li>1977 — Калининский Медицинский Институт, «Психиатр»;</p></li>
<li>1991 — Московский Областной Научно-Исследовательский Институт им. М. Ф. Владимирского, «Невролог»;</p></li>
<li>1992 — Московский Государственный Медицинский Университет, «Мануальный терапевт»;</p></li>
<li>1997 — Московский государственный медико-стоматологический университет, «Организация здравоохранения и социальной гигиены».</p></li>
</ul></p></li>
<h5>Обучение в аспирантуре каждые 5 лет:</h5>
</p></li>
<li>Московский областной научно-исследовательский институт имени М. Ф. Владимирского;</p></li>
<li>Санкт-Петербургская государственная медицинская академия имени И. И. Мечникова;</p></li>
<li>Российская Ассоциация Мануальной Терапии.</p></li>
</ul>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Денисов Геннадий Михайлович, врач - Работает у нас - От [[*doc_priem]] р. - остеопат: [[*ratesCount]]','description' => 'Денисов Геннадий Михайлович - Врач остеопат, мануальный терапевт, рефлексотерапевт.','introtext' => 'Денисов Геннадий Михайлович - врач остеопат, рефлексотерапевт, отзывы - медицинский центр "Ист Клиник Москва"','description_full' => '<p>Врач остеопат, мануальный терапевт, рефлексотерапевт. Владеет мышечными энергетическими техниками, миофасциальным релизом,  техниками сбалансированного лигаментозного натяжения, краниосакральными, висцеральными, структуральными, остеопатическими техниками, постуральной и дыхательной кооперацией, лимфодренажем, эстетической остеопатией и др. Принимает так же, как психотерапевт детей от 7 лет. </p>
','age_from' => '18','age_to' => '100','skill' => 'expert1cat','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000145','id_resource' => '6134','uri' => 'vrachi/buyanova-alina-igorevna','surname' => 'Буянова','name' => 'Алина','middlename' => 'Игоревна','fullname' => 'Буянова Алина Игоревна','photo' => 'buyanova-alina-igorevna.png','photo_type' => 'png','photos' => NULL,'holiday' => '1','rating' => '100','rating5' => '4','comments' => '5','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '2010','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>2010 — Московский Государственный Областной университет;<br /></li>
<li>2013 — Мытищенское медицинское училище, «Сестринское дело»;<br /></li>
<li>2017 — ФГБУ ГНЦ РФ Федеральный медицинский биофизический центр имени А.И. Бурназяна, «Лечебная физкультура».<br /></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Буянова Алина Игоревна, врач - Работает у нас - От [[*doc_priem]] р. - врач ЛФК: [[*ratesCount]] ','description' => 'Специализируется на заболеваниях опорно-двигательного аппарата более 10 лет.','introtext' => 'Буянова Алина Игоревна - врач ЛФК отзывы - медицинский центр "Ист Клиник Мытищи"','description_full' => '<p>Врач ЛФК. Специализируется на заболеваниях опорно-двигательного аппарата более 10 лет. Более 8 лет работы инструктором-методистом в реабилитационном тренажёрном зале.</p>
<p>Буянова Алина Игоревна использует различные средства ЛФК в работе: ленты-амортизаторы, оверболы, фитболы, гимнастические палки. Имеет большой опыт восстановления после различных травм, в том числе и личный.</p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000149','id_resource' => '6139','uri' => 'vrachi/milovanova-yuliya-nikolaevna','surname' => 'Милованова','name' => 'Юлия','middlename' => 'Николаевна','fullname' => 'Милованова Юлия Николаевна','photo' => 'milovanova-yuliya-nikolaevna.jpg','photo_type' => 'jpg','photos' => '{"120x120": ["site/i/doc/_120x120/milovanova-yuliya-nikolaevna_120x120.webp"], "232x269": ["site/i/doc/_232x269/milovanova-yuliya-nikolaevna_232x269.webp"], "576x576": ["site/i/doc/_576x576/milovanova-yuliya-nikolaevna_576x576.webp"]}','holiday' => '1','rating' => '99','rating5' => '0','comments' => '31','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '2007','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>1998 —Ташкентский медицинский университет, «Педиатрия»;<br /></li>
<li>2007 — РМАНП, ординатура «Детская неврология»;<br /></li>
<li>2017 — Северо-Западный государственный медицинский университет им. И.И. Мечникова, «Невропатология детского возраста».<br /></li>
</ul>
<h3>Курсы повышения квалификации:</h3>
<ul>
<li>2015 — г. Москва, «Терапевтическое кинезиотейпирование в педиатрии»;<br /></li>
<li>2018 — г. Москва, профессиональная переподготовка «Функциональная диагностика»;<br /></li>
<li>2019 — Российская медицинская академия непрерывного профессионального образования, «Неврология».<br /></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Милованова Юлия Николаевна - [[*ratesCount]] | Невролог | [[!+unit_seoName]] - Ист Клиник','description' => 'Милованова Юлия Николаевна - невролог. Специализируется на неврологии более 12 лет. С 2013 года по 2016 год занималась реабилитацией детей с тяжёлыми поражениями ЦНС.','introtext' => '','description_full' => '<p>Специализируется на неврологии более 12 лет. С 2013 года по 2016 год занималась реабилитацией детей с тяжёлыми поражениями ЦНС.</p>
<p>Использует методы кинезиотейпирования. Большой опыт работы с детьми до 1 года.</p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000157','id_resource' => '6226','uri' => 'vrachi/shuvaeva-olga-borisovna-nevrolog','surname' => 'Шуваева','name' => 'Ольга','middlename' => 'Борисовна','fullname' => 'Шуваева Ольга Борисовна','photo' => 'shuvaeva-olga-borisovna.jpg','photo_type' => 'jpg','photos' => '{"120x120": ["assets/resourceimages/6226/_120x120/Shuvaeva1_3.0_120x120.webp", "assets/resourceimages/6226/_120x120/Shuvaeva_3_2.0_120x120.webp", "assets/resourceimages/6226/_120x120/Shuvaeva_4_2.0_120x120.webp", "assets/resourceimages/6226/_120x120/Shuvaeva2_2.0_120x120.webp"], "232x269": ["assets/resourceimages/6226/_232x269/Shuvaeva1_3.0_232x269.webp", "assets/resourceimages/6226/_232x269/Shuvaeva_3_2.0_232x269.webp", "assets/resourceimages/6226/_232x269/Shuvaeva_4_2.0_232x269.webp", "assets/resourceimages/6226/_232x269/Shuvaeva2_2.0_232x269.webp"], "576x576": ["assets/resourceimages/6226/_576x576/Shuvaeva1_3.0_576x576.webp", "assets/resourceimages/6226/_576x576/Shuvaeva_3_2.0_576x576.webp", "assets/resourceimages/6226/_576x576/Shuvaeva_4_2.0_576x576.webp", "assets/resourceimages/6226/_576x576/Shuvaeva2_2.0_576x576.webp"]}','holiday' => '0','rating' => '100','rating5' => '4.9','comments' => '167','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '1995','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
</p></li>
<li>1995 — окончила ММСИ им. Семашко, «Лечебное дело»;</p></li>
<li>1997 — ординатура по специальности «Нейрохирургия»;</p></li>
<li>2005 — защитила кандидатскую диссертацию не тему: «Рецидивирующие радикулопати в микронейрохирургии дискогенных поражений»;</p></li>
<li>2016 — интернатура по специальности «Неврология».</p></li>
</ul>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Шуваева Ольга Борисовна - [[*ratesCount]] | Невролог | [[!+unit_seoName]] - Ист Клиник','description' => 'Шуваева Ольга Борисовна – кандидат наук. Более 15 лет работала оперирующим врачом-нейрохирургом. Действующий невролог, специализируется на безоперационном, консервативном лечении.
','introtext' => '','description_full' => '<p>Ольга Борисовна - кандидат наук.
Более 15 лет работала оперирующим врачом-нейрохирургом.
Благодаря богатому практическому опыту видела много случаев, когда при своевременном лечении, пациенты могли избежать операцию.
Именно поэтому решила развиваться как невролог и специализироваться на безоперационном, консервативном лечении.</p>
<p>На сегодня область интересов доктора – это сделать все возможное, чтобы пациент обошелся без операции.
Глубокий опыт в нейрохирургии, знания патологической физиологии и анатомии, помогают даже в сложных случаях восстанавливать и сохранять здоровье пациентам.</p> ','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '1','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000184','id_resource' => '7750','uri' => 'vrachi/gromov-aleksej-vyacheslavovich','surname' => 'Громов','name' => 'Алексей','middlename' => 'Вячеславович','fullname' => 'Громов Алексей Вячеславович','photo' => 'gromov-aleksej-vyacheslavovich.jpg','photo_type' => 'jpg','photos' => NULL,'holiday' => '0','rating' => '98','rating5' => '4.4','comments' => '8','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '1994','way_experience' => '<h2>Профессиональная подготовка:</h2>
<ul>
<li>1992 — курсы гипноза «Теория и практика эриксоновского гипноза»;<br /></li>
<li>1994 — ТГТУ;<br /></li>
<li>1997 — повышение квалификации на базе Российской Государственной Академии Физической
Культуры (РГАФК);<br /></li>
<li>2001 — учебно-тренировочные курсы на основе международной программы подготовки
инструкторов по Цигун (Федерация Шаолиньских Боевых Искусств России);<br /></li>
<li>2001 —  учебный центр «TIBET», «Основы акупунктуры»;<br /></li>
<li>2006 — Академия Фитнеса, «Лечебная физкультура»;<br /></li>
<li>2007 - 2008 — филиал Дипломатического Корпуса при МИД (MoscowCountryClub), тренер Тайцзи;<br /></li>
<li>2008 - 2016 — регулярные курсы НЛП («Основы НЛП», «Выявление и лечение психосоматических заболеваний с помощью методов НЛП», консалтинг, лечение фобий, личностный рост и др.);<br /></li>
<li>2009 - 2018 — Международная Ассоциация (EUNKA), «Тайцзи Ян»;<br /></li>
<li>2011 — учебный центр «TIBET», «Основы иглотерапии»;<br /></li>
<li>2015 — Московский Институт Восстановительной Медицины, «Китайский Точечный Массаж Цигун»:<br /></li>
<li>2016 — Международная Ассоциация Боевых Искусств (EUNKA), аттестация на черный пояс по Тайцзи стиля Ян;<br /></li>
<li>2016 — Институт Профессионального Массажа, «Курс общего массажа»;<br /></li>
<li>2018 — Московский Институт Восстановительной Медицины, «Мануальная терапия»;<br /></li>
<li>2019 — Московский Институт Восстановительной Медицины «Основы остеопатии»;<br /></li>
<li>2019 — ФШБИ, аттестация по Цигун и Тайцзи;<br /></li>
<li>2019 — курс повышения квалификации на кинезиологической установке ЭКЗАРТА (Silver);<br /></li>
<li>2019 — Федерация Шаолиньских Боевых Искусств России, аттестация по Цигун и Тайцзи. Презентация оздоровительного метода цигун-терапии, посредством «меридианного цигун»;<br /></li>
<li>2019 — Государственная Академия Физической Культуры, кафедра «Адаптивной физической культуры и спортивной медицины».<br /></li>



','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Громов Алексей Вячеславович - [[*ratesCount]] | Инструктор ЛФК, Реабилитолог | [[!+unit_seoName]] - Ист Клиник','description' => 'Громов Алексей Вячеславович более 15 лет специализируется на реабилатационных методиках кинезиотерапии, массажа, ЛФК, цигун и тайцзи.','introtext' => '','description_full' => '<p>Громов Алексей Вячеславович &ndash; инструктор ЛФК, реабилитолог, психолог, мастер китайской оздоровительной системы тайцзы и цигун.</p>
<p>Более 15 лет работает в сфере психосоматики, помогая пациентам привести в гармонию душевное и физическое здоровье.</p>
<p>Использует в своей работе комплексные методы лечения: реабилитационные методики кинезиотерапии, массажа, мягкие мануальные техники, ЛФК (Лечебной Физической Культуры), психосоматики, акупунктуры, остеопатии.</p>
<p>С 2007 года работал в Дипломатическом Корпусе при МИД, участие в оздоровительных программах Москвы. С 2017 года член Российской Психотерапевтической Лиги, член Российской Ассоциации Рефлексотерапевтов. Постоянный участник конференций. Автор книги по повышению спортивного мастерства.</p>
<p>Занимается реабилитацией пациентов после инсультов, переломов и травмирования конечностей.</p>
<p style="margin-bottom: 7.5pt; background: white;">&nbsp;</p>','age_from' => '18','age_to' => '15','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000194','id_resource' => '6637','uri' => 'vrachi/rustamov-ruslan-useinovich','surname' => 'Рустамов','name' => 'Руслан','middlename' => 'Усеинович','fullname' => 'Рустамов Руслан Усеинович','photo' => 'rustamov-ruslan-useinovich.png','photo_type' => 'png','photos' => NULL,'holiday' => '0','rating' => '100','rating5' => '0','comments' => '14','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2004','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul><li>2004 — Воронежская государственная медицинская академия им. Н.Н.
Бурденко, «Лечебное дело»;<br /></li>
<ul><li>2006 — Воронежская Государственная Медицинская Академия им. Н.Н.Бурденко клиническая ординарура по специализации «Врач-терапевт».<br /></li>
</p></li>
</ul>
<ul><h3>Курсы повышения квалификации</h3>
<li>2012 — РМАПО, «Мануальная терапия»;<br /></li>
<li>2016  — Школа практической остеопатии А. Смирнова, диплом «Проект Остеопрактика»;
<li>2017 — ЧАНО ДПО «Северо-Западная академия остеопатии и медицинской психологии», «Остеопатия».<br /></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Рустамов Руслан Усеинович - [[*ratesCount]] | Мануальный терапевт, Остеопат | [[!+unit_seoName]] - Ист Клиник','description' => 'В лечении использует мануальную терапию, остеопатию.','introtext' => '','description_full' => '<p>&nbsp;</p>
<p>Рустамов Руслан Усеинович &ndash; мануальный терапевт, остеопат. Выпускник Школы практической остеопатии Смирнова. Занимается диагностикой, ведением и лечением пациентов с острыми и хроническими проблемами опорно-двигательной, желудочно-кишечной и нервной систем. Успешно применяет методики лечения головных болей различных этиологий.</p>
<p>Также помогает восстанавливаться пациентам после травм опорно-двигательной системы и инсультов. Принимает детей и взрослых с ДЦП.</p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000200','id_resource' => '7883','uri' => 'vrachi/gulyaev-vladimir-leonidovich','surname' => 'Гуляев','name' => 'Владимир','middlename' => 'Леонидович','fullname' => 'Гуляев Владимир Леонидович','photo' => 'gulyaev-vladimir-leonidovich.png','photo_type' => 'png','photos' => NULL,'holiday' => '0','rating' => '99','rating5' => '0','comments' => '28','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '1980','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul><li>1980 — Кубанский медицинский институт имени Красной Армии, специальность «Врач»;<br /></li>
<ul><li>1988 — ЦОЛИУВ, ординарура по специализациям «Мануальная терапия», «Рефлексотерапия».<br /></li>
</p></li>
</ul>
<ul><h3>Курсы повышения квалификации</h3>
<li>1986 — ЦОЛИУВ, «Рефлексотерапия при заболеваниях нервной системы»;<br /></li>
<li>1988  — ЦОЛИУВ, «Мануальная терапия»;
<li>1988 — ЦОЛИУВ, «Физиотерапия и курортология в
педиатрии»; <br /></li>
<li> 1989 — Львовская городская больница, «Врач-хирург».<br /></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Гуляев Владимир Леонидович - [[*ratesCount]] - Цена от [[*doc_priem]] ₽ - Мануальный терапевт, Рефлексотерапевт - Ист Клиник','description' => 'Гуляев Владимир Леонидович – мануальный терапевт, рефлексотерапевт. Специализируется на трудноизлечимых заболеваниях нервной системы во всех возрастных группах.','introtext' => '','description_full' => '<p>&nbsp;</p>
<p>Гуляев Владимир Леонидович &ndash; остеопат, рефлексотерапевт. Более 30 лет владеет уникальной методикой ускоренного полного восстановления (на основе приемов рефлексотерапии) при приобретенных неврологических нарушениях, вплоть до гемипареза, у детей до года. Подобного метода реабилитации нет в Европе, США и других странах.</p>
<p>Также специализируется на трудноизлечимых заболеваниях нервной системы во всех возрастных группах и лечении головных болей различного генеза (тяжелые мигрени, сосудистые головные боли).</p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000201','id_resource' => '7885','uri' => 'vrachi/czyiro-dmitrij-gennadevich','surname' => 'Цыро','name' => 'Дмитрий','middlename' => 'Геннадьевич','fullname' => 'Цыро Дмитрий Геннадьевич','photo' => 'czyiro-dmitrij-gennadevich.png','photo_type' => 'png','photos' => '{"120x120": ["assets/resourceimages/7885/_120x120/Cyro1_120x120.webp", "assets/resourceimages/7885/_120x120/Cyro2_120x120.webp", "assets/resourceimages/7885/_120x120/Cyro3_120x120.webp", "assets/resourceimages/7885/_120x120/Cyro4_120x120.webp"], "232x269": ["assets/resourceimages/7885/_232x269/Cyro1_232x269.webp", "assets/resourceimages/7885/_232x269/Cyro2_232x269.webp", "assets/resourceimages/7885/_232x269/Cyro3_232x269.webp", "assets/resourceimages/7885/_232x269/Cyro4_232x269.webp"], "576x576": ["assets/resourceimages/7885/_576x576/Cyro1_576x576.webp", "assets/resourceimages/7885/_576x576/Cyro2_576x576.webp", "assets/resourceimages/7885/_576x576/Cyro3_576x576.webp", "assets/resourceimages/7885/_576x576/Cyro4_576x576.webp"]}','holiday' => '1','rating' => '99','rating5' => '0','comments' => '43','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2004','way_experience' => '<h2>Профессиональная подготовка:</h2>
</p></li>
<li>2004 — Ярославская государственная медицинская академия, «Лечебное дело»;</p></li>
<li>2007 — РМАПО на базе ГКБ им. Боткина, клиническая ординатура по неврологии;</p></li>
<li>2017 — Ярославский государственный медицинский университет, «Неврология»;</p></li>
<li>2018 — Российская медицинская академия непрерывного профессионального образования, «Мануальная терапия».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Цыро Дмитрий Геннадьевич - [[*ratesCount]] | Мануальный терапевт, Невролог | [[!+unit_seoName]] - Ист Клиник','description' => 'Цыро Дмитрий Геннадьевич - врач невролог, мануальный терапевт, специалист по лечебным видам массажа, лечебной физкультуре,  восстановительному лечению.','introtext' => '','description_full' => 'Цыро Дмитрий Геннадьевич - врач невролог, мануальный терапевт, специалист по лечебным видам массажа, лечебной физкультуре и восстановительному лечению.
<p></p>
Имеет большой клинический опыт комплексного лечения и реабилитации пациентов с заболеваниями центральной и периферической нервной системы (двигательные и чувствительные нарушения при инсультах, полинейропатиях, остеохондрозе позвоночника, грыжах межпозвоночных дисков, нестабильности позвоночно-двигательных сегментов), постмастэктомическом синдроме.
<p></p>
Применяет уникальные методики в лечении боли в области таза, копчика, тазобедренных суставов. В совершенстве владеет методиками медикаментозных блокад при болевых синдромах, связанных с патологией позвоночника, фармакопунктурой (введение лекарственных препаратов в биологически активные точки).
<p></p>
В работе с пациентами применяет индивидуальные схемы терапии, составленные с учётом особенностей течения болезни у каждого конкретного больного.
<p></p>
Активно разрабатывает и внедряет в лечебную деятельность способы нелекарственных методов лечения (биодинамическая коррекция, кинезиотерапия).
<p></p>
Является автором ряда оригинальных методик лечения заболеваний опорно-двигательного аппарата, включающих в себя сочетание специальных видов массажа, мануальную терапию, ЛФК и физиотерапию.
','age_from' => '18','age_to' => '18','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000222','id_resource' => '8132','uri' => 'vrachi/bakshi-vladimir-vladimirovich','surname' => 'Бакши','name' => 'Владимир','middlename' => 'Владимирович','fullname' => 'Бакши Владимир Владимирович','photo' => 'bakshi-vladimir-vladimirovich_.jpg','photo_type' => 'jpg','photos' => NULL,'holiday' => '0','rating' => '100','rating5' => '4.6','comments' => '11','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2012','way_experience' => '<h2>Профессиональная подготовка:</h2>
<ul>
<li>2012 — Институт Шанг-Шунг (Санкт-Петербург), «Традиционный тибетский массаж Ку-нье»;<br /></li>
<li>2013 — НУДПО «Институт профессионального массажа», «Креольский массаж. Массаж бамбуковыми палками»;<br /></li>
<li>2014 — Институт Шанг-Шунг (Павловский посад), «Традиционный тибетский массаж Ку-нье»;<br /></li>
<li>2016 — ГБПОУ «Медицинский колледж N2», «Сестринское дело»;<br /></li>
<li>2017 — Институт Шанг-Шунг (Павловский посад), «Традиционная 5 летняя программа по тибетской медицине»;<br /></li>
<li>2018 — Интернатура с последующей аттестацией на базе окружного Государственного госпиталя провинции Цинхай (г. Синин, КНР);<br /></li>
</ul>
<h3>Курсы повышения квалификации</h3>
<li>2011 — Институт восстановительной медицины, «Гирудотерапия»;<br /></li>
<li>2011 — Институт профессионального массажа, «Массаж стоп», «Старославянский массаж», «Постизометрическая релаксация мышц», «Методики и техники медицинского массажа».<br /></li>




','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Бакши Владимир Владимирович -  [[*ratesCount]] - Цена от [[*doc_priem]] ₽ - Массажист - Ист Клиник','description' => 'Бакши Владимир Владимирович – массажист, врач тибетской медицины. Использует комплексные методы лечения и диагностики традиционной тибетской медицины: пульсодиагностику, мягкие мануальные техники, висцеральный массаж.','introtext' => '','description_full' => '<p>Бакши Владимир Владимирович<span data-contrast="auto">&nbsp;&ndash; массажист, врач тибетской медицины. Более 7 лет специализируется на лечении внутренних болезней. С 201</span><span data-contrast="auto">2 работ</span><span data-contrast="auto">ал</span><span data-contrast="auto">&nbsp;</span><span data-contrast="auto">ведущим специал</span><span data-contrast="auto">истом по массажу и физиотерапии</span><span data-contrast="auto">&nbsp;в клинике тибетской медицины</span><span data-contrast="auto">&nbsp;в Москве.</span></p>
<p><span data-contrast="auto">Владимир Владимирович использует комплексные методы лечения и диагностики традиционной тибетской медицины:&nbsp;</span><span data-contrast="auto">пульсодиагностику, мягкие мануальные техники, висцеральный массаж.&nbsp;Имеет богатый опыт в работе с заболеваниями ЖКТ,&nbsp;постинсультной реабилитации, репродуктивными проблемами мужчин и женщин,&nbsp;ментальными расстройствами. Принимает детей с 4 лет.</span></p>','age_from' => '18','age_to' => '3','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000260','id_resource' => '8608','uri' => 'vrachi/makuha-aleksandr-nikolaevich','surname' => 'Макуха','name' => 'Александр','middlename' => 'Николаевич','fullname' => 'Макуха Александр Николаевич','photo' => 'makuha-aleksandr-nikolaevich.png','photo_type' => 'png','photos' => '{"120x120": ["assets/resourceimages/8608/_120x120/Makuha1_120x120.webp", "assets/resourceimages/8608/_120x120/Makuha2_120x120.webp", "assets/resourceimages/8608/_120x120/Makuha3_120x120.webp", "assets/resourceimages/8608/_120x120/Makuha4_120x120.webp"], "232x269": ["assets/resourceimages/8608/_232x269/Makuha1_232x269.webp", "assets/resourceimages/8608/_232x269/Makuha2_232x269.webp", "assets/resourceimages/8608/_232x269/Makuha3_232x269.webp", "assets/resourceimages/8608/_232x269/Makuha4_232x269.webp"], "576x576": ["assets/resourceimages/8608/_576x576/Makuha1_576x576.webp", "assets/resourceimages/8608/_576x576/Makuha2_576x576.webp", "assets/resourceimages/8608/_576x576/Makuha3_576x576.webp", "assets/resourceimages/8608/_576x576/Makuha4_576x576.webp"]}','holiday' => '0','rating' => '98','rating5' => '4.7','comments' => '18','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '1977','way_experience' => '<h2>Профессиональная подготовка:</h2>
<ul></p></li>
<li>1977 — Саратовский государственный медицинский институт, военно-медицинский факультет по специальности «Лечебно-профилактической дело»;</p></li>
<li>1981 — 65 Интернатура медицинского состава ГСВГ по специальности «Невропатология»;</p></li>
<li>1990 — Ленинградская ВМА им. Кирова, «Психофизиология и профотбор для ВВС»;</p></li>
<li>1994 — Казанский ГИДУВ, «Мануальная терапия».</p></li>
</ul></p></li>
<h5>Курсы повышения квалификации</h5>
</p></li>
<li>1999 — ПГМА, «Мануальная терапия»;</p></li>
<li>2004 — ПГМА, «Мануальная терапия»;</p></li>
<li>2009 — ПГМА, «Мануальная терапия»;</p></li>
<li>2014 — ПГМА, «Мануальная терапия»;</p></li>
<li>2019 — ПГМА, «Мануальная терапия».</p></li>
</ul>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Макуха Александр Николаевич - [[*ratesCount]] | Манульный терапевт, Остеопат | [[!+unit_seoName]] - Ист Клиник','description' => 'Макуха Александр Николаевич -  манульный терапевт, остеопат. Использует комплексные методы лечения: мягкие методы мануальной терапии, рефлексотерапию, методы вакуум-градиентной терапии, различные виды массажа.','introtext' => '','description_full' => '<p>Макуха Александр Николаевич - мануальный терапевт, остеопат. Более 26 лет помогает пациентам как мануальный терапевт. С 1994 по 1999 годы работал мануальным терапевтом в военном авиационном училище. С 1999 по 2019 годы работал в медицинских центрах города Перми.</p>
<p>Использует в работе комплексные методы лечения: мягкие методы мануальной терапии, рефлексотерапию, методы вакуум-градиентной терапии, различные виды массажа.</p>','age_from' => '18','age_to' => '3','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000298','id_resource' => '8948','uri' => 'vrachi/kubyshta-svetlana-mihajlovna','surname' => 'Кубышта','name' => 'Светлана','middlename' => 'Михайловна','fullname' => 'Кубышта Светлана Михайловна','photo' => 'kubyshta-svetlana-mihajlovna.jpg','photo_type' => 'jpg','photos' => NULL,'holiday' => '1','rating' => '100','rating5' => '0','comments' => '11','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2004','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>2004 — Амурская государственная медицинская академия, «Лечебное дело»;</p></li>
<li>2005 — Амурская государственная медицинская академия, интернатура по «Неврологии».</p></li>
</ul>
<h3>Курсы повышения квалификации</h3>
<li>2009 — Кубанский ГМУ, «Неврология»;</p></li>
<li>2013 — ГБОУ ВПО РНИМУ им. Н. И. Пирогова МЗ РФ, «Депрессия в неврологической практике»;</p></li>
<li>2014 — ГБОУ ДПО «РМАПО» МЗ РФ (Москва), «Неврология»;</p></li>
<li>2015 — ФБГВОУ МО РФ им Кирова (Москва), «Экспертиза временной нетрудоспособности».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Кубышта Светлана Михайловна - [[*ratesCount]] | Невролог, Рефлексотерапевт | [[!+unit_seoName]] - Ист Клиник','description' => 'Кубышта Светлана Михайловна - невролог, рефлексотерапевт. Специализируется на лечении заболеваний нервной системы в полном объеме и терапевтической помощи.','introtext' => '','description_full' => '<p style="background: white;">Кубышта Светлана Михайловна - невролог, рефлексотерапевт. Более 15 лет специализируется на лечении заболеваний нервной системы в полном объеме и терапевтической помощи.</p>
<p style="background: white;">Помогает пациентам с болезнью Паркинсона и другими нейродегенеративными заболеваниями головного мозга (эссенциальный тремор, подкорковый гиперкинез, дименция, сосудистый паркинсонизм, болезнь Альцгеймера, деменция с тельцами Леви), с вроженными и приобретенными заболеваниями головного и спинного мозга.</p>','age_from' => '18','age_to' => '5','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000305','id_resource' => '8993','uri' => 'vrachi/kostryukov-aleksandr-vladimirovich','surname' => 'Кострюков','name' => 'Александр','middlename' => 'Владимирович','fullname' => 'Кострюков Александр Владимирович','photo' => 'kostryukov-aleksandr-vladimirovich.jpg','photo_type' => 'jpg','photos' => '{"120x120": ["assets/resourceimages/8993/_120x120/Kostryukov1_120x120.webp", "assets/resourceimages/8993/_120x120/Kostryukov2_576x576_120x120.webp", "assets/resourceimages/8993/_120x120/Kostryukov3_576x576_120x120.webp", "assets/resourceimages/8993/_120x120/Kostryukov4_120x120.webp"], "232x269": ["assets/resourceimages/8993/_232x269/Kostryukov1_232x269.webp", "assets/resourceimages/8993/_232x269/Kostryukov2_576x576_232x269.webp", "assets/resourceimages/8993/_232x269/Kostryukov3_576x576_232x269.webp", "assets/resourceimages/8993/_232x269/Kostryukov4_232x269.webp"], "576x576": ["assets/resourceimages/8993/_576x576/Kostryukov1_576x576.webp", "assets/resourceimages/8993/_576x576/Kostryukov2_576x576_576x576.webp", "assets/resourceimages/8993/_576x576/Kostryukov3_576x576_576x576.webp", "assets/resourceimages/8993/_576x576/Kostryukov4_576x576.webp"]}','holiday' => '1','rating' => '100','rating5' => '4.8','comments' => '27','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '1985','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
</p></li>
<li>1985 — 2-й Московский ордена Ленина Государственный медицинский институт имени Н. И. Пирогова, «Педиатрия»;</p></li>
<li>1991 — Кафедра травматологии и ортопедии ФУМ МОНИКИ, курс общего усовершенствования по мануальной и ортопедической медицине;</p></li>
<li>1996 — Кафедра травматологии и ортопедии ФУМ МОНИКИ, «Клиническая вертебрология»;</p></li>
<li>2007 — Научно-практический семинар доктора-остеопата Жан-Пьера Амика, «Постуральная диагностика и коррекция нарушений. Периферические нервы»;</p></li>
<li>2008 — Европейская Школа Остеопатии (ESO) United Kingdom, Maidstone, Kent, «Доктор-остеопат»;</p></li>
<li>2008 — Российская медицинская академия Росздрава, «Педиатрия»;</p></li>
<li>2009 — Ежегодное участие в научно-практических семинарах и клинических разборах:
«Общая регулировка тела – продвинутые техники Европейской школы» под руководством д-ра-остеопата Зары Ван Герберт;</p></li>
<li>2009 — Научно-практический семинар «Остеопатическое сопровождение беременности, родов, послеродового периода. Остеопатический взгляд на некоторые урологические и гинекологические состояния»
(Д-р-остеопат Каролина Стоун, Австралия);</p></li>
<li>2009 — РАОМ, семинар «Лимфатическая система внутренних органов (особенности остеопатического поражения, диагностика и лечение)» с участием доктора-остеопата Кеннета Лоссинга (США);</p></li>
<li>2010 — Российская медицинская академия после дипломного образования Росздрава, «Мануальная терапия»;</p></li>
<li>2010 — Институт Остеопатической медицины, курс «Тканевый подход в остеопатии – I уровень»
руководитель курса – доктор-остеопат Пьер Трико;</p></li>
<li>2010 — Научно-практический курс Томаса Майера «Body3 Series: Tensegrity Spine» (Великобритания);</p></li>
<li>2012 — Научно-практический семинар «Холистический подход в лечении и диагностике стоматологических пациентов с нарушением окклюзии»;</p></li>
<li>2012 — Научно-практический семинар «Родовая травма и основание черепа. Внутрикостные повреждения в педиатрической практике»;</p></li>
<li>2015 — ГБОУВПО Северо-Западный государственный медицинский университет им. И. И. Мечникова, «Остеопатия».</p></li>
<ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Кострюков Александр Владимирович - [[*ratesCount]] | Остеопат, Мануальный терапевт | [[!+unit_seoName]] - Ист Клиник','description' => 'Кострюков Александр Владимирович - остеопат, мануальный терапевт. В лечении протрузий межпозвоночных дисков, грыж, искривления позвоночника применяет мягкие мануальные техники. Изучает возможности применения методов остеопатии в стоматологии.','introtext' => '','description_full' => '<p>Кострюков Александр Владимирович &ndash; остеопат, мануальный терапевт с более чем 30-летней практикой.</p>
<p>В лечении протрузий межпозвоночных дисков, грыж, искривления позвоночника применяет мягкие мануальные техники.&nbsp; Проводит процедуры с применением структуральных, краниосакральных и висцеральных остеопатических техник. Изучает возможности применения методов остеопатии в стоматологии. Постоянно совершенствует свой профессиональный уровень.</p>
<p>Специализируется на лечении остеохондроза, болей шеи и спины, онемения конечностей, головных, суставных и мышечных болях различной этиологии, растяжения мягких тканей, нарушения свободы движений, спазмов мышц. А также на лечении некоторых ЛОР-заболеваний, бронхитов, астмы, заболеваний внутренних органов (нарушение работы печени, желчевыводящих путей, дисфункция кишечника), гинекологических проблем.</p>
<p>Принимает беременных и пациентов различного возраста: младенцев, детей, взрослых, и людей старшего возраста.</p>','age_from' => '18','age_to' => '7','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000318','id_resource' => '9088','uri' => 'vrachi/klyuev-kirill-evgenevich','surname' => 'Клюев','name' => 'Кирилл','middlename' => 'Евгеньевич','fullname' => 'Клюев Кирилл Евгеньевич','photo' => 'klyuev-kirill-evgenevich-.jpg','photo_type' => 'jpg','photos' => '{"120x120": ["assets/resourceimages/9088/_120x120/Klyuev_1_2.0_120x120.webp", "assets/resourceimages/9088/_120x120/Kluyev_3_2.0_120x120.webp", "assets/resourceimages/9088/_120x120/Kluyev_4_2.0_120x120.webp", "assets/resourceimages/9088/_120x120/Klyuev2_2.0_120x120.webp"], "232x269": ["assets/resourceimages/9088/_232x269/Klyuev_1_2.0_232x269.webp", "assets/resourceimages/9088/_232x269/Kluyev_3_2.0_232x269.webp", "assets/resourceimages/9088/_232x269/Kluyev_4_2.0_232x269.webp", "assets/resourceimages/9088/_232x269/Klyuev2_2.0_232x269.webp"], "576x576": ["assets/resourceimages/9088/_576x576/Klyuev_1_2.0_576x576.webp", "assets/resourceimages/9088/_576x576/Kluyev_3_2.0_576x576.webp", "assets/resourceimages/9088/_576x576/Kluyev_4_2.0_576x576.webp", "assets/resourceimages/9088/_576x576/Klyuev2_2.0_576x576.webp"]}','holiday' => '0','rating' => '100','rating5' => '5','comments' => '122','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2000','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul></p></li>
<li>2000 — Московский институт медико-социальной реабилитологии, «Лечебное дело»;</p></li>
<li>2001 — Самарский государственный медицинский университет, интернатура по специальности «Общая хирургия»;</p></li>
<li>2009 — Самарский государственный медицинский университет, ординатура по специальности «Ультразвуковая диагностика»;</p></li>
<li>2014 — Московский государственный медико-стоматологический университет имени А. И. Евдокимова, ординатура по специальности «Травматология и ортопедия»;</p></li>
<li>2018 — Университет профессиональных стандартов, «Неврология».</p></li>
</ul>
<h5>Курсы повышения квалификации</h5>
</p></li>
<li>2006 — Самарский государственный медицинский университет, «Сосудистая и торакальная хирургия»;</p></li>
<li>2010 — Самарский государственный медицинский университет, «Ультразвуковая диагностика суставов и мягких тканей»;</p></li>
<li>2014 — Российская медицинская академия последипломного образования, «Ультразвуковая диагностика»;</p></li>
<li>2015 — Российский университет дружбы народов, «Организация здравоохранения и общественное здоровье»;</p></li>
<li>2019 — АНОДПО «Учебный центр медицинских работников», «Ультразвуковая диагностика»;</p></li>
<li>2019 — АНОДПО «Учебный центр медицинских работников», «Травматология и ортопедия».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Клюев Кирилл Евгеньевич - [[*ratesCount]] | Травматолог, Врач УЗИ | [[!+unit_seoName]] - Ист Клиник','description' => 'Клюев Кирилл Евгеньевич - невролог, травматолог-ортопед, врач ультразвуковой диагностики. Проводит исследования различных органов и систем, пункцию поверхностных структур и биопсию под контролем УЗИ.','introtext' => '','description_full' => '<div>Клюев Кирилл Евгеньевич - невролог, травматолог-ортопед, врач ультразвуковой диагностики. Как УЗИ-специалист широкого профиля, проводит исследования различных органов и систем. Также проводит пункцию поверхностных структур и биопсию под контролем УЗИ.</div>
<div>&nbsp;</div>
<div>Проводит реабилитацию, но не ранее, чем через 6 месяцев после прохождения лечения у хирурга. Лечит заболевания опорно двигательного аппарата, артрозы, артропатии, бурситы, синовииты, энтезопатии, Остеохондроз и его проявления, дорсопатии.</div>','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '1','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000343','id_resource' => '9321','uri' => 'vrachi/kosorlukov-svyatoslav-andreevich','surname' => 'Косорлуков','name' => 'Святослав','middlename' => 'Андреевич','fullname' => 'Косорлуков Святослав Андреевич','photo' => 'kosorlukov-svyatoslav-andreevich-.jpg','photo_type' => 'jpg','photos' => '{"120x120": ["assets/resourceimages/9321/_120x120/Kosorlykov1_2.0_120x120.webp", "assets/resourceimages/9321/_120x120/Kosorlykov2_3.0_120x120.webp", "assets/resourceimages/9321/_120x120/Kosorlykov3_2.0_120x120.webp", "assets/resourceimages/9321/_120x120/Kosorlykov4_2.0_120x120.webp"], "232x269": ["assets/resourceimages/9321/_232x269/Kosorlykov1_2.0_232x269.webp", "assets/resourceimages/9321/_232x269/Kosorlykov2_3.0_232x269.webp", "assets/resourceimages/9321/_232x269/Kosorlykov3_2.0_232x269.webp", "assets/resourceimages/9321/_232x269/Kosorlykov4_2.0_232x269.webp"], "576x576": ["assets/resourceimages/9321/_576x576/Kosorlykov1_2.0_576x576.webp", "assets/resourceimages/9321/_576x576/Kosorlykov2_3.0_576x576.webp", "assets/resourceimages/9321/_576x576/Kosorlykov3_2.0_576x576.webp", "assets/resourceimages/9321/_576x576/Kosorlykov4_2.0_576x576.webp"]}','holiday' => '0','rating' => '100','rating5' => '4.6','comments' => '38','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2012','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
</p></li>
<li>2012 — Самарский государственный медицинский университет, «Лечебное дело»;</p></li>
<li>2014 — Самарский государственный медицинский университет, клиническая ординатура по специальности «Неврология»;</p></li>
<li>2016 — Медицинский университет «Реавиз», «Основы профпатологии»;</p></li>
<li>2017 — Самарский государственный медицинский университет, «Внутрисуставное и периартикулярное применение медикаментов при заболеваниях суставов»;</p></li>
<li>2017 — Санкт-Петербургский государственный медицинский университет им. академика И. П. Павлова, «Остеопатия»;</p></li>
<li>2018 — Медицинский университет «Реавиз», «Экспертиза временной нетрудоспособности»;</p></li>
<li>2018 — European School of Osteopathy / Российская академия остеопатической медицины, «Diploma in Osteopathy»;</p></li>
<li>2019 — Автономная некоммерческая организация дополнительного профессионального образования «Учебный центр медицинского работника», «Неврология»;</p></li>
<li>2020 — НП «Лига содействия развитию подиатрии», «Подиатрия. Ортезирование стоп по системе Формтотикс».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Косорлуков Святослав Андреевич - [[*ratesCount]] | Невролог, Остеопат | [[!+unit_seoName]] - Ист Клиник','description' => 'Косорлуков Святослав Андреевич – невролог, остеопат, реабилитолог. Специализируюсь на диагностике и лечении заболеваний позвоночника, центральной и периферической нервной системы, остеопатической коррекции осанки и биомеханики организма.','introtext' => '','description_full' => '<p><img src="/assets/resourceimages/9321/1.png" /></p>
<p>Моя жизнь была связана с медициной с раннего детства. Выросший в семье врачей &ndash; я привык к обсуждению заболеваний и клинической работы в кругу семьи. Соответственно, когда речь зашла о выборе профессии, общее направление деятельности было определено уже заочно. По ряду причин среднее образование я получил в специализированной гимназии на английском языке, который активно использую по сей день.</p>
<p>В 2006 году я поступил в Самарский государственный медицинский университет, который закончил кафедрой нервных болезней со специализацией &laquo;неврология&raquo; в 2014.</p>
<p>Начав работать в поликлинике и реабилитационном центре, я стал сталкиваться с вопросами &laquo;а что вы можете сказать об остеопатии?". Об остеопатии я сказать ничего не мог, потому начал читать...и понеслось.</p>
<p>Среди занимающихся обучением остеопатии школ, моё внимание привлекла European school of osteopathy &ndash; английская школа с преподавателями из Англии и Франции. Вот и пригодилось знание языка! Обучение заняло долгие 4 года, приходилось сочетать с работой в реабилитационном центре, но позволило вдоволь поездить по Альбиону.</p>
<p><img src="/assets/resourceimages/9321/2.png" /></p>
<p>Теперь, обладая знаниями и опытом в области неврологии, остеопатии и реабилитации, я стараюсь объединять это в максимально полезные, приятные и легко переносимые процедуры для пациентов любого возраста с проблемами со стороны нервной системы и опорно-двигательного аппарата.</p>
<p>В диагностике и лечении я использую холистический взгляд на пациента и его проблемы, воздействие осуществляется мягкими структуральными, висцеральными и кранио-сакральными техниками. Это позволяет работать с детьми с проблемами развития позвоночника или нервной системы, и пациентами пожилого возраста с рядом сопутствующих заболеваний.</p>
<p>Приходите, познакомимся лично!</p>','age_from' => '18','age_to' => '15','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[{"question":"\\t\\u0412\\u0441\\u043f\\u043e\\u043c\\u043d\\u0438\\u0442\\u0435 \\u0441\\u0430\\u043c\\u043e\\u0433\\u043e \\u0441\\u043b\\u043e\\u0436\\u043d\\u043e\\u0433\\u043e \\u043f\\u0430\\u0446\\u0438\\u0435\\u043d\\u0442\\u0430, \\u043a\\u043e\\u0442\\u043e\\u0440\\u043e\\u043c\\u0443 \\u0432\\u044b \\u043d\\u0435 \\u043d\\u0430\\u0434\\u0435\\u044f\\u043b\\u0438\\u0441\\u044c \\u043f\\u043e\\u043c\\u043e\\u0447\\u044c, \\u0430 \\u043f\\u043e\\u043c\\u043e\\u0433\\u043b\\u0438?","answer":"<p>\\u041d\\u0430 \\u043f\\u0435\\u0440\\u0432\\u043e\\u043c \\u0433\\u043e\\u0434\\u0443 \\u043e\\u0431\\u0443\\u0447\\u0435\\u043d\\u0438\\u044f, \\u043a\\u043e\\u0433\\u0434\\u0430 \\u044f \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043d\\u0430\\u0447\\u0438\\u043d\\u0430\\u043b \\u043e\\u0441\\u0432\\u0430\\u0438\\u0432\\u0430\\u0442\\u044c \\u043e\\u0441\\u0442\\u0435\\u043e\\u043f\\u0430\\u0442\\u0438\\u0447\\u0435\\u0441\\u043a\\u0438\\u0435 \\u0442\\u0435\\u0445\\u043d\\u0438\\u043a\\u0438 (\\u043c\\u044b \\u043d\\u0430\\u0447\\u0438\\u043d\\u0430\\u043b\\u0438 \\u0441 \\u043f\\u043e\\u044f\\u0441\\u043d\\u0438\\u0447\\u043d\\u043e\\u0433\\u043e \\u043e\\u0442\\u0434\\u0435\\u043b\\u0430 \\u043f\\u043e\\u0437\\u0432\\u043e\\u043d\\u043e\\u0447\\u043d\\u0438\\u043a\\u0430), \\u043d\\u0430 \\u043c\\u043e\\u044e \\u0440\\u0430\\u0431\\u043e\\u0442\\u0443 \\u0432 \\u0440\\u0435\\u0430\\u0431\\u0438\\u043b\\u0438\\u0442\\u0430\\u0446\\u0438\\u043e\\u043d\\u043d\\u043e\\u043c \\u0446\\u0435\\u043d\\u0442\\u0440\\u0435 \\u043f\\u0440\\u0438\\u0448\\u043b\\u0430 \\u043c\\u043e\\u043b\\u043e\\u0434\\u0430\\u044f \\u043f\\u0430\\u0446\\u0438\\u0435\\u043d\\u0442\\u043a\\u0430 \\u0441 \\u0432\\u044b\\u0440\\u0430\\u0436\\u0435\\u043d\\u043d\\u043e\\u0439 \\u0431\\u043e\\u043b\\u044c\\u044e \\u0438 \\u0437\\u043d\\u0430\\u0447\\u0438\\u0442\\u0435\\u043b\\u044c\\u043d\\u043e\\u0439 \\u0433\\u0440\\u044b\\u0436\\u0435\\u0439 \\u043f\\u043e\\u044f\\u0441\\u043d\\u0438\\u0447\\u043d\\u043e\\u0433\\u043e \\u043e\\u0442\\u0434\\u0435\\u043b\\u0430 \\u043d\\u0430 \\u041c\\u0420\\u0422. \\u0414\\u043e\\u0431\\u0438\\u0442\\u044c\\u0441\\u044f \\u0441\\u0442\\u043e\\u0439\\u043a\\u043e\\u0433\\u043e \\u043e\\u0431\\u043b\\u0435\\u0433\\u0447\\u0435\\u043d\\u0438\\u044f \\u0431\\u043e\\u043b\\u0435\\u0439 \\u043d\\u0435 \\u0443\\u0434\\u0430\\u0432\\u0430\\u043b\\u043e\\u0441\\u044c, \\u0438 \\u044f \\u043f\\u0440\\u0435\\u0434\\u043b\\u043e\\u0436\\u0438\\u043b \\u0435\\u0439 \\u043f\\u043e\\u043f\\u0440\\u043e\\u0431\\u043e\\u0432\\u0430\\u0442\\u044c \\u043d\\u0435\\u0441\\u043a\\u043e\\u043b\\u044c\\u043a\\u043e \\u043e\\u0441\\u0442\\u0435\\u043e\\u043f\\u0430\\u0442\\u0438\\u0447\\u0435\\u0441\\u043a\\u0438\\u0445 \\u0442\\u0435\\u0445\\u043d\\u0438\\u043a. \\u041a \\u043c\\u043e\\u0435\\u043c\\u0443 \\u0443\\u0434\\u0438\\u0432\\u043b\\u0435\\u043d\\u0438\\u044e (\\u0430 \\u044f \\u0442\\u043e\\u0433\\u0434\\u0430 \\u0435\\u0449\\u0451 \\u043d\\u0435 \\u0431\\u044b\\u043b \\u0434\\u043e \\u043a\\u043e\\u043d\\u0446\\u0430 \\u0443\\u0431\\u0435\\u0436\\u0434\\u0451\\u043d \\u0432 \\u044d\\u0444\\u0444\\u0435\\u043a\\u0442\\u0438\\u0432\\u043d\\u043e\\u0441\\u0442\\u0438 \\u043e\\u0441\\u0442\\u0435\\u043e\\u043f\\u0430\\u0442\\u0438\\u0438) \\u0435\\u0439 \\u0441 \\u043f\\u0435\\u0440\\u0432\\u043e\\u0439 \\u0436\\u0435 \\u043f\\u0440\\u043e\\u0446\\u0435\\u0434\\u0443\\u0440\\u044b \\u0441\\u0442\\u0430\\u043b\\u043e \\u043b\\u0435\\u0433\\u0447\\u0435, \\u0430 \\u0437\\u0430 3 \\u043f\\u0440\\u0438\\u0435\\u043c\\u0430 \\u0431\\u043e\\u043b\\u0438 \\u043f\\u043e\\u043b\\u043d\\u043e\\u0441\\u0442\\u044c\\u044e \\u043f\\u0435\\u0440\\u0435\\u0441\\u0442\\u0430\\u043b\\u0438 \\u0431\\u0435\\u0441\\u043f\\u043e\\u043a\\u043e\\u0438\\u0442\\u044c. \\u041c\\u043d\\u0435 \\u043a\\u0430\\u0436\\u0435\\u0442\\u0441\\u044f, \\u0438\\u043c\\u0435\\u043d\\u043d\\u043e \\u044d\\u0442\\u043e\\u0442 \\u0441\\u043b\\u0443\\u0447\\u0430\\u0439 \\u043f\\u043e\\u0434\\u0442\\u0432\\u0435\\u0440\\u0434\\u0438\\u043b \\u0434\\u043b\\u044f \\u043c\\u0435\\u043d\\u044f \\u043d\\u0435\\u043e\\u0431\\u0445\\u043e\\u0434\\u0438\\u043c\\u043e\\u0441\\u0442\\u044c \\u0437\\u0430\\u043d\\u0438\\u043c\\u0430\\u0442\\u044c\\u0441\\u044f \\u043e\\u0441\\u0442\\u0435\\u043e\\u043f\\u0430\\u0442\\u0438\\u0435\\u0439.<\\/p>"},{"question":"\\u0412\\u0441\\u043f\\u043e\\u043c\\u043d\\u0438\\u0442\\u0435 \\u0441\\u043b\\u0443\\u0447\\u0430\\u0439, \\u043a\\u043e\\u0433\\u0434\\u0430 \\u0432\\u044b \\u043d\\u0435 \\u0441\\u043c\\u043e\\u0433\\u043b\\u0438 \\u0441\\u0440\\u0430\\u0437\\u0443 \\u043f\\u043e\\u043c\\u043e\\u0447\\u044c \\u043f\\u0430\\u0446\\u0438\\u0435\\u043d\\u0442\\u0443, \\u0437\\u0430\\u0442\\u0435\\u043c \\u043f\\u0440\\u043e\\u0448\\u043b\\u0438 \\u043e\\u0431\\u0443\\u0447\\u0435\\u043d\\u0438\\u0435 \\u0438\\u043b\\u0438 \\u0441\\u0430\\u043c\\u043e\\u0441\\u0442\\u043e\\u044f\\u0442\\u0435\\u043b\\u044c\\u043d\\u043e \\u0440\\u0430\\u0437\\u043e\\u0431\\u0440\\u0430\\u043b\\u0438\\u0441\\u044c, \\u0438 \\u0437\\u0430\\u0442\\u0435\\u043c \\u0443\\u0441\\u043f\\u0435\\u0448\\u043d\\u043e \\u043d\\u0430\\u0447\\u0430\\u043b\\u0438 \\u043b\\u0435\\u0447\\u0438\\u0442\\u044c \\u0442\\u0430\\u043a\\u0438\\u0445 \\u0431\\u043e\\u043b\\u044c\\u043d\\u044b\\u0445?","answer":"<p>\\u041d\\u0435\\u043f\\u0440\\u043e\\u0441\\u0442\\u043e \\u0434\\u043b\\u044f \\u043c\\u0435\\u043d\\u044f \\u0431\\u044b\\u043b\\u043e \\u043d\\u0430\\u0443\\u0447\\u0438\\u0442\\u044c\\u0441\\u044f \\u043f\\u043e\\u043c\\u043e\\u0433\\u0430\\u0442\\u044c \\u0434\\u0435\\u0442\\u044f\\u043c \\u0441 \\u043d\\u0430\\u0440\\u0443\\u0448\\u0435\\u043d\\u0438\\u044f\\u043c\\u0438 \\u043e\\u0441\\u0430\\u043d\\u043a\\u0438 \\u0438 \\u0443\\u0441\\u0442\\u0430\\u043d\\u043e\\u0432\\u043a\\u0438 \\u0441\\u0442\\u043e\\u043f\\u044b. \\u0412 \\u0447\\u0430\\u0441\\u0442\\u043d\\u043e\\u0441\\u0442\\u0438, \\u043f\\u043e\\u0442\\u043e\\u043c\\u0443 \\u0447\\u0442\\u043e \\u043f\\u043e\\u043b\\u0443\\u0447\\u0438\\u0442\\u044c \\u043e\\u0442 \\u0440\\u0435\\u0431\\u0435\\u043d\\u043a\\u0430 \\u043e\\u0431\\u0440\\u0430\\u0442\\u043d\\u0443\\u044e \\u0441\\u0432\\u044f\\u0437\\u044c \\u0434\\u043e\\u0432\\u043e\\u043b\\u044c\\u043d\\u043e \\u0441\\u043b\\u043e\\u0436\\u043d\\u043e &mdash; \\u0438\\u0445 \\u0447\\u0430\\u0449\\u0435 \\u0432\\u0441\\u0435\\u0433\\u043e \\u043d\\u0438\\u0447\\u0435\\u0433\\u043e \\u043d\\u0435 \\u0431\\u0435\\u0441\\u043f\\u043e\\u043a\\u043e\\u0438\\u0442, \\u0430 \\u0440\\u043e\\u0434\\u0438\\u0442\\u0435\\u043b\\u0438 \\u043d\\u0435 \\u043c\\u043e\\u0433\\u0443\\u0442 \\u043e\\u0431\\u044a\\u0435\\u043a\\u0442\\u0438\\u0432\\u043d\\u043e \\u043e\\u0446\\u0435\\u043d\\u0438\\u0442\\u044c \\u0438\\u0437\\u043c\\u0435\\u043d\\u0435\\u043d\\u0438\\u044f \\u0438\\u0445 \\u0441\\u043e\\u0441\\u0442\\u043e\\u044f\\u043d\\u0438\\u044f. \\u041d\\u043e \\u0441 \\u0442\\u0435\\u0447\\u0435\\u043d\\u0438\\u0435\\u043c \\u0432\\u0440\\u0435\\u043c\\u0435\\u043d\\u0438 \\u043d\\u0430\\u0447\\u0430\\u043b\\u0438 \\u043f\\u0440\\u0438\\u0445\\u043e\\u0434\\u0438\\u0442\\u044c \\u043f\\u043e\\u0434\\u0442\\u0432\\u0435\\u0440\\u0436\\u0434\\u0435\\u043d\\u0438\\u044f \\u0442\\u043e\\u0433\\u043e \\u0447\\u0442\\u043e \\u0432\\u0441\\u0451 \\u0434\\u0435\\u043b\\u0430\\u0435\\u0442\\u0441\\u044f \\u043f\\u0440\\u0430\\u0432\\u0438\\u043b\\u044c\\u043d\\u043e &mdash; \\u0440\\u043e\\u0434\\u0438\\u0442\\u0435\\u043b\\u0438 \\u043e\\u0442\\u043c\\u0435\\u0447\\u0430\\u043b\\u0438 \\u0447\\u0442\\u043e \\u0434\\u0435\\u0442\\u0438 \\u0443\\u0441\\u0442\\u0430\\u044e\\u0442 \\u043c\\u0435\\u043d\\u044c\\u0448\\u0435, \\u0447\\u0442\\u043e \\u043e\\u0431\\u0443\\u0432\\u044c \\u0441\\u0442\\u0438\\u0440\\u0430\\u0435\\u0442\\u0441\\u044f \\u0431\\u043e\\u043b\\u0435\\u0435 \\u0440\\u0430\\u0432\\u043d\\u043e\\u043c\\u0435\\u0440\\u043d\\u043e, \\u0447\\u0442\\u043e \\u0440\\u0435\\u0431\\u0435\\u043d\\u043e\\u043a \\u0434\\u0435\\u0440\\u0436\\u0438\\u0442 \\u0441\\u043f\\u0438\\u043d\\u0443 \\u0440\\u043e\\u0432\\u043d\\u0435\\u0435. \\u0422\\u0430\\u043a \\u0447\\u0442\\u043e \\u044f \\u0441\\u0442\\u0430\\u043b \\u0431\\u043e\\u043b\\u0435\\u0435 \\u0443\\u0432\\u0435\\u0440\\u0435\\u043d\\u043d\\u043e \\u0447\\u0443\\u0432\\u0441\\u0442\\u0432\\u043e\\u0432\\u0430\\u0442\\u044c \\u0441\\u0432\\u043e\\u044e \\u0432\\u043e\\u0437\\u043c\\u043e\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u043f\\u043e\\u043c\\u043e\\u0447\\u044c \\u0442\\u0430\\u043a\\u0438\\u043c \\u043f\\u0430\\u0446\\u0438\\u0435\\u043d\\u0442\\u0430\\u043c.<\\/p>"}]','awards' => '[]'),
        array('iid' => '10000345','id_resource' => '9337','uri' => 'vrachi/bocharova-anna-viktorovna','surname' => 'Бочарова','name' => 'Анна','middlename' => 'Викторовна','fullname' => 'Бочарова Анна Викторовна','photo' => 'bocharova-anna-viktorovna.png','photo_type' => 'png','photos' => NULL,'holiday' => '1','rating' => '99','rating5' => '0','comments' => '47','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2001','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>2001 — Волгоградский государственный медицинский университет, «Неврология»;</p></li>
<li>2007 — Волгоградский государственный медицинский университет, ординатура по «Неврологии»;</p></li>
<li>2009 — Российская медицинская академия последипломного образования, (Москва), «Рефлексотерапия»;</p></li>
<li>2016 — Филиал военно-медицинской академии С. М. Кирова, (Москва), «Организация
здравоохранения и общественное здоровье».</p></li>
</ul>
<h3>Курсы повышения квалификации</h3>
<li>2014 — Институт Биотехнологий и междисциплинарной стоматологии (Москва), «Миофасциальные болевые синдромы: лечение локальными инъекциями
ботулотоксина типа А БТА»;</p></li>
<li>2014 — ГИУВ МО РФ (Москва), «Рефлексотерапия»;</p></li>
<li>2015 — Первый Московский государственный медицинский университет имени И. М. Сеченова, «Интервенционные методы лечения в неврологии»;</p></li>
<li>2016 — Филиал военно-медицинской академии им. С. М. Кирова, «Организация здравоохранения и общественного здоровья»;</p></li>
<li>2016 — Первый Московский государственный медицинский университет имени И. М. Сеченова, «Неврология»;</p></li>
<li>2016 — РУДН, «Рефлексотерапия».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Бочарова Анна Викторовна - [[*ratesCount]] | Невролог, Вертебролог | [[!+unit_seoName]] - Ист Клиник','description' => 'Бочарова Анна Викторовна – врач-невролог, вертебролог.  Использует комплексные методы лечения: остеопатию, мягкие мануальные техники, рефлексотерапию.','introtext' => '','description_full' => '<p>Бочарова Анна Викторовна &ndash; врач-невролог, вертебролог. Более 15 лет специализируется на неврологии. Использует комплексные методы лечения: остеопатию, мягкие мануальные техники, рефлексотерапию.</p>
<p>Практикует диагностику и лечение заболеваний периферической и центральной нервной системы. А также заболеваний и повреждений опорно-двигательного аппарата. Принимает пациентов с острыми, хроническими болями в спине, шее, позвоночнике, с нарушением осанки и грыжей межпозвоночных дисков. Занимается лечением головной боли, мигрени, бессонницы, неврозов, неврастении, депрессии.</p>
<p>Проводит лечение миофасциальных болевых синдромов, паравертебральное введение лекарственных препаратов, инъекции по триггерным точкам.</p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000346','id_resource' => '9338','uri' => 'vrachi/baravi-majya-dzhasmaevna','surname' => 'Барави','name' => 'Майя','middlename' => 'Джасмаевна','fullname' => 'Барави Майя Джасмаевна','photo' => 'baravi-majya-dzhasmaevna.png','photo_type' => 'jpg','photos' => '{"120x120": ["assets/resourceimages/9338/_120x120/Baravi1_120x120.webp", "assets/resourceimages/9338/_120x120/Baravi2_120x120.webp", "assets/resourceimages/9338/_120x120/Baravi3_120x120.webp", "assets/resourceimages/9338/_120x120/Baravi4_120x120.webp"], "232x269": ["assets/resourceimages/9338/_232x269/Baravi1_232x269.webp", "assets/resourceimages/9338/_232x269/Baravi2_232x269.webp", "assets/resourceimages/9338/_232x269/Baravi3_232x269.webp", "assets/resourceimages/9338/_232x269/Baravi4_232x269.webp"], "576x576": ["assets/resourceimages/9338/_576x576/Baravi1_576x576.webp", "assets/resourceimages/9338/_576x576/Baravi2_576x576.webp", "assets/resourceimages/9338/_576x576/Baravi3_576x576.webp", "assets/resourceimages/9338/_576x576/Baravi4_576x576.webp"]}','holiday' => '0','rating' => '100','rating5' => '5','comments' => '98','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2000','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul></p></li>
<li>2000 — Оренбургская Государственная Медицинская Академия, «Лечебное дело»;</p></li>
<li>2001 — Оренбургский Муниципальный Перинатальный Центр, интернатура по специальности «Акушерство и гинекология».</p></li>
</ul></p></li>
<h5>Курсы повышения квалификации</h5>
</p></li>
<li>2000 — Государственная педиатрическая академия (Санкт-Петербург), «Гинекология в эндокринологии»;</p></li>
<li>2001 — Государственная педиатрическая академия (Санкт-Петербург), «Детская и подростковая гинекология»;</p></li>
<li>2003 — Государственная педиатрическая академия (Санкт-Петербург), специализация по УЗД;</p></li>
<li>2004 — Военно-медицинская Академия им. Кирова (Санкт-Петербург),  специализация по оперативной гинекологии;</p></li>
<li>2009 — Военно-медицинская Академия им. Кирова (Санкт-Петербург), «Инфекции и репродуктивное здоровье»;</p></li>
<li>2010 — ФГБУ НМИЦ АГП им. В. И. Кулакова (Москва), «Кольпоскопия и патология шейки матки»;</p></li>
<li>2014 — Российский университет дружбы народов (Москва), «Обучение интимной контурной пластике. Плазмолифтинг»;</p></li>
<li>2015 — ФГБУ ГНЦ ФМБЦ им. А. И. Бурназяна ФМБА России (Москва), повышение квалификации по УЗД;</p></li>
<li>2015 — МНИОИ им. П. А. Герцена (Москва), «Основы маммологии»;</p></li>
<li>2020 — Сертификационный цикл: повышение квалификации по специальности «Ультразвуковая диагностика»;</p></li>
<li>2020 — Образовательный учебный центр (Москва), Сертификационный цикл: повышение квалификации по специальности
«Акушерство и гинекология».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Барави Майя Джасмаевна - [[*ratesCount]] | Гинеколог, Врач УЗИ | [[!+unit_seoName]] - Ист Клиник','description' => 'Барави Майя Джасмаевна – гинеколог, врач УЗИ. Занимается вопросами эстетической гинекологии (малые гинекологические операции), ведением беременности, лечением заболеваний шейки матки, эндометрита, эндометриоза и других заболеваний органов малого таза и мочеполовой системы.','introtext' => '','description_full' => '<p>Барави Майя Джасмаевна &ndash; гинеколог, врач УЗИ, гинеколог-эндокринолог, с действующими сертификатами ультразвуковой диагностики и лазерной гинекологии. Более 20 лет специализируется по акушерству и гинекологии. Оказывает медицинскую помощь взрослому населению, индивидуально подходит к каждому пациенту.</p>
<p>Занимается вопросами лечения, диагностики и профилактики болезней женской репродуктивной системы, ведением беременности, выявлением онкологических заболеваний органов малого таза на ранних стадиях, лечением бесплодия, использованием лазерной гинекологии (лечение недержания мочи, крауроза вульвы, лейкоплакии, опущения стенок влагалища), диагностикой и лечением патологий шейки матки, проводит расширенную кольпоскопию.</p>
<p>А также занимается вопросами эстетической гинекологии (интимная контурная пластика филлерами гиалуроновой кислотой, плазмолифтинг).</p>
<p>Постоянная участница ежегодного конгресса &laquo;Репродуктивный потенциал&raquo; и других медицинских конференций, принимает участие в качестве докладчика и слушателя на международных конференциях по акушерству и гинекологии.</p>','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000356','id_resource' => '9409','uri' => 'vrachi/kutuzov-ruslan-rafailovich','surname' => 'Кутузов','name' => 'Руслан','middlename' => 'Рафаилович','fullname' => 'Кутузов Руслан Рафаилович','photo' => 'kutuzov-ruslan-rafailovich5.jpg','photo_type' => 'png','photos' => '{"120x120": ["site/i/doc/_120x120/kutuzov-ruslan-rafailovich5_120x120.webp"], "232x269": ["site/i/doc/_232x269/kutuzov-ruslan-rafailovich5_232x269.webp"], "576x576": ["site/i/doc/_576x576/kutuzov-ruslan-rafailovich5_576x576.webp"]}','holiday' => '0','rating' => '99','rating5' => '0','comments' => '41','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '1999','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>1999 — Самарский государственный медицинский университет, «Лечебное дело»;</p></li>

<li>2013 — Московский городской педагогический университет, магистратура по «Психологии»;</p></li>
<li>2014 — Медицинский университет РЕАВИЗ, «Неврология»;</p></li>
<li>2016 — Медицинский университет РЕАВИЗ, «ЛФК и спортивная медицина»;</p></li>
<li>2017 — Санкт-Петербургский государственный медицинский университет им. И. П. Павлова, «Мануальная терапия»;</p></li>
<li>2017 — Самарский государственный медицинский университет, «Внутрисуставные и периартикулярные применения медикаментов, при заболеваниях крупных суставов»;</p></li>
<li>2017 — Медицинский университет РЕАВИЗ, «Экспертиза временной нетрудоспособности»;</p></li>
<li>2017 — Санкт-Петербургский государственный университет, «Мануальная терапия»;</p></li>
<li>2018 — ФГБОУ ДПО РНИМО им. Н. И. Пирогова Минздрава России, «Сосудистые и когнитивные Нарушения. Алгоритмы диагностики и лечения»;</p></li>
<li>2018 — Институт остеопатии (Санкт-Петербург), курсы повышения квалификации по остеопатии (1800 часов);</p></li>
<li>2018 — Самарский государственный медицинский университет, «Медицинская реабилитация»;</p></li>
<li>2019 — ФГБОУ ДПО СамГМУ Минздрава России, «Неврология»;</p></li>
<li>2019 — АНОДПО «Учебный центр медицинских работников», «Организация здравоохранения и общественное здоровье»;</p></li>
<li>2019 — ГАУЗ Москвы «МНПЦ МРВСМ Департамента здравоохранения города Москвы», «Основные вопросы организации помощи по медицинской реабилитации»;</p></li>
<li>2019 — Самарский государственный медицинский университет, «Актуальные вопросы неврологии»;</p></li>
<li>2020 — ГАУЗ Москвы «МНПЦ МРВСМ Департамента здравоохранения города Москвы», «Медицинская реабилитация больных после острого инфаркта миокарда».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Кутузов Руслан Рафаилович - [[*ratesCount]] | Невролог, Мануальный терапевт | [[!+unit_seoName]] - Ист Клиник','description' => 'Кутузов Руслан Рафаилович – невролог, мануальный терапевт, психолог. Более 20 лет специализируется на комплексной терапии острых неврологических заболеваний, лечении неврастении, невропатии различного генеза и ЛФК при заболеваниях и травмах опорно-двигательного аппарата.','introtext' => '','description_full' => '<p>Кутузов Руслан Рафаилович &ndash; невролог, мануальный терапевт, психолог. Более 20 лет специализируется на комплексной терапии острых неврологических заболеваний, лечении неврастении, невропатии различного генеза и ЛФК при заболеваниях и травмах опорно-двигательного аппарата.</p>
<p>Принимает пациентов с головокружениями, черепно-мозговыми травмами и головными болями разного происхождения, остеохондрозом, хондропатей, грыжами и прочими болезнями позвоночника. А также с болезнью Альцгеймера, Паркинсона, эпилепсией, вегето-висцеральными кризами, НЦД, снижением внимания, памяти и рассеянностью, тревожностью, неврозами и неврозоподобными состояниями, депрессией, психосоматическими расстройствами и другими недугами, которые снижают качестве жизни.&nbsp;Дает рекомендации и расшифровывает снимки магнитно-резонансной томографии и компьютерной томографии.</p>
<p>Член российской остеопатической ассоциации (РОсА). Член Международной ассоциации школьных психологов (ISPA). Член корреспондент Международной Академии Наук экологии и безопасности жизнедеятельности, ассоциированная с Департаментом Общественной Информации ООН и Экономическим и Социальным Советом ООН. Член Союза Реабилитологов Российской Федерации.</p>
<p>Владеет методами:</p>
<p>1. Паравертебральных внутримышечных инъекций обезбаливающими и восстанавливающими лекарственными препаратами;</p>
<p>2. PRP терапии - введение собственной плазмы пациента, обогащенной трамбоцитами, для ускорени регенерации (восстановления) ткани;</p>
<p>3. Кинезио-тейпирования - наложение лимфодренажа ткани, фиксирование тейпов, также помогает избегать травматизации перед спортивными мероприятиями, играми и увлечениями.</p>','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '1','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000362','id_resource' => '9444','uri' => 'vrachi/mamchur-tatyana-ivanovna','surname' => 'Мамчур','name' => 'Татьяна','middlename' => 'Ивановна','fullname' => 'Мамчур Татьяна Ивановна','photo' => 'mamchur-tatyana-ivanovna0.jpg','photo_type' => 'jpg','photos' => NULL,'holiday' => '1','rating' => '99','rating5' => '0','comments' => '19','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '1980','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>1980 — Кыргызская государственная медицинская академия им. И. К. Ахунбаева, «Педиатрия»;</p></li>
<li>1981 — КГМИ, институт Акушерства и педиатрии , интернатура по специальности «Детская неврология»;</p></li>
<li>1983 — ЦОЛИУВ (Москва), «Психиатрия детского возраста»;</p></li>
<li>1984 — Кыргызская государственная медицинская академия им. И. К. Ахунбаева, ординатура «Нервные болезни»;</p></li>
<li>2001 — Оренбургский государственный медицинский университет, «Неврология»;</p></li>
<li>2012 — Российский университет дружбы народов им. П. Лумумбы (РУДН), «Неврология»;</p></li>
<li>2017 — Российская медицинская академия последипломного образования (РМАПО), «Неврология»;</p></li>
<li>2019 — Кыргызский государственный медицинский институт переподготовки и повышения квалификации, «Иглорефлексотерапия».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Мамчур Татьяна Ивановна - [[*ratesCount]] | Невролог, Рефлексотерапевт | [[!+unit_seoName]] - Ист Клиник','description' => 'Мамчур Татьяна Ивановна – невролог, рефлексотерапевт. Принимает взрослых и детей с головными болями, головокружениями, вегетососудистой дистонией, эпилепсией, невралгией, неврозами, остеохондрозом, склерозом, атеросклерозом, межпозвоночными грыжами, и другими заболеваниями нервной системы.','introtext' => '','description_full' => '<p>Мамчур Татьяна Ивановна &ndash; невролог, рефлексотерапевт. Более 35 лет специализируется на неврологии.</p>
<p>Принимает взрослых и детей с головными болями, головокружениями, вегетососудистой дистонией, эпилепсией, невралгией, неврозами, остеохондрозом, склерозом, атеросклерозом, межпозвоночными грыжами, и другими заболеваниями нервной системы.</p>
<p>В лечении использует&nbsp;комплексные методы: рефлексотерапию, массаж, диагностику по&nbsp;Фоллю,&nbsp;гомеопатию,&nbsp;фитотерапию, ДЕНАС-терапию.&nbsp;</p>','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000363','id_resource' => '9449','uri' => 'vrachi/hadikov-ioann-vladimirovich','surname' => 'Хадиков','name' => 'Иоанн','middlename' => 'Владимирович','fullname' => 'Хадиков Иоанн Владимирович','photo' => 'hadikov-ioann-vladimirovich.png','photo_type' => 'png','photos' => '{"120x120": ["assets/resourceimages/9449/_120x120/Chadikov1_120x120.webp"], "232x269": ["assets/resourceimages/9449/_232x269/Chadikov1_232x269.webp"], "576x576": ["assets/resourceimages/9449/_576x576/Chadikov1_576x576.webp"]}','holiday' => '0','rating' => '98','rating5' => '4.8','comments' => '22','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2016','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
</p></li>
<li>2016 — Саратовский государственный медицинский университет им. В. И. Разумовского, «Педиатрия»;</p></li>
<li>2017 — Саратовский государственный медицинский университет им. В. И. Разумовского, интернатура по сециальности «Неврология»;</p></li>
<li>2017 — Ставропольский государственный медицинский университет, «Мануальная терапия»;</p></li>
<li>2018 — Международная академия экспертизы и оценки, «Остеопатия».</p></li>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Хадиков Иоанн Владимирович - [[*ratesCount]] | Остеопат, Мануальный терапевт | [[!+unit_seoName]] - Ист Клиник','description' => 'Хадиков Иоанн Владимирович – остеопат, мануальный терапевт. Принимает взрослых и детей. Проводит диагностику и лечение заболеваний, связанных с опорно-двигательной системой, работой внутренних органов, психосоматических расстройств и нарушением энергетического обмена. Занимается коррекцией и лечением при беременности и восстановлением после родов. Помогает реабилитироваться пациентам после травм, переломов и операций.','introtext' => '','description_full' => '<p>Хадиков Иоанн Владимирович &ndash; остеопат, мануальный терапевт. Принимает взрослых и детей. Проводит диагностику и лечение заболеваний, связанных с опорно-двигательной системой, работой внутренних органов, психосоматических расстройств и нарушением энергетического обмена. Занимается коррекцией и лечением при беременности и восстановлением после родов. Помогает реабилитироваться пациентам после травм, переломов и операций.</p>
<p>Специализируется на лечении заболеваний костной структуры (остеопороз), связочного аппарата (тендопереостопатия, тенденит), боли в позвоночнике и спине, области суставов, суставных заболеваний (артрит артроз), боли мышечной системы, гипер и гипотонус, грыж межпозвоночных дисков, сколиотической болезни и нарушения осанки.</p>
<p>Также помогает пациентам с головными болями, головокружениями (вертебро-базилярная недостаточность, вегетососудистая дистония, мигрень, головная боль напряжения), нарушениями сна (эмоциональное расстройство), психосоматическими расстройствами (депрессивные состояния).</p>','age_from' => '13','age_to' => '27','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000368','id_resource' => '9466','uri' => 'vrachi/novikova-anna-valentinovna','surname' => 'Новикова','name' => 'Анна','middlename' => 'Валентиновна','fullname' => 'Новикова Анна Валентиновна','photo' => 'novikova-anna-valentinovna.png','photo_type' => 'png','photos' => NULL,'holiday' => '1','rating' => '100','rating5' => '0','comments' => '10','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '1995','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>1995 — Российский Государственный Медицинский Университет, «Педиатрия»;</p></li>
<li>1997 — клиническая ординатура на кафедре Детской неврологии РГМУ;</p></li>
<li>1996 — курсы по клинической ЭЭГ;</p></li>
<li>2006, 2012, 2017 — сертификационные курсы по специальности «Детская неврология».</p></li>
</ul>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Новикова Анна Валентиновна - [[*ratesCount]] | Детский невролог | [[!+unit_seoName]] - Ист Клиник','description' => 'Новикова Анна Валентиновна – детский невролог. Принимает детей с 1 месяца.Основные направления в работе: диагностика и лечение неврологической патологии детей первого года жизни, поведенческие, психосоматические расстройства у детей.','introtext' => '','description_full' => '<p>Новикова Анна Валентиновна &ndash; детский невролог. Специализируется на детской неврологии 25 лет. С 1997 по 2007 годы работала врачом неврологом в ГКДЦ по специфической иммунопрофилактике, где консультировала детей с патологией нервной системы с целью грамотной и успешной вакцинопрофилактики.</p>
<p>Основные направления в работе: диагностика и лечение неврологической патологии детей первого года жизни, поведенческие, психосоматические расстройства у детей. В работе использую как аллопатическую терапию, так и гомеопатию.</p>
<p>Анна Валентиновна хорошо чувствует и знает маленьких пациентов и находит контакт с их родителями. Проводит профилактические приемы. Принимает детей с морфофункциональной незрелостью, недоношенностью, с задержкой психоречевого двигательного развития, с ММД (минимальные мозговые дисфункции) и СДВГ (синдром дефицита внимания и гиперактивности).&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000376','id_resource' => '9528','uri' => 'vrachi/egorov-vladimir-anatolevich','surname' => 'Егоров','name' => 'Владимир','middlename' => 'Анатольевич','fullname' => 'Егоров Владимир Анатольевич','photo' => 'egorov-vladimir-anatolevich-.jpg','photo_type' => 'jpg','photos' => NULL,'holiday' => '1','rating' => '100','rating5' => '0','comments' => '10','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '1983','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>1983 — ГУЗМ Московское медицинское училище N17, «Сестринское дело» (с углубленным изучением классического массажа);</p></li>
<li>2019 — ОБПОУ Курский базовый медицинский колледж, диплом профессиональной переподготовки «Медицинский массаж» ;</p></li>
<li>2019 — ОБПОУ Курский базовый медицинский колледж, сертификат  специалиста «Медицинский массаж».</p></li>
</ul>
<h3>Участник всероссийских конферений</h3>
<li>2006 — IV Всеросийский научный форум, конференция «Актуальные проблемы массажа в системе
медицинской реабилитации»;</p></li>
<li>2007 — Общероссийская выставка «Здравоохранение 2007», конференция «Современные методики массажа в сфере
медицинской реабилитации».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Егоров Владимир Анатольевич - [[*ratesCount]] | Массажист | [[!+unit_seoName]] - Ист Клиник','description' => 'Егоров Владимир Анатольевич более 10 лет специализируется на медицинском массаже. Для комплексного лечения заболеваний опорно-двигательного аппарата, сердечно-сосудистой системы, невралгий, радикулитов и других заболеваний использует классические методики медицинского массажа.','introtext' => '','description_full' => '<p>Егоров Владимир Анатольевич более 10 лет специализируется на медицинском массаже. <span data-contrast="auto">С 1983 по 1987 годы работал фельдшером в бригаде скорой помощи. Участвовал во всероссийских конференциях по актуальным проблемам массажа в системе медицинской реабилитации. Работал массажистом профессионального футбольного клуба федерального значения.</span></p>
<p><span data-contrast="auto">Для комплексного лечения заболеваний опорно-двигательного аппарата, сердечно-сосудистой системы, невралгий, радикулитов и других заболеваний использует классические методики медицинского массажа.</span><span data-ccp-props="{&quot;201341983&quot;:0,&quot;335559739&quot;:200,&quot;335559740&quot;:240}">&nbsp;</span></p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000392','id_resource' => '9591','uri' => 'vrachi/nurbaeva-malika-alikovna','surname' => 'Нурбаева','name' => 'Малика','middlename' => 'Аликовна','fullname' => 'Нурбаева Малика Аликовна','photo' => 'nurbaeva-malika-alikovna-.jpg','photo_type' => 'png','photos' => NULL,'holiday' => '0','rating' => '100','rating5' => '5','comments' => '12','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '2014','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>2014 — Ташкентская медицинская Академия, «Лечебное дело»;</p></li>
<li>2016 — НИИСГПЗ, ординатура по «Профпатологии»;</p></li>
<li>2017 — Ташкентский ИУВ, «Неврология», «Рефлексотерапия»;</p></li>
<li>2019 — SE «Tibet», «Основы иглотерапии», «Пульсовая диагностика», «Су-джок», «Косметологическая акупунктура».</p></li>
<li>2020 — Институт восточной медицины РУДН, «Внутрикостные блокады в лечении болевых синдромов»;</p></li>
<li>2021 — Plasmolifting (Разработчик методики доктор медицинских наук профессор Р. Р. Ахмеров), «Plasmolifting в неврологии и восстановительной медицине».</p></li>

','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Нурбаева Малика Аликовна - [[*ratesCount]] | Рефлексотерапевт, Гирудотерапевт | [[!+unit_seoName]] - Ист Клиник','description' => 'Нурбаева Малика Аликовна - невролог, рефлексотерапевт, гирудотерапевт. Принимает пациентов с болевыми синдромами. В лечении использует комплексные методы: рефлексотерапию, гирудотерапию и остеорефлексотерапию.','introtext' => '','description_full' => '<p><span data-contrast="auto">Нурбаева Малика Аликовна - невролог, рефлексотерапевт, гирудотерапевт. Более 4 лет специализируется на неврологии и&nbsp; рефлексотерапии</span><span data-contrast="auto">.</span><span data-contrast="auto">&nbsp;С 2016 года работала</span><span data-contrast="auto">&nbsp;</span><span data-contrast="auto">врачом-неврологом и </span><span data-contrast="auto">иглорефлексотерапевтом</span><span data-contrast="auto">&nbsp;</span><span data-contrast="auto">&nbsp;</span><span data-contrast="auto">в клинике профессиональных заболеваний</span><span data-contrast="auto">.</span><span data-ccp-props="{&quot;201341983&quot;:0,&quot;335559739&quot;:200,&quot;335559740&quot;:276}">&nbsp;</span></p>
<p><span data-contrast="auto">Принимает пациентов с болевыми синдромами. В лечении </span><span data-contrast="auto">использует комплексные методы: рефлексотерапию</span><span data-contrast="auto">, гирудотерапию и </span><span data-contrast="auto">остеорефлексотерапию</span><span data-contrast="auto">.&nbsp;</span><span data-ccp-props="{&quot;201341983&quot;:0,&quot;335559739&quot;:200,&quot;335559740&quot;:276}">&nbsp;</span></p>','age_from' => '12','age_to' => '20','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000415','id_resource' => '9667','uri' => 'vrachi/lobachyova-elena-anatolevna','surname' => 'Лобачёва','name' => 'Елена','middlename' => 'Анатольевна','fullname' => 'Лобачёва Елена Анатольевна','photo' => 'lobachyova-elena-anatolevna.png','photo_type' => 'png','photos' => NULL,'holiday' => '0','rating' => '100','rating5' => '5','comments' => '50','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '1998','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>1998 — Российский государственный медицинский университет, «Педиатрия»;</p></li>
<li>2000 — Российский государственный медицинский университет, ординатура по «Неврологии»;</p></li>
<li>2018 — НОЧУ ДПО «Российская академия медико-социальной реабилитации», «Рефлексотерапия».</p></li>
</ul>
<h3>Курсы повышения квалификации</h3>
<li>2000 — Школа клинической электроэнцефалографии и нейрофизиологии им. Л. А. Новиковой, курс специализации по «Клинической ЭЭГ»;</p></li>
<li>2004 — Учебно-методический центр ГУ НИИ неврологии РАМН, «Ультразвуковая диагностика ЦВЗ»;</p></li>
<li>2005, 2011 — ГОУ ДПО Российская медицинская академия последипломного образования «Росздрава», «Неврология»;</p></li>
<li>2007 — Присвоена первая квалификационная категория по специальности «Неврология»;</p></li>
<li>2015 —  НОЧУ ДОП «Российская академия медико-социальной реабилитации», «Фармакопунктура»;</p></li>
<li>2016 —  ФГБУ «Государственный научный центр Российской Федерации - Федеральный медицинский биофизический центр имени А. И. Бурназяна», «Неврология»;</p></li>
<li>2019 — Центр «Мастер Поинт», «Гирудотерапия».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Лобачёва Елена Анатольевна - [[*ratesCount]] | Невролог, Отоневролог | [[!+unit_seoName]] - Ист Клиник','description' => 'Лобачёва Елена Анатольевна - невролог, отоневролог, гирудотерапевт. Специализируется на лечении цереброваскулярных заболеваний и заболеваний вегетативной нервной системы, ЦНС с поражением опорно-двигательного аппарата.','introtext' => '','description_full' => '<p data-test-id="doctor-info-text__top">Лобачёва Елена Анатольевна - врач-невролог, отоневролог<span class="NormalTextRun  BCX0 SCXW121154590" data-ccp-parastyle="Standard">,&nbsp;</span><span class="SpellingError  BCX0 SCXW121154590" data-ccp-parastyle="Standard">гирудотерапевт.</span></p>
<p data-test-id="doctor-info-text__top"><span class="SpellingError  BCX0 SCXW121154590" data-ccp-parastyle="Standard">Специализируется на лечении </span>цереброваскулярных заболеваний и заболеваний вегетативной нервной системы, ЦНС с поражением опорно-двигательного аппарата, болевых синдромов при заболеваниях периферической нервной системы и опорно-двигательного аппарата. Владеет методиками функциональной диагностики в неврологии ЭЭГ, УЗДГ, ТКДГ, ДС БЦА.</p>
<p data-test-id="doctor-info-text__top">Принимает р<span class="TextRun SCXW34443093 BCX0" lang="RU-RU" xml:lang="RU-RU" data-contrast="auto"><span class="NormalTextRun SCXW34443093 BCX0" data-ccp-parastyle="Standard">егулярное </span><span class="ContextualSpellingAndGrammarError SCXW34443093 BCX0" data-ccp-parastyle="Standard">участие&nbsp; в</span><span class="NormalTextRun SCXW34443093 BCX0" data-ccp-parastyle="Standard">&nbsp;конгрессах, с</span></span><span class="TextRun SCXW34443093 BCX0" lang="RU-RU" xml:lang="RU-RU" data-contrast="auto"><span class="NormalTextRun SCXW34443093 BCX0" data-ccp-parastyle="Standard">еминарах, симпозиумах и школах невролога, посвященных диагностике и современным подходам в лечении неврологических больных. А также проходит повышение квалификации в семинарах по ТКМ.</span></span><span class="EOP SCXW34443093 BCX0" data-ccp-props="{}">&nbsp;</span></p>','age_from' => '18','age_to' => '100','skill' => 'expert1cat','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000417','id_resource' => '9701','uri' => 'vrachi/firsova-tatyana-borisovna','surname' => 'Фирсова','name' => 'Татьяна','middlename' => 'Борисовна','fullname' => 'Фирсова Татьяна Борисовна','photo' => 'firsova-tatyana-borisovna.jpg','photo_type' => 'jpg','photos' => '{"120x120": ["assets/resourceimages/9701/_120x120/Firsova1_120x120.webp", "assets/resourceimages/9701/_120x120/Firsova2_120x120.webp", "assets/resourceimages/9701/_120x120/Firsova3_120x120.webp", "assets/resourceimages/9701/_120x120/Firsova4_120x120.webp"], "232x269": ["assets/resourceimages/9701/_232x269/Firsova1_232x269.webp", "assets/resourceimages/9701/_232x269/Firsova2_232x269.webp", "assets/resourceimages/9701/_232x269/Firsova3_232x269.webp", "assets/resourceimages/9701/_232x269/Firsova4_232x269.webp"], "576x576": ["assets/resourceimages/9701/_576x576/Firsova1_576x576.webp", "assets/resourceimages/9701/_576x576/Firsova2_576x576.webp", "assets/resourceimages/9701/_576x576/Firsova3_576x576.webp", "assets/resourceimages/9701/_576x576/Firsova4_576x576.webp"]}','holiday' => '0','rating' => '93','rating5' => '4.9','comments' => '11','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2010','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul></p></li>
<li>1981 — МОПИ  им. Н. К. Крупской;</p></li>
<li>2012 — МГУ им. М. В. Ломоносова, «Практическая психология личности. Психолог»;</p></li>
<li>2012 — ИППЛ «Генезис Практик» (Москва), «Практическая психология личности»;</p></li>
<li>2014 — Московский институт психоанализа, аспирантура по общей психологии личности: «Психология личности и дифференциальная психология»;</p></li>
<li>2019 — Международный институт психотерапии (IPI, США), «Психоаналитическая парная и семейная психотерапия».</p></li>
</ul></p></li>
<h5>Курсы повышения квалификации</h5>
</p></li>
<li>2010 — Институт позитивных технологий и консалтинга, «Семейный психолог. Семейное консультирование»;</p></li>
<li>2016 — ЦССТ (Москва), «Теория системного семейного консультирования»;</p></li>
<li>2019 — Instituto Italiano di Micropsicoanalisi (Italy), «Микропсихоанализ: техника и клиническая практика», Стажировка.</p></li>
</ul>
<h5>Курсы и семинары</h5>
</p></li>
<li>2011 — МИП, «Психотерапия пациентов с избыточным весом»;</p></li>
<li>2012 — МИП, «Работа с травмой в психотерапии»;</p></li>
<li>2012 — МИП, «Психотерапия депрессии»;</p></li>
<li>2014 — ИППЛ, «Генезис Практик», (Москва), «Краткосрочная стратегическая терапия»;</p></li>
<li>2015 — ЦССТ (Москва) "Методы арт-терапии в психологическом консультировании семьи»;</p></li>
<li>2017 — МИП «Особенности родов и послеродового периода. Школа молодого родителя»;</p></li>
<li>2017 — МИП «Основы перинатальной психологии. Родительские компетенции»;</p></li>
<li>2019 — МИП «Перинатальная психология и психология родительства».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Фирсова Татьяна Борисовна - [[*ratesCount]] | Психолог, Семейный психолог | [[!+unit_seoName]] - Ист Клиник','description' => 'Фирсова Татьяна Борисовна - индивидуальный и системный семейный психолог. Работает с депрессией, социофобиями, тревогой, паническими атаками, трудностями в коммуникации, с возрастными кризисами, личностными, семейными и супружескими конфликтами, с кризисами детского развития и трудностями детско-родительских отношений.','introtext' => '','description_full' => '<p>Фирсова Татьяна Борисовна - индивидуальный и системный семейный психолог. В консультировании применяет методы системной&nbsp;семейной терапии,&nbsp;семейной терапии объектных отношений, краткосрочной стратегической&nbsp;терапии&nbsp;Дж. Нардонэ,&nbsp;когнитивной психологии,&nbsp;перинатальной психологии и психологии репродуктивной сферы.&nbsp;Стаж&nbsp; психологического консультирования 10 лет.</p>
<p>Татьяна Борисовна&nbsp;практикуется в сфере психологии женщин, мужчин, пары, семьи. Работает&nbsp;с депрессией,&nbsp;социофобиями,&nbsp;тревогой, паническими атаками,&nbsp;трудностями в коммуникации,&nbsp;с возрастными&nbsp;кризисами,&nbsp;личностными,&nbsp;семейными и супружескими конфликтами,&nbsp;с&nbsp;кризисами&nbsp;детского развития и&nbsp;трудностями&nbsp;детско-родительских отношений. Помогает пережить развод, измену, утрату близкого человека,&nbsp;перинатальные потери.&nbsp;Оказывает психологическое сопровождение беременности, а также психологическую помощь женщинам в ситуации аборта.</p>
<p>Действительный член Общероссийской Профессиональной Психотерапевтической Лиги.&nbsp;</p>','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10001344','id_resource' => '16405','uri' => 'vrachi/kurganova-natalya-yurevna','surname' => 'Курганова','name' => 'Наталья','middlename' => 'Юрьевна','fullname' => 'Курганова Наталья Юрьевна','photo' => '','photo_type' => NULL,'photos' => '{"120x120": ["assets/resourceimages/16405/_120x120/_кур_120x120.webp"], "232x269": ["assets/resourceimages/16405/_232x269/_кур_232x269.webp"], "576x576": ["assets/resourceimages/16405/_576x576/_кур_576x576.webp"]}','holiday' => '0','rating' => '0','rating5' => '0','comments' => '0','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2005','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul></p></li>
<li>2005 — Дагестанский государственный университет, «Психология».</p></li>
</ul></p></li>
<h5>Курсы повышения квалификации:</h5>
</p></li>
<li>2014 — Институт непрерывного профессионального образования, «Психологическое здоровье нации.
Психотехнические приемы современного психоанализа»;</p></li>
<li>2015 — ФГНУ «ИСиРАО», «Глубинная психология, психоанализ»;</p></li>
<li>2016 — Институт глубинной психологии и психоанализа, «Телесно-ориентированная терапия. Психотехника актера, поведение в конфликте. Групповая психология»;</p></li>
<li>2020 — Центр Стратегического консультирования и терапии, курс стратегической терапии, «Психология».</p></li>
</ul>
<br /></li>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Курганова Наталья Юрьевна - [[*ratesCount]] | Психолог | [[!+unit_seoName]] - Ист Клиник','description' => 'Курганова Наталья Юрьевна - врач психолог. Работает по методу краткосрочной стратегической терапии Джорджио Нардоне, использует методы когнитивно-поведенческой психотерапии, телесно-ориентированной терапии.','introtext' => '','description_full' => '<p>Курганова Наталья Юрьевна - врач психолог. Работает по методу краткосрочной стратегической терапии <span>Джорджио Нардоне</span>, использует методы когнитивно-поведенческой психотерапии, телесно-ориентированной терапии.</p>','age_from' => '0','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000426','id_resource' => '9788','uri' => 'vrachi/gubarev-viktor-aleksandrovich','surname' => 'Губарев','name' => 'Виктор','middlename' => 'Александрович','fullname' => 'Губарев Виктор Александрович','photo' => 'gubarev-viktor-aleksandrovich-.jpg','photo_type' => 'jpg','photos' => '{"120x120": ["assets/resourceimages/9788/_120x120/Gybarev1_3.0_120x120.webp", "assets/resourceimages/9788/_120x120/Gybarev2_120x120.webp", "assets/resourceimages/9788/_120x120/Gybarev3_120x120.webp", "assets/resourceimages/9788/_120x120/Gybarev4_2.0_120x120.webp"], "232x269": ["assets/resourceimages/9788/_232x269/Gybarev1_3.0_232x269.webp", "assets/resourceimages/9788/_232x269/Gybarev2_232x269.webp", "assets/resourceimages/9788/_232x269/Gybarev3_232x269.webp", "assets/resourceimages/9788/_232x269/Gybarev4_2.0_232x269.webp"], "576x576": ["assets/resourceimages/9788/_576x576/Gybarev1_3.0_576x576.webp", "assets/resourceimages/9788/_576x576/Gybarev2_576x576.webp", "assets/resourceimages/9788/_576x576/Gybarev3_576x576.webp", "assets/resourceimages/9788/_576x576/Gybarev4_2.0_576x576.webp"]}','holiday' => '0','rating' => '99','rating5' => '4.8','comments' => '30','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '1993','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul></p></li>
<li>1984 — Волгоградский государственный институт физической культуры и спорта, «Преподаватель физического воспитания»,  мастер спорта СССР;</p></li>
<li>1993 — Ставропольский государственный медицинский институт, «Лечебное дело»;</p></li>
<li>1995 — Ставропольская государственная медицинская академия, ординатура по «Неврологии».</p></li>
</ul>
<h5>Курсы повышения квалификации</h5>
</p></li>
<li>2009 — ФГОУ Кисловодский медицинский колледж Росздрава, «Медицинский массаж»;</p></li>
<li>2010 — ФГОУ Кисловодский медицинский колледж Росздрава, «Медицинский массаж и кинезиотерапия в вертеброневрологии»;</p></li>
<li>2020 — АНОДПО Медицинский университет инноваций и развития (Москва), «Неврология»;</p></li>
<li>2020 — АНОДПО Медицинский университет инноваций и развития (Москва), «Мануальная терапия»;</p></li>
<li>2020 — Национальная академия современных технологий, «Мануальная терапия»;</p></li>
<li>2022 — Медицинский университет инноваций и развития, «Лечение рассеянного склероза».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Губарев Виктор Александрович - [[*ratesCount]] | Невролог, Остеопат | [[!+unit_seoName]] - Ист Клиник','description' => 'Губарев Виктор Александрович – невролог, остеопат, вертебролог. Помогает пациентам в реабилитации после эндопротезирования тазобедренного и коленного суставов и спортивного травматизма. ','introtext' => '','description_full' => '<p>Губарев Виктор Александрович &ndash; кинезиотерапевт, невролог, остеопат, вертебролог. Специализируется на неврологии более 15 лет. В работе использует комплексные методы лечения: висцеральную мануальную терапию, остеопатию и мануальное мышечное тестирование обратной биологической связи с организмом через рефлекторную деятельность нервной системы.</p>
<p>Проводит биометрическую кинезиотерапию, краниосакральную диагностику и лечение дисфункций, циркуляцию ликвора, краниосакральную синхронизацию.</p>
<p>Помогает пациентам в реабилитации после эндопротезирования тазобедренного и коленного суставов и спортивного травматизма. Восстанавливает паттерн движений в походке, работает с мышечным тонусом.</p>
<p>Занимается выявлением и коррекцией психосоматических проявлений в организме в целом, таких триггеров, как негативные эмоции: страх, ненависть, злость, гнев, агрессия, стрессовая и дистрессовая перегрузка. Принимает пациентов с тревогами, депрессиями, проявлениями в виде тошноты, паническими проявлениями, нехваткой воздуха, изжогой, отрыжкой, &laquo;комом&raquo; в горле и т. д.</p>
<p>Проводит диагностику и лечение:</p>
<ul>
<li>вегетативной нервной системы (излишняя потливость, &laquo;приливы&raquo;);</li>
<li>дисфункций, компрессия нервных корешков, полового нерва, запирательного, седалищного и дисфункции грушевидной мышцы;</li>
</ul>
<ul>
<li>половых дисфункций с психосоматическим началом (андрология и гинекология);</li>
</ul>
<ul>
<li>грыжи пищеводного отверстия диафрагмы, проблемы пищеварения;</li>
<li>дисфункций ВНЧС (височно-нижнечелюстного сустава);</li>
<li>выправление атланто-окципитальной дисфункции;</li>
<li>висцеральных дисфункций внутренних органов.</li>
</ul>
<p>&nbsp;</p>','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000451','id_resource' => '9910','uri' => 'vrachi/rogov-ilya-anatolevich','surname' => 'Рогов','name' => 'Илья','middlename' => 'Анатольевич','fullname' => 'Рогов Илья Анатольевич','photo' => 'rogov-ilya-anatolevich.png','photo_type' => 'png','photos' => NULL,'holiday' => '0','rating' => '98','rating5' => '4.8','comments' => '34','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '1992','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>1992 — Московский медико-стоматологический институт им. Н. А. Семашко, «Лечебное дело»;</p></li>
<li>1993 — Центральная районная больница (Люберцы), интернатура по специальности «Хирургия»;</p></li>
<li>1995 — Российская медицинская академия последипломного образования, ординатура по специальности «Травматология»;</p></li>
<li>2009 — Российский государственный медицинский университет Росздрава, «Мануальная терапия».</p></li>
</ul>
<h3>Курсы повышения квалификации</h3>
<li>1999 — повышение квалификации по теме «Артроскопия коленного и плечевого суставов»;</p></li>
<li>2005 — ООО СпортМедСервис, «Применение экстракорпоральной ударно-волновой терапии в лечении заболеваний и травм опорно-двигательного аппарата»;</p></li>
<li>2013 — Российская медицинская академия последипломного образования, «Травматология и ортопедия»;</p></li>
<li>2016 — базовый курс по кинезиотейпированию «Kindmax»;</p></li>
<li>2016 — Regenlab, обучение методике «Аутологичная клеточная регенерация»;</p></li>
<li>2016 — мастер-класс «Plasmolifting» в неврологии и восстановительной медицине;</p></li>
<li>2018 — Государственный университет управления (Москва), «Организация здравоохранения и общественное здоровье»;</p></li>
<li>2020 — НП Лига содействию развития подиатрии, семинары на тему: «Подиатрия», «Ортезирование стоп системой Formthotics».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Рогов Илья Анатольевич - [[*ratesCount]] | Тавматолог, Ортопед | [[!+unit_seoName]] - Ист Клиник','description' => 'Рогов Илья Анатольевич – травматолог-ортопед. Занимается диагностикой и лечением переломов костей и повреждений суставов. В работе применяет консервативные и оперативные методы лечения.','introtext' => '','description_full' => '<p>Рогов Илья Анатольевич &ndash; травматолог-ортопед. Врач высшей категории. Занимается диагностикой и лечением переломов костей и повреждений суставов. В работе применяет консервативные и оперативные методы лечения.</p>
<p>Проводит внутрисуставные инъекции (в том числе и РRP), паравертебральные блокады, артроскопию коленного сустава. Владеет техникой кинезиотейпирования, ударно-волновой и мануальной терапиями.</p>','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000464','id_resource' => '9951','uri' => 'vrachi/samojlova-natalya-valentinovna','surname' => 'Самойлова','name' => 'Наталья','middlename' => 'Валентиновна','fullname' => 'Самойлова Наталья Валентиновна','photo' => 'samojlova-natalya-valentinovna-.jpg','photo_type' => 'png','photos' => '{"120x120": ["assets/resourceimages/9951/_120x120/Samoylova_1_2.0_120x120.webp", "assets/resourceimages/9951/_120x120/Samoylova2_120x120.webp", "assets/resourceimages/9951/_120x120/Samoylova3_120x120.webp", "assets/resourceimages/9951/_120x120/Samoylova4_120x120.webp"], "232x269": ["assets/resourceimages/9951/_232x269/Samoylova_1_2.0_232x269.webp", "assets/resourceimages/9951/_232x269/Samoylova2_232x269.webp", "assets/resourceimages/9951/_232x269/Samoylova3_232x269.webp", "assets/resourceimages/9951/_232x269/Samoylova4_232x269.webp"], "576x576": ["assets/resourceimages/9951/_576x576/Samoylova_1_2.0_576x576.webp", "assets/resourceimages/9951/_576x576/Samoylova2_576x576.webp", "assets/resourceimages/9951/_576x576/Samoylova3_576x576.webp", "assets/resourceimages/9951/_576x576/Samoylova4_576x576.webp"]}','holiday' => '0','rating' => '100','rating5' => '5','comments' => '60','show_comments' => '1','child' => '1','pregnant' => '0','diseases' => NULL,'experience' => '1992','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
</p></li>
<li>1992 — Московская  медицинская академия имени И. М. Сеченова, «Лечебное дело»;</p></li>
<li>1994 — ЦНИИПП, клиническая ординатура по травматологи-ортопедии;</p></li>
<li>1994, 2008 — ЦИУВ (Москва), «Неврология»;</p></li>
<li>2000 — Аспирантура по травматологии-ортопедии, диссертация на тему «Комплексная реабилитация пациентов с травматическим повреждением периферических нервов верхней конечности», присуждена степень кандидата медицинских наук;</p></li>
<li>2001 — Повышение квалификации «Организационно-методические основы медико-социальной экспертизы и реабилитации инвалидов»;</p></li>
<li>2001, 2005, 2010, 2015, 2020 — Повышение квалификации  по травматологии-ортопедии (Москва);</p></li>
<li>2002, 2009, 2019 — ЦИУВ (Москва), «Рефлексотерапия»;</p></li>
<li>2007 — Стажировка в Берлине в отделении терапии боли Campus Benjamin Franklin Pain Center Charite Klinik;</p></li>
<li>2014 — Регулярные стажировки в китайском центре Синофарм по методам ТКМ;</p></li>
<li>2018 — АТТ (Москва), базовый курс по «Кинезиотейпированию».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Самойлова Наталья Валентиновна - [[*ratesCount]] | Травматолог, Ортопед | [[!+unit_seoName]] - Ист Клиник','description' => 'Самойлова Наталья Валентиновна - травматолог-ортопед, рефлексотерапевт, реабилитолог. Специализируется на лечении заболеваний опорно-двигательного аппарата у детей и взрослых, болевых синдромов различной локализации, повреждений периферических нервов конечностей, реабилитации.','introtext' => '','description_full' => '<p>Самойлова Наталья Валентиновна - травматолог-ортопед, невролог, реабилитолог, детский невролог, детский вертебролог, детский вертеброневролог. Врач высшей категории, кандидат медицинских наук, прием детей от 5 лет.</p>
<p>Последние 16 лет&nbsp;работала старшим&nbsp;научным&nbsp;сотрудником, врачом&nbsp;травматологом-ортопедом&nbsp;отделения терапии болевых синдромов в Российском научном&nbsp; центре хирургии имени Б. В. Петровского. В 2007 году проходила стажировку в Берлине в&nbsp;Campus&nbsp;Benjamin&nbsp;Franklin&nbsp;Pain&nbsp;Center&nbsp;Charite&nbsp;Klinik.</p>
<p>Специализируется на лечении заболеваний опорно-двигательного аппарата у детей и взрослых, болевых синдромов различной локализации, повреждений периферических нервов конечностей, реабилитации. В лечении использует различные виды блокад, фармакопунктуру, рефлексотерапию и кинезиотейпирование.&nbsp;</p>','age_from' => '5','age_to' => '100','skill' => 'expert','is_primary_care' => '1','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000501','id_resource' => '10057','uri' => 'vrachi/kuzmenko-dmitrij-vladimirovich','surname' => 'Кузьменко','name' => 'Дмитрий','middlename' => 'Владимирович','fullname' => 'Кузьменко Дмитрий Владимирович','photo' => 'kuzmenko-dmitrij-vladimirovich.png','photo_type' => 'png','photos' => NULL,'holiday' => '1','rating' => '97','rating5' => '0','comments' => '19','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '2007','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>2007 — Донецкий национальный медицинский университет им. М. Горького, «Лечебное дело»;</p></li>
<li>2009 — Донецкий национальный медицинский университет им. М. Горького, интернатура по специальности «Ортопедия и травматология»;</p></li>
<li>2019 — Донецкий национальный медицинский университет им. М. Горького на кафедре Травматологии, ортопедии и медицины экстремальных состояний, аспирантура по специальности «Травматология».</p></li>
</ul>
<h3>Курсы повышения квалификации</h3>
<li>2014 — Донецкий национальный медицинский университет им. М. Горького, «Ортопедия и травматология»;</p></li>
<li>2015 — Первый Московский государственный медицинский университет имени И. М. Сеченова, «Ультразвуковая диагностика»;</p></li>
<li>2016 — Первый Московский государственный медицинский университет имени И. М. Сеченова, «Травматология и ортопедия», «Ультразвуковая диагностика»;</p></li>
<li>2017 — PRP-Lab, «PRP-терапия в травматологии и ортопедии»;</p></li>
<li>2017 — Образовательный центр высоких медицинских технологий «AMTEC», (Казань), «Артроскопическая хирургия коленного сустава»;</p></li>
<li>2017 — Российский университет дружбы народов, «Коррекция деформаций стоп системой ортезирования ФормТотикс»;</p></li>
<li>2018 — «Оптическая топография позвоночника DIERS Foremetric» (Москва);</p></li>
<li>2019 — Переподготовка по специальности «Организация общественного здоровья и здравоохранение» (Москва).</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Кузьменко Дмитрий Владимирович - [[*ratesCount]] | Травматолог, Ортопед | [[!+unit_seoName]] - Ист Клиник','description' => 'Кузьменко Дмитрий Владимирович – травматолог-ортопед. Более 10 лет специализируется на лечении опорно-двигательного аппарата. В практике использует все современные методы диагностики и лечения: УЗИ, МРТ, оптическую топографию позвоночника, внутрисуставные, околосуставные и паравертебральные блокады, PRP терапию, ACP-SVF терапию (введение стромально-васкулярной фракции в крупные суставы).','introtext' => '','description_full' => '<p>Кузьменко Дмитрий Владимирович &ndash; травматолог-ортопед. Более 10 лет специализируется на лечении опорно-двигательного аппарата.</p>
<p>В 2007 году закончил лечебный факультет Донецкого национального медицинского университета имени Максима Горького, прошел интернатуру по специальности&nbsp;<span data-contrast="auto">травматология&nbsp;и</span><span data-contrast="auto">&nbsp;ортопедия. Работал&nbsp;</span><span data-contrast="auto">врачом&nbsp;в футбольных клубах &laquo;Металлург&raquo; Донецк, ПФК &laquo;Титан&raquo;,&nbsp;</span><span data-contrast="auto">врачом&nbsp;травм пункта. В 2015 году поступил в аспирантуру на кафедру травматологии и ортопедии. Работал в Областной травматологической больнице города Донецка.</span></p>
<p>В практике<span data-contrast="auto">&nbsp;</span><span data-contrast="auto">использует все современные методы диагностики и лечения: УЗИ, МРТ, оптическую топографию позвоночника, внутрисуставные, околосуставные и </span>паравертебральные<span data-contrast="auto">&nbsp;блокады,&nbsp;</span><span data-contrast="auto">PRP</span><span data-contrast="auto">&nbsp;терапию,&nbsp;</span><span data-contrast="auto">ACP</span><span data-contrast="auto">-</span><span data-contrast="auto">SVF</span><span data-contrast="auto">&nbsp;терапию (введение&nbsp;</span><span data-contrast="auto">стромально-васкулярной фракции в крупные суставы). А также малоинвазивные вмешательства и ударно-волновую терапию. Проводит коррекцию деформаций стоп </span><span data-contrast="auto">ортезами</span><span data-contrast="auto">&nbsp;и стельками.&nbsp;</span><span data-ccp-props="{&quot;201341983&quot;:0,&quot;335559739&quot;:160,&quot;335559740&quot;:259}">&nbsp;</span></p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000503','id_resource' => '10122','uri' => 'vrachi/golczova-natalya-viktorovna','surname' => 'Гольцова','name' => 'Наталья','middlename' => 'Викторовна','fullname' => 'Гольцова Наталья Викторовна','photo' => 'golczova-natalya-viktorovna.jpg','photo_type' => 'jpg','photos' => NULL,'holiday' => '1','rating' => '100','rating5' => '0','comments' => '9','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2003','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>2003 — Тюменская государственная медицинская академия, «Педиатр»;</p></li>
<li>2005 — РГМУ, клиническая ординатура по «Неврологии»;</p></li>
<li>2009 — РГМУ, аспирантура на кафедре неврологии и нейрохирургии, защита по двум специальностям «Неврология», «Педиатрия»;</p></li>
<li>2011 — Санкт-Петербургский государственный педиатрический медицинский университет, сертификационный курс «Неонатальная неврология»;</p></li>
<li>2012, 2013, 2014, 2015 — клиника Аннаштифт (Ганновер, Германия), сертификационный семинар «Остеопатия в педиатрии»;</p></li>
<li>2018 — Санкт-Петербургский государственный педиатрический медицинский университет, курс повышения квалификации «Неврология детского возраста, неонатальная неврология».</p></li>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Гольцова Наталья Викторовна - [[*ratesCount]] | Невролог, Детский невролог | [[!+unit_seoName]] - Ист Клиник','description' => 'Гольцова Наталья Викторовна – врач-невролог. Более 15 лет специализируется на детской неврологии. Использует мультидисциплинарный подход к обследованию и лечению детей всех возрастов с различными неврологическими заболеваниями. Наибольший клинический интерес вызывают патологии, связанные с задержкой психоречевого развития. ','introtext' => '','description_full' => '<p>Гольцова Наталья Викторовна &ndash; врач-невролог. Более 15 лет специализируется на детской неврологии. С 2006 года работала детским неврологом отделения нейрореабилитации Научного Центра Здоровья Детей. Затем неврологом психоневрологического отделения ЦКБ Управделами Президента, а также заведующей детским психоневрологическим отделением Университетской клинической больницы им. И. М. Сеченова.</p>
<p>В 2009 году защитила кандидатскую диссертацию на тему: &laquo;Особенности клинической картины и эндокринного статуса у подростков с рассеянным склерозом&raquo;.</p>
<p>Наталья Викторовна использует мультидисциплинарный подход к обследованию и лечению детей всех возрастов с различными неврологическими заболеваниями. Наибольший клинический интерес вызывают патологии, связанные с задержкой психоречевого развития.&nbsp;</p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000504','id_resource' => '10103','uri' => 'vrachi/usmanov-dmitrij-romanovich','surname' => 'Усманов','name' => 'Дмитрий','middlename' => 'Романович','fullname' => 'Усманов Дмитрий Романович','photo' => 'usmanov-dmitrij-romanovich.jpg','photo_type' => 'jpg','photos' => NULL,'holiday' => '0','rating' => '98','rating5' => '4.6','comments' => '6','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '1997','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>1997 — Военно-медицинская академия им. С. М. Кирова (Санкт-Петербург), «Лечебное дело»;</p></li>
<li>1999 — Военно-медицинская академия им. С. М. Кирова (Санкт-Петербург), интернатура по «Общей хирургии»;</p></li>
<li>2004 — Научно-исследовательский институт скорой помощи им. И. И. Джанелидзе (Санкт-Петербург), ординатура по «Общей хирургии»;</p></li>
<li>2005 — ГОУВПО СПб ГМА им. И. И. Сеченова, «Гомеопатия»;</p></li>
<li>2009 — Санкт-Петербургская государственная педиатрическая медицинская академия, «Мануальная терапия»;</p></li>
<li>2009 - 2019 — семинары на базе Бомбейской гомеопатической Академии «Theothersong»;</p></li>
<li>2010 — Институт Клинической Прикладной кинезиологии (Санкт-Петербург), «Прикладной кинезиолог»;</p></li>
<li>2012 — Институт Аплейджера (США), «Остеопатия» (уровень КСТ 1);</p></li>
<li>2020 — Санкт-Петербургская государственная педиатрическая медицинская академия, «Мануальная терапия».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Усманов Дмитрий Романович - [[*ratesCount]] | Остеопат, Мануальный терапевт | [[!+unit_seoName]] - Ист Клиник','description' => 'Усманов Дмитрий Романович – остеопат, мануальный терапевт, кинезиолог. В диагностике и лечении заболеваний различного профиля использует прикладную кинезиологию, остеопатические и мануальные техники, а также классическую гомеоптию.','introtext' => '','description_full' => '<p>Усманов Дмитрий Романович &ndash; остеопат, мануальный терапевт, кинезиолог. С 2009 года специализируется на мануальной терапии, с 2010 на остеопатии и кинезиологии.</p>
<p>В диагностике и лечении заболеваний различного профиля использует прикладную кинезиологию, остеопатические и мануальные техники, а также классическую гомеоптию.</p>
<p>Как остеопат и кинезиолог принимает беременных и детей от 0 лет.</p>','age_from' => '60','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000512','id_resource' => '10193','uri' => 'vrachi/gubarev-anton-alekseevich','surname' => 'Губарев','name' => 'Антон','middlename' => 'Алексеевич','fullname' => 'Губарев Антон Алексеевич','photo' => 'gubarev-anton-alekseevich.png','photo_type' => 'png','photos' => NULL,'holiday' => '1','rating' => '100','rating5' => '4.8','comments' => '2','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '2009','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>2009 — Ивановская государственная медицинская академия, «Педиатрия»;</p></li>
<li>2010 — Ивановская государственная медицинская академия, интернатура по специальности «Неврология»;</p></li>
<li>2015 — Ивановская государственная медицинская академия, «Неврология».</p></li>
</ul>
<h3>Курсы повышения квалификации</h3>
<li>2011 — «Новые методы диагностики и лечения инсульта»;</p></li>
<li>2015 — «Острые нарушения мозгового кровообращения»;</p></li>
<li>2016 — «Физиотерапия»;</p></li>
<li>2016 — «Иглорефлексотерапия»;</p></li>
<li>2020 — «Мануальная терапия»;</p></li>
<li>2020 — «Кинезиология», (1-2 цикл).</p></li>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Губарев Антон Алексеевич - [[*ratesCount]] | Невролог, Рефлексотерапевт | [[!+unit_seoName]] - Ист Клиник','description' => 'Губарев Антон Алексеевич – невролог, рефлексотерапевт. Использует комплексные методы диагностики и лечения: визуальную диагностику, мануальное мышечное тестирование, неврологический осмотр.','introtext' => '','description_full' => '<p>Губарев Антон Алексеевич &ndash; врач-невролог, рефлексотерапевт. Более 10 лет специализируется на неврологии.</p>
<p>Занимается диагностикой, профилактикой и лечением головокружений, невралгий, неврозов, остеохондроза, склероза, атеросклероза, вегетососудистой дистонии, межпозвоночных грыж, головных болей и других заболеваний нервной системы.</p>
<p>Использует комплексные методы диагностики и лечения: визуальную диагностику, мануальное мышечное тестирование, неврологический осмотр. А также проводит постановку блокад, рефлексотерапию и постизометрическую релаксацию.</p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000524','id_resource' => '10272','uri' => 'vrachi/eliseev-aleksej-albertovich','surname' => 'Елисеев','name' => 'Алексей','middlename' => 'Альбертович','fullname' => 'Елисеев Алексей Альбертович','photo' => 'eliseev-aleksej-albertovich.png','photo_type' => 'png','photos' => '{"120x120": ["assets/resourceimages/10272/_120x120/Eliseev1_120x120.webp", "assets/resourceimages/10272/_120x120/Eliseev2_120x120.webp", "assets/resourceimages/10272/_120x120/Eliseev3_120x120.webp", "assets/resourceimages/10272/_120x120/Eliseev4_120x120.webp"], "232x269": ["assets/resourceimages/10272/_232x269/Eliseev1_232x269.webp", "assets/resourceimages/10272/_232x269/Eliseev2_232x269.webp", "assets/resourceimages/10272/_232x269/Eliseev3_232x269.webp", "assets/resourceimages/10272/_232x269/Eliseev4_232x269.webp"], "576x576": ["assets/resourceimages/10272/_576x576/Eliseev1_576x576.webp", "assets/resourceimages/10272/_576x576/Eliseev2_576x576.webp", "assets/resourceimages/10272/_576x576/Eliseev3_576x576.webp", "assets/resourceimages/10272/_576x576/Eliseev4_576x576.webp"]}','holiday' => '0','rating' => '96','rating5' => '4.7','comments' => '19','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2000','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul></p></li>
<li>1989 — Российский национальный исследовательский медицинский университет имени Н. И. Пирогова, «Лечебное дело»;</p></li>
<li>1990 — Российский национальный исследовательский медицинский университет имени Н. И. Пирогова, интернатура по «Оториноларингологии»;</p></li>
<li>2009 — Государственный институт усовершенствования врачей МО РФ, интернатура по «Неврологии»;</p></li>
<li>2012 — Русская высшая школа остеопатической медицины, «Остеопатия»;</p></li>
<li>2012 — Русская высшая школа остеопатической медицины, «Мануальная терапия».</p></li>
</ul></p></li>
<h5>Курсы повышения квалификации</h5>
</p></li>
<li>2008 — Институт восстановительной медицины, «Постизометрическая релаксация мышц»;</p></li>
<li>2009 — Оздоровительный центр «Предтеча», «Абдоминальный массаж» (висцеральная терапия);</p></li>
<li>2009 — Институт восстановительной медицины, «Медицинский массаж»;</p></li>
<li>2015 — Северо-Западный государственный медицинский университет имени И. И. Мечникова, «Остеопатия»;</p></li>
<li>2019 — Школа остеопатии И. А. Литвинова «Пилот»; Школа Дж. Джилоса (США) «Дыхание жизни».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Елисеев Алексей Альбертович - [[*ratesCount]] | Остеопат, Висцеральный терапевт | [[!+unit_seoName]] - Ист Клиник','description' => 'Елисеев Алексей Альбертович – врач-остеопат,  висцеральный терапевт. Специализируется на диагностике и лечении болевых синдромов в шейном, грудном, поясничном отделах позвоночника, в грудной клетке, плечевом поясе и в области таза.','introtext' => '','description_full' => '<p>Елисеев Алексей Альбертович &ndash; врач-остеопат,&nbsp;висцеральный терапевт. Работает с детьми и беременными женщинами. Более 11 лет специализируется на остеопатии. Проводит диагностику и лечение болевых синдромов в шейном, грудном, поясничном отделах позвоночника, в грудной клетке, плечевом поясе и в области таза.</p>
<p>В работе применяет комплексный подход: остеопатию, мягкие мануальные техники, висцеральный метод. Принимает пациентов с болями в суставах рук, ног, стопе и в области пятки, с онемениями или отечностью конечностей, болевыми синдромами после операций и травмами различной давности. А также с дисфункциями внутренних органов (с болевым синдромом и без него).</p>
<p>Член Российской остеопатической ассоциации. Член реестра сертифицированных врачей остеопатов. Член Ассоциации висцеральной терапии.</p>','age_from' => '25','age_to' => '30','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000533','id_resource' => '10349','uri' => 'vrachi/kayasheva-kristina-sergeevna','surname' => 'Каяшева','name' => 'Кристина','middlename' => 'Сергеевна','fullname' => 'Каяшева Кристина Сергеевна','photo' => 'kayasheva-kristina-sergeevna.png','photo_type' => 'png','photos' => NULL,'holiday' => '0','rating' => '98','rating5' => '0','comments' => '4','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2004','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>2004 — Самарский государственный медицинский университет (КМИ им.
Д. И. Ульянова), «Лечебное дело»;</p></li>
<li>2006 — Самарский государственный медицинский университет (КМИ им.
Д. И. Ульянова), клиническая ординатура по «Неврологии»;</p></li>
<li>2016 — Медицинский университет «Реавиз», повышение квалификации по специальности «Неврология»;</p></li>
<li>2017 — ИПО СамГМУ, «Функциональная диагностика»;</p></li>
<li>2017 — ИПО СамГМУ, «Клиническая эпилептология»;</p></li>
<li>2021 — Самарский государственный медицинский университет (КМИ им.
Д. И. Ульянова), «Организация здравоохранения».</p></li>
</ul>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Каяшева Кристина Сергеевна - [[*ratesCount]] | Невролог, Вертебролог | [[!+unit_seoName]] - Ист Клиник','description' => 'Каяшева Кристина Сергеевна – врач-невролог, вертебролог, реабилитолог. В лечении пациентов использует комплексные методы: ботулинотерапию, кинезиотейпирование, блокады. Владеет нейрофизиологическими методами диагностики в неврологии (ЭЭГ, ЭМГ, Эхо-ЭГ).','introtext' => '','description_full' => '<p>Каяшева Кристина Сергеевна &ndash; врач-невролог, вертебролог, реабилитолог. Специализируется на неврологии более 15 лет. Занимается диагностикой и лечением болезней нервной системы, таких как: атеросклероз, склероз, невралгии, неврозы, эпилепсия, головные боли различного генеза, головокружения, мигрени и т.д.</p>
<p>С 2006 по 2008 годы работала врачом-нейрохирургом в Самарской клинической больнице. С 2008 года врач-невролог, а в последующем и заведующий отделением крупной Самарской поликлиники. В лечении пациентов использует комплексные методы: ботулинотерапию, кинезиотейпирование, блокады.</p>
<p>Владеет нейрофизиологическими методами диагностики в неврологии (ЭЭГ, ЭМГ, Эхо-ЭГ). Принимает пациентов с сильными болевыми синдромами.</p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000538','id_resource' => '10370','uri' => 'vrachi/volkoviczkaya-alla-dmitrievna','surname' => 'Волковицкая','name' => 'Алла','middlename' => 'Дмитриевна','fullname' => 'Волковицкая Алла Дмитриевна','photo' => 'volkoviczkaya-alla-dmitrievna.png','photo_type' => 'png','photos' => '{"120x120": ["site/i/doc/_120x120/volkoviczkaya-alla-dmitrievna_120x120.webp"], "232x269": ["site/i/doc/_232x269/volkoviczkaya-alla-dmitrievna_232x269.webp"], "576x576": ["site/i/doc/_576x576/volkoviczkaya-alla-dmitrievna_576x576.webp"]}','holiday' => '1','rating' => '100','rating5' => '0','comments' => '5','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '1995','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>1995 — Российский Государственной медицинский Университет имени Н. И. Пирогова, «Лечебное дело»;</p></li>
<li>1995 — РГМУ. (кафедра пропедевтики), интернатура по «Терапии»;</p></li>
<li>1996 — МГИУВ, «Неврология»;</p></li>
<li>1997 — Российская медицинская академия последипломного образования МЗ РФ (кафедра рефлексотерапии и мануальной терапии), ординатура по «Рефлексотерапии»;</p></li>
<li>1998 — ФУВ МОНИКИ, «Неврология»;</p></li>
<li>1998 — Российская медицинская академия последипломного образования МЗ РФ, «Неврология»;</p></li>
<li>2000 — РМАПО, «Мануальная терапия»;</p></li>
<li>2004 — Российская медицинская академия последипломного образования МЗ РФ, аспирантура по «Неврологии»;</p></li>
<li>2010 — ЧГМУ, интернатура по «Дерматовенерологии»;</p></li>
<li>2010 — ЧГМУ, «Косметология»;</p></li>
<li>2019 — Первый Московский государственный медицинский университет имени И. И. Сеченова, «Физиотерапия».</p></li>
</ul>
<h3>Курсы повышения квалификации</h3>
<li>2008 — Российская медицинская академия последипломного образования Росздрава, «Лечебная физкультура и спортивная медицина»;</p></li>
<li>2011 — Государственный научный центр лазерной медицины Федерального медико-биологического агентства, «Лазерная рефлексотерапия»;</p></li>
<li>2013 — Московский научно-практический центр медицинской реабилитации, восстановительной и спортивной медицины Департамента здравоохранения города Москвы, «Медицинская реабилитация»;</p></li>
<li>2015 — Российский национальный исследовательский медицинский университет имени Н. И. Пирогова, «Рефлексотерапия»;</p></li>
<li>2015 — Российский национальный исследовательский медицинский университет имени Н. И. Пирогова, «Дерматовенерология»;</p></li>
<li>2017 — Международный Университет Восстановительной медицины, «Мануальная терапия»;</p></li>
<li>2019 — Международная академия экспертизы и оценки, «Рефлексотерапия»;</p></li>
<li>2019 — Международная академия экспертизы и оценки, «Мануальная терапия»;</p></li>
<li>2019 — Международная академия экспертизы и оценки, «Дерматовенерология»;</p></li>
<li>2019 — Международная академия экспертизы и оценки, «Косметология»;</p></li>
<li>2019 — Образовательный центр «Наутилус», «Трихология»;</p></li>
<li>2020 — «Гирудотерапия».</p></li>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Волковицкая Алла Дмитриевна - [[*ratesCount]] | Мануальный терапевт, Рефлексотерапевт | [[!+unit_seoName]] - Ист Клиник','description' => 'Волковицаая Алла Дмитриевна – мануальный терапевт, рефлексотерапевт. В работе использует комплексные методы лечения: остеопатические и мягкие мануальные техники, рефлексотерапию (иглотерапию, микроиглотерапию, лазеропунктуру, фармакопунктуру, гомеосиниатрию), а также авторские техники. Включает в программу реабилитации гирудотерапию, гомеопатию и аллопатию, при необходимости физиотерапию и тейпирование.','introtext' => '','description_full' => '<p>Волковицаая Алла Дмитриевна &ndash; мануальный терапевт, рефлексотерапевт. Более 20 лет специализируется на вертеброневрологии, ортопедоневрологии. Более 10 лет работала врачом-рефлексотерапевтом, мануальным терапевтом, дерматовенерологом в Московском научно-практическом центре профилактической и спортивной медицины при ГУЗМ.</p>
<p>В работе использует комплексные методы лечения: остеопатические и мягкие мануальные техники, рефлексотерапию (иглотерапию, микроиглотерапию, лазеропунктуру, фармакопунктуру, гомеосиниатрию), а также авторские техники. Включает в&nbsp;программу реабилитации&nbsp;гирудотерапию,&nbsp;гомеопатию&nbsp;и аллопатию, при необходимости физиотерапию и тейпирование.</p>
<p>Помогает разрабатывать индивидуальные курсы ЛФК. Больше 10 лет работает в эстетической медицине. Использует авторскую методику омоложения лица и тела &laquo;MultileVel&raquo;, современные техники инъекционного омоложения: все виды мезотерапии, биоревитализацию, биорепарацию, контурную пластику, нитевые техники. В уходовых процедурах и пилингах применяет высокоэффективные, профессиональные средства.&nbsp;</p>
<p>Добивается значимых результатов в программах снижения веса и коррекции тела. Имеет большой опыт в работе с выраженными болевыми синдромами.</p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000549','id_resource' => '10396','uri' => 'vrachi/ivanov-sergej-valerevich','surname' => 'Иванов','name' => 'Сергей','middlename' => 'Валерьевич','fullname' => 'Иванов Сергей Валерьевич','photo' => 'ivanov-sergej-valerevich.png','photo_type' => 'png','photos' => NULL,'holiday' => '0','rating' => '100','rating5' => '0','comments' => '2','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '1994','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>1994 — Тюменский государственный медицинский институт, «Лечебное дело»;</p></li>
<li>1997 — Институт нейрохирургии имени Бурденко, ординатура по «Нейрохирургии»;</p></li>
<li>2014 — Клиника Шарите (Берлин), «Детская нейрохирургия» (стажировка);</p></li>
<li>2018 — Клиника Нанури (Сеул), «Спинальная эндоскопия» (стажировка).</p></li>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Иванов Сергей Валерьевич - [[*ratesCount]] | Невролог, Вертебролог | [[!+unit_seoName]] - Ист Клиник','description' => 'Иванов Сергей Валерьевич – нейрохирург, невролог, вертебролог. В лечении пациентов использует методы минимально-инвазивной хирургии и последовательное восстановление функций позвоночника.','introtext' => '','description_full' => '<p>Иванов Сергей Валерьевич&nbsp;&ndash; нейрохирург, невролог, вертебролог. Более 20 лет специализируется по&nbsp;нейрохирургии. С 1997 по 2017 годы работал врачом-нейрохирургом в Тюмени и Тюменской области.</p>
<p>В лечении пациентов использует методы минимально-инвазивной хирургии и последовательное восстановление функций позвоночника. Проводит целевое устранение болевого вертеброгенного синдрома, блокады с помощью навигации.</p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000558','id_resource' => '10403','uri' => 'vrachi/panov-gleb-vasilevich','surname' => 'Панов','name' => 'Глеб','middlename' => 'Васильевич','fullname' => 'Панов Глеб Васильевич','photo' => 'panov-gleb-vasilevich.jpg','photo_type' => 'jpg','photos' => NULL,'holiday' => '1','rating' => '100','rating5' => '0','comments' => '1','show_comments' => '1','child' => '0','pregnant' => '0','diseases' => NULL,'experience' => '1995','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
<ul>
<li>1995 — Воронежская государственная медицинская академия им. Н. Н. Бурденко, «Педиатрия»;</p></li>
<li>1996 — Российская медицинская академия последипломного образования (РМАПО), интернатура по «Неврологии»;</p></li>
<li>2018 — Департамент здравоохранения города Москвы, присвоена высшая квалификационная категория по специальности «Неврология».</p></li>
</ul>
<h3>Курсы повышения квалификации</h3>
<li>2001 — Российский национальный исследовательский медицинский университет имени Н. И. Пирогова, «Неврология»;</p></li>
<li>2006 — Российский национальный исследовательский медицинский университет имени Н. И. Пирогова, «Неврология»;</p></li>
<li>2012 — Российская медицинская академия последипломного образования (РМАПО), «Неврология»;</p></li>
<li>2016 — Российская медицинская академия последипломного образования (РМАПО), «Неврология»;</p></li>
<li>2020 — Российская медицинская академия последипломного образования (РМАПО), «Неврология».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Панов Глеб Васильевич - [[*ratesCount]] | Невролог, Вертебролог | [[!+unit_seoName]] - Ист Клиник','description' => 'Панов Глеб Васильевич – невролог, врач высшей категории. Принимает пациентов с заболеваниями неврологии и гериатрии.','introtext' => '','description_full' => '<p>Панов Глеб Васильевич &ndash; невролог, врач высшей категории. С 1996 года курировал пациентов в стационаре в отделении общей неврологии. С 1998 года совмещал работу в стационаре, работая в поликлиниках Москвы и врачом специалистом.</p>
<p>Принимает пациентов с заболеваниями неврологии и гериатрии. Занимается диагностикой и лечением патологии шейного отдела позвоночника, протрузии диска, межпозвоночной грыжы, ишиалгии, остеохондроза, остеопороза, сколиоза, радикулита, травм позвоночника, люмбаго и д.р.</p>','age_from' => '18','age_to' => '100','skill' => 'usual','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL),
        array('iid' => '10000202','id_resource' => '7892','uri' => 'vrachi/moskvitina-nataliya-aleksandrovna','surname' => 'Москвитина','name' => 'Наталия','middlename' => 'Александровна','fullname' => 'Москвитина Наталия Александровна','photo' => 'moskvitina-nataliya-aleksandrovna.png','photo_type' => 'png','photos' => '{"120x120": ["assets/resourceimages/7892/_120x120/Moskvitina1_120x120.webp", "assets/resourceimages/7892/_120x120/Moskvitina2_120x120.webp", "assets/resourceimages/7892/_120x120/Moskvitina3_120x120.webp", "assets/resourceimages/7892/_120x120/Moskvitina4_120x120.webp"], "232x269": ["assets/resourceimages/7892/_232x269/Moskvitina1_232x269.webp", "assets/resourceimages/7892/_232x269/Moskvitina2_232x269.webp", "assets/resourceimages/7892/_232x269/Moskvitina3_232x269.webp", "assets/resourceimages/7892/_232x269/Moskvitina4_232x269.webp"], "576x576": ["assets/resourceimages/7892/_576x576/Moskvitina1_576x576.webp", "assets/resourceimages/7892/_576x576/Moskvitina2_576x576.webp", "assets/resourceimages/7892/_576x576/Moskvitina3_576x576.webp", "assets/resourceimages/7892/_576x576/Moskvitina4_576x576.webp"]}','holiday' => '0','rating' => '99','rating5' => '4.7','comments' => '29','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '1998','way_experience' => '<h2>Профессиональная подготовка:</h2>
</p></li>
<li>1998 — МПГУ, «Психология и педагогика»;</p></li>
<li>2016 — BT International. Южная Корея, «Международный курс по тейпированию. Балансирующее тейпирование. Балансирующее кросс-тейпирование»;</p></li>
<li>2017 — Международная академия экспертизы и оценки, Специалист по лечебной физической культуре;</p></li>
<li>2017 —  Южнонемецкий институт логотерапии и экзистенциального анализа, «Логотерапия»;</p></li>
<li>2017 — АНО ДПО «Волгоградская Гуманитарная академия профессиональной подготовки специалистов социальной сферы», «Образовательная кинезиология в практике психолого-педагогического сопровождения учащихся в условиях реализации ФГОС»;</p></li>
<li>2017 — Московский Институт восстановительной медицины, «Метамерная медицина», «Висцеральная хиропрактика»;</p></li>
<li>2017 —  ФГБОУ ВО «Российский национальный исследовательский университет им. Н. И. Пирогова» Минздрава России, «Основы кинезиологического тейпирования»;</p></li>
<li>2019 —  Московский Институт восстановительной медицины, «Постизометрическая релаксация мышц»;</p></li>
<li>2019 — Институт Апледжера. Франция, «Постурология. Педиатрия»; </p></li>
<li>2019 — Институт клинической прикладной кинезиологии Санкт-Петербург, «Висцеральные манипуляции»;</p></li>
<li>2019 — Институт Барраля. США-Франция, «Висцеральные манипуляции»;</p></li>
<li>2019 — Школа остеопатии Смирнова А. Е., Проект «Остеопрактика».</p></li>
</ul>','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Москвитина Наталия Александровна - [[*ratesCount]] | Остеопат, Реабилитолог | [[!+unit_seoName]] - Ист Клиник','description' => 'Москвитина Наталия Александровна - остеопат, реабилитолог. Специализируется в области реабилитации и оздоровления. Работает с детьми и взрослыми.','introtext' => '','description_full' => '<p>Москвитина Наталия Александровна - нейропсихолог-кинезиолог, инструктор-методист лечебной физклультуры, специалист остеопрактики.</p>
<p>Ведет психолого-педагогическую и физикультурно-оздоровительную деятельности.</p>
<p>Действительный член созюза реабилитологов России. Консультативный член ассоциации кинезиологов России. Мануально-практикующий инструктор лечебной и адаптивной физической культуры.</p>



 ','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '0','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10001126','id_resource' => '13664','uri' => 'vrachi/suharev-timur-dmitrievich','surname' => 'Сухарев','name' => 'Тимур','middlename' => 'Дмитриевич','fullname' => 'Сухарев Тимур Дмитриевич','photo' => 'suharev-timur-dmitrievich.jpg','photo_type' => NULL,'photos' => '{"120x120": ["assets/resourceimages/13664/_120x120/SykharevTD1_120x120.webp", "assets/resourceimages/13664/_120x120/SykharevTD2_120x120.webp", "assets/resourceimages/13664/_120x120/SykharevTD3_120x120.webp"], "232x269": ["assets/resourceimages/13664/_232x269/SykharevTD1_232x269.webp", "assets/resourceimages/13664/_232x269/SykharevTD2_232x269.webp", "assets/resourceimages/13664/_232x269/SykharevTD3_232x269.webp"], "576x576": ["assets/resourceimages/13664/_576x576/SykharevTD1_576x576.webp", "assets/resourceimages/13664/_576x576/SykharevTD2_576x576.webp", "assets/resourceimages/13664/_576x576/SykharevTD3_576x576.webp"]}','holiday' => '0','rating' => '99','rating5' => '0','comments' => '28','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '2015','way_experience' => '<h2 class="media-heading">Профессиональная подготовка:</h2>
</p></li>
<li>2015 — Российский национальный исследовательский медицинский университет имени Н. И. Пирогова, «Лечебное дело»;</p></li>
<li>2017 — Российская медицинская академия последипломного образования, «Травматология и ортопедия»;</p></li>
<li>2018 — АНО ДПО Учебный центр медицинских работников, «Физиотерапия»;</p></li>
<li>2019 — ООО МУЦ ДПО Образовательный стандарт, «Ультразвуковая диагностика»;</p></li>
<li>2021 — ФГБОУ ДПО РМАНПО Минздрава России, «Физическая и реабилитационная медицина».</p></li>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Сухарев Тимур Дмитриевич - [[*ratesCount]] | Травматолог, Ортопед| [[!+unit_seoName]] - Ист Клиник','description' => 'Сухарев Тимур Дмитриевич – травматолог-ортопед. Специализируется на заболеваниях опорно-двигательного аппарата. Проводит их профилактику и лечение. А также реабилитацию после травм, операций на позвоночнике и суставах.','introtext' => '','description_full' => '<p>Сухарев Тимур Дмитриевич &ndash; травматолог-ортопед. Специализируется на заболеваниях опорно-двигательного аппарата. Проводит их профилактику и лечение. А также реабилитацию после травм, операций на позвоночнике и суставах.</p>
<p>В своей работе использует комплексные виды лечения: блокады,&nbsp;вискосапплементацию, PRP, функциональное ортезирование, физиотерапию, остеопатию, мануальную терапию, ЛФК.</p>
<p>Активный участник практических семинаров и научных конференций по смежным дисциплинам. Ведет научную работу в сфере гериатрии.</p>','age_from' => '0','age_to' => '100','skill' => 'usual','is_primary_care' => '1','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '0','research' => '[]','diploms' => '[]','quotes' => ' ','interviews' => '[]','awards' => '[]'),
        array('iid' => '10000239','id_resource' => '8302','uri' => 'vrachi/kovalkova-elena-valerevna','surname' => 'Ковалькова','name' => 'Елена','middlename' => 'Валерьевна','fullname' => 'Ковалькова Елена Валерьевна','photo' => 'kovalkova-elena-valerevna.png','photo_type' => 'png','photos' => '{"120x120": ["assets/resourceimages/8302/_120x120/Kovalkova1_120x120.jpg", "assets/resourceimages/8302/_120x120/Kovalkova2_120x120.jpg", "assets/resourceimages/8302/_120x120/Kovalkova3_120x120.jpg", "assets/resourceimages/8302/_120x120/Kovalkova4_120x120.jpg"], "232x269": ["assets/resourceimages/8302/_232x269/Kovalkova1_232x269.jpg", "assets/resourceimages/8302/_232x269/Kovalkova2_232x269.jpg", "assets/resourceimages/8302/_232x269/Kovalkova3_232x269.jpg", "assets/resourceimages/8302/_232x269/Kovalkova4_232x269.jpg"], "576x576": ["assets/resourceimages/8302/_576x576/Kovalkova1_576x576.jpg", "assets/resourceimages/8302/_576x576/Kovalkova2_576x576.jpg", "assets/resourceimages/8302/_576x576/Kovalkova3_576x576.jpg", "assets/resourceimages/8302/_576x576/Kovalkova4_576x576.jpg"]}','holiday' => '0','rating' => '100','rating5' => '5','comments' => '59','show_comments' => '1','child' => '0','pregnant' => '1','diseases' => NULL,'experience' => '1994','way_experience' => '<h2>Профессиональная подготовка:</h2>
</p></li>
<li>1994 — СамГМУ, «Лечебное дело»;</p></li>
<li>2000 — интернатура по общей врачебной практике;</p></li>
<li>2005 — СамГМУ, «Рефлексотерапия»;</p></li>
<li>2012 — СамГМУ, интернатура по неврологии.</p></li>
</ul>
','show_experience' => '1','telemedicine' => '0','training' => NULL,'longtitle' => 'Ковалькова Елена Валерьевна -  [[*ratesCount]] - Цена от [[*doc_priem]] ₽ - Невролог, Рефлексотерапевт - Ист Клиник','description' => 'Ковалькова Елена Валерьевна – врач-терапевт, невролог, рефлексотерапевт. В работе использует эффективные методы лечения: рефлексотерапию, мезотерапию, различные виды блокад.','introtext' => '','description_full' => '<p>Ковалькова Елена Валерьевна &ndash; врач-терапевт, невролог, рефлексотерапевт. На протяжении 25 лет, как терапевт, помогает пациентам восстанавливать здоровье. С 2005 года специализируется на рефлексотерапии.</p>
<p>&nbsp;</p>
<p>Двадцатилетняя общая врачебная практика и большая база знаний помогают видеть больного в целом. Поэтому в лечении заболеваний Елена Валерьевна применяет комплексный подход. В работе использует эффективные методы лечения: рефлексотерапию, мезотерапию, различные виды блокад.</p>
<p>&nbsp;</p>
<p>Постоянный участник всероссийских и международных научно-практических конференций.</p>','age_from' => '18','age_to' => '100','skill' => 'expert','is_primary_care' => '1','is_doctor' => '1','is_nurse' => '0','is_analyze' => '0','off' => '1','research' => NULL,'diploms' => NULL,'quotes' => '','interviews' => NULL,'awards' => NULL)
    );


}

