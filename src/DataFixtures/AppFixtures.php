<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Brand;
use App\Entity\Model;
use App\Entity\Service;
use App\Entity\ServiceCategory;
use App\Entity\ModelServicePrice;
use App\Entity\Promotion;
use Doctrine\DBAL\Connection;

class AppFixtures extends Fixture
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @throws \Doctrine\DBAL\Exception
     */
    public function load(ObjectManager $manager): void
    {
        /*$this->connection->executeStatement('SET FOREIGN_KEY_CHECKS=0');
        $this->connection->executeStatement('TRUNCATE TABLE brand');
        $this->connection->executeStatement('TRUNCATE TABLE model');
        $this->connection->executeStatement('SET FOREIGN_KEY_CHECKS=1');*/

        /* Brand */
        $brandsData = [
            ['name' => 'Audi',       'slug' => 'audi',       'name_ru' => 'Ауди'],
            ['name' => 'Volkswagen', 'slug' => 'volkswagen', 'name_ru' => 'Фольксваген'],
            ['name' => 'Skoda',      'slug' => 'skoda',      'name_ru' => 'Шкода'],
            ['name' => 'Bentley',    'slug' => 'bentley',    'name_ru' => 'Бентли'],
            ['name' => 'Lamborghini','slug' => 'lamborghini','name_ru' => 'Ламборджини'],
            ['name' => 'Porsche',    'slug' => 'porsche',    'name_ru' => 'Порше'],
            ['name' => 'Seat',       'slug' => 'seat',       'name_ru' => 'Сиат'],
        ];

        foreach ($brandsData as $brandItem) {
            $brand = new Brand();
            $brand->setName($brandItem['name']);
            $brand->setSlug($brandItem['slug']);
            $brand->setNameRu($brandItem['name_ru']);
            $manager->persist($brand);
        }
        $manager->flush();


        /* MODELS */
        $modelAudiData = [
            ['brand_slug' => 'audi', 'slug' => 'a1', 'nameEn' => 'A1', 'nameRu' => 'А1', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'tt', 'nameEn' => 'TT', 'nameRu' => 'ТТ', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 's8', 'nameEn' => 'S8', 'nameRu' => 'С8', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 's6', 'nameEn' => 'S6', 'nameRu' => 'С6', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 's4', 'nameEn' => 'S4', 'nameRu' => 'С4', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'q7', 'nameEn' => 'Q7', 'nameRu' => 'Ку7', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a4-allroad', 'nameEn' => 'A4 Allroad', 'nameRu' => 'А4 Оллроуд', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'r8', 'nameEn' => 'R8', 'nameRu' => 'Р8', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a8', 'nameEn' => 'A8', 'nameRu' => 'А8', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a6', 'nameEn' => 'A6', 'nameRu' => 'А6', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a5', 'nameEn' => 'A5', 'nameRu' => 'А5', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a4', 'nameEn' => 'A4', 'nameRu' => 'А4', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a3', 'nameEn' => 'A3', 'nameRu' => 'А3', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a2', 'nameEn' => 'A2', 'nameRu' => 'А2', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => '80', 'nameEn' => '80', 'nameRu' => '80', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => '100', 'nameEn' => '100', 'nameRu' => '100', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'rs2', 'nameEn' => 'RS2', 'nameRu' => 'РС2', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 's2', 'nameEn' => 'S2', 'nameRu' => 'С2', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 's3', 'nameEn' => 'S3', 'nameRu' => 'С3', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 's5', 'nameEn' => 'S5', 'nameRu' => 'С5', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'q5', 'nameEn' => 'Q5', 'nameRu' => 'Ку5', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a7', 'nameEn' => 'A7', 'nameRu' => 'А7', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'q3', 'nameEn' => 'Q3', 'nameRu' => 'Ку3', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a6-allroad', 'nameEn' => 'A6 Allroad', 'nameRu' => 'А6 Оллроуд', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'q1', 'nameEn' => 'Q1', 'nameRu' => 'Ку1', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 's1', 'nameEn' => 'S1', 'nameRu' => 'С1', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 's7', 'nameEn' => 'S7', 'nameRu' => 'С7', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'q8', 'nameEn' => 'Q8', 'nameRu' => 'Ку8', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'rs-q3', 'nameEn' => 'RS Q3', 'nameRu' => 'РС Ку3', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'rs3', 'nameEn' => 'RS3', 'nameRu' => 'РС3', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a3-sportback', 'nameEn' => 'A3 Sportback', 'nameRu' => 'А3 Спортбэк', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a3-sedan', 'nameEn' => 'A3 Sedan', 'nameRu' => 'А3 Седан', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a4-allroad-quattro', 'nameEn' => 'A4 Allroad Quattro', 'nameRu' => 'А4 Оллроуд Кваттро', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a4-avant', 'nameEn' => 'A4 Avant', 'nameRu' => 'А4 Авант', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a5-sportback', 'nameEn' => 'A5 Sportback', 'nameRu' => 'А5 Спортбэк', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a6-allroad-quattro', 'nameEn' => 'A6 Allroad Quattro', 'nameRu' => 'А6 Оллроуд Кваттро', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a6-avant', 'nameEn' => 'A6 Avant', 'nameRu' => 'А6 Авант', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a7-sportback', 'nameEn' => 'A7 Sportback', 'nameRu' => 'А7 Спортбэк', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'a8-l', 'nameEn' => 'A8 L', 'nameRu' => 'А8 Лонг', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'e-tron', 'nameEn' => 'e-tron', 'nameRu' => 'Э-трон', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'e-tron-sportback', 'nameEn' => 'e-tron Sportback', 'nameRu' => 'Э-трон Спортбэк', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'q3-sportback', 'nameEn' => 'Q3 Sportback', 'nameRu' => 'Ку3 Спортбэк', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'q5-sportback', 'nameEn' => 'Q5 Sportback', 'nameRu' => 'Ку5 Спортбэк', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'rs-q8', 'nameEn' => 'RS Q8', 'nameRu' => 'РС Ку8', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'rs-4-avant', 'nameEn' => 'RS 4 Avant', 'nameRu' => 'РС4 Авант', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'rs-5-sportback', 'nameEn' => 'RS 5 Sportback', 'nameRu' => 'РС5 Спортбэк', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'rs-6-avant', 'nameEn' => 'RS 6 Avant', 'nameRu' => 'РС6 Авант', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'rs-7-sportback', 'nameEn' => 'RS 7 Sportback', 'nameRu' => 'РС7 Спортбэк', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 's7-sportback', 'nameEn' => 'S7 Sportback', 'nameRu' => 'С7 Спортбэк', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'sq5', 'nameEn' => 'SQ5', 'nameRu' => 'СКу5', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'sq7', 'nameEn' => 'SQ7', 'nameRu' => 'СКу7', 'image' => ''],
            ['brand_slug' => 'audi', 'slug' => 'sq8', 'nameEn' => 'SQ8', 'nameRu' => 'СКу8', 'image' => ''],
        ];

        $modelVolkswagenData = [
            ['brand_slug' => 'volkswagen', 'slug' => 'touareg', 'nameEn' => 'Touareg', 'nameRu' => 'Туарег', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'scirocco', 'nameEn' => 'Scirocco', 'nameRu' => 'Сирокко', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'lt', 'nameEn' => 'LT', 'nameRu' => 'ЛТ', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'tiguan', 'nameEn' => 'Tiguan', 'nameRu' => 'Тигуан', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'pointer', 'nameEn' => 'Pointer', 'nameRu' => 'Пойнтер', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'phaeton', 'nameEn' => 'Phaeton', 'nameRu' => 'Фаэтон', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'vento', 'nameEn' => 'Vento', 'nameRu' => 'Венто', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'passat', 'nameEn' => 'Passat', 'nameRu' => 'Пассат', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'jetta', 'nameEn' => 'Jetta', 'nameRu' => 'Джетта', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'golf', 'nameEn' => 'Golf', 'nameRu' => 'Гольф', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'eurovan', 'nameEn' => 'Eurovan', 'nameRu' => 'ЕвроВан', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'eos', 'nameEn' => 'EOS', 'nameRu' => 'ЭОС', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'beetle', 'nameEn' => 'Beetle', 'nameRu' => 'Битл', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'caddy', 'nameEn' => 'Caddy', 'nameRu' => 'Кадди', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'sharan', 'nameEn' => 'Sharan', 'nameRu' => 'Шаран', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'bora', 'nameEn' => 'Bora', 'nameRu' => 'Бора', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'caravelle', 'nameEn' => 'Caravelle', 'nameRu' => 'Каравелла', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'polo', 'nameEn' => 'Polo', 'nameRu' => 'Поло', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'transporter', 'nameEn' => 'Transporter', 'nameRu' => 'Транспортер', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'multivan', 'nameEn' => 'Multivan', 'nameRu' => 'Мультивэн', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'crafter', 'nameEn' => 'Crafter', 'nameRu' => 'Крафтер', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'passat-cc', 'nameEn' => 'Passat CC', 'nameRu' => 'Пассат СС', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'amarok', 'nameEn' => 'Amarok', 'nameRu' => 'Амарок', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'golf-plus', 'nameEn' => 'Golf Plus', 'nameRu' => 'Гольф Плюс', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'polo-sedan', 'nameEn' => 'Polo Sedan', 'nameRu' => 'Поло Седан', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'touran', 'nameEn' => 'Touran', 'nameRu' => 'Туран', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'golf-gti', 'nameEn' => 'Golf GTI', 'nameRu' => 'Гольф ГТИ', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'lupo', 'nameEn' => 'Lupo', 'nameRu' => 'Лупо', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'newbeetle', 'nameEn' => 'Newbeetle', 'nameRu' => 'Нью Битл', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'teramont', 'nameEn' => 'Teramont', 'nameRu' => 'Терамонт', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'arteon', 'nameEn' => 'Arteon', 'nameRu' => 'Артэон', 'image' => ''],
            ['brand_slug' => 'volkswagen', 'slug' => 'california', 'nameEn' => 'California', 'nameRu' => 'Калифорния', 'image' => ''],
        ];

        $modelSkodaData = [
            ['brand_slug' => 'skoda', 'slug' => 'superb', 'nameEn' => 'Superb', 'nameRu' => 'Суперб', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'felicia', 'nameEn' => 'Felicia', 'nameRu' => 'Фелиция', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'octavia', 'nameEn' => 'Octavia', 'nameRu' => 'Октавия', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'fabia', 'nameEn' => 'Fabia', 'nameRu' => 'Фабия', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'roomster', 'nameEn' => 'Roomster', 'nameRu' => 'Румстер', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'rapid', 'nameEn' => 'Rapid', 'nameRu' => 'Рапид', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'yeti', 'nameEn' => 'Yeti', 'nameRu' => 'Йети', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'fabia-rs', 'nameEn' => 'Fabia RS', 'nameRu' => 'Фабия РС', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'favorit', 'nameEn' => 'Favorit', 'nameRu' => 'Фаворит', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'kodiaq', 'nameEn' => 'Kodiaq', 'nameRu' => 'Кодиак', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'octavia-a5', 'nameEn' => 'Octavia A5', 'nameRu' => 'Октавия А5', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'octavia-a7', 'nameEn' => 'Octavia A7', 'nameRu' => 'Октавия А7', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'octavia-rs', 'nameEn' => 'Octavia RS', 'nameRu' => 'Октавия РС', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'octavia-scout', 'nameEn' => 'Octavia Scout', 'nameRu' => 'Октавия Скаут', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'octavia-tour', 'nameEn' => 'Octavia Tour', 'nameRu' => 'Октавия Тур', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'karoq', 'nameEn' => 'Karoq', 'nameRu' => 'Карок', 'image' => ''],
            ['brand_slug' => 'skoda', 'slug' => 'superb-combi', 'nameEn' => 'Superb Combi', 'nameRu' => 'Суперб Комби', 'image' => ''],
        ];

        $modelBentleyData = [
            ['brand_slug' => 'bentley', 'slug' => 'arnage',           'nameEn' => 'Arnage',           'nameRu' => 'Арнаж',            'image' => ''],
            ['brand_slug' => 'bentley', 'slug' => 'azure',            'nameEn' => 'Azure',            'nameRu' => 'Азур',             'image' => ''],
            ['brand_slug' => 'bentley', 'slug' => 'bentayga',         'nameEn' => 'Bentayga',         'nameRu' => 'Бентайга',         'image' => ''],
            ['brand_slug' => 'bentley', 'slug' => 'brooklands',       'nameEn' => 'Brooklands',       'nameRu' => 'Брукландс',        'image' => ''],
            ['brand_slug' => 'bentley', 'slug' => 'continental',      'nameEn' => 'Continental',      'nameRu' => 'Континенталь',     'image' => ''],
            ['brand_slug' => 'bentley', 'slug' => 'continental-gt',   'nameEn' => 'Continental GT',   'nameRu' => 'Континенталь ГТ',  'image' => ''],
            ['brand_slug' => 'bentley', 'slug' => 'mulsanne',         'nameEn' => 'Mulsanne',         'nameRu' => 'Мульсанн',         'image' => ''],
            ['brand_slug' => 'bentley', 'slug' => 'flying-spur',      'nameEn' => 'Flying Spur',      'nameRu' => 'Флаинг Спур',      'image' => ''],
        ];

        $modelLamborghiniData = [
            ['brand_slug' => 'lamborghini', 'slug' => 'aventador',    'nameEn' => 'Aventador',    'nameRu' => 'Авентадор',    'image' => ''],
            ['brand_slug' => 'lamborghini', 'slug' => 'gallardo',     'nameEn' => 'Gallardo',     'nameRu' => 'Гаярдо',        'image' => ''],
            ['brand_slug' => 'lamborghini', 'slug' => 'huracan',      'nameEn' => 'Huracan',      'nameRu' => 'Хуракан',       'image' => ''],
            ['brand_slug' => 'lamborghini', 'slug' => 'murcielago',   'nameEn' => 'Murcielago',   'nameRu' => 'Мурcелаго',     'image' => ''],
            ['brand_slug' => 'lamborghini', 'slug' => 'urus',         'nameEn' => 'Urus',         'nameRu' => 'Урус',          'image' => ''],
        ];

        $modelPorscheData = [
            ['brand_slug' => 'porsche', 'slug' => 'macan',                    'nameEn' => 'Macan',                    'nameRu' => 'Макан',                    'image' => ''],
            ['brand_slug' => 'porsche', 'slug' => 'carrera',                  'nameEn' => 'Carrera',                  'nameRu' => 'Каррера',                  'image' => ''],
            ['brand_slug' => 'porsche', 'slug' => 'cayman',                   'nameEn' => 'Cayman',                   'nameRu' => 'Кайман',                   'image' => ''],
            ['brand_slug' => 'porsche', 'slug' => 'cayenne',                  'nameEn' => 'Cayenne',                  'nameRu' => 'Кайен',                    'image' => ''],
            ['brand_slug' => 'porsche', 'slug' => '911',                      'nameEn' => '911',                      'nameRu' => '911',                      'image' => ''],
            ['brand_slug' => 'porsche', 'slug' => 'panamera',                 'nameEn' => 'Panamera',                 'nameRu' => 'Панамера',                 'image' => ''],
            ['brand_slug' => 'porsche', 'slug' => '718-boxster',              'nameEn' => '718 Boxster',              'nameRu' => '718 Бокстер',              'image' => ''],
            ['brand_slug' => 'porsche', 'slug' => '718-cayman',               'nameEn' => '718 Cayman',               'nameRu' => '718 Кайман',               'image' => ''],
            ['brand_slug' => 'porsche', 'slug' => 'panamera-sport-turismo',   'nameEn' => 'Panamera Sport Turismo',   'nameRu' => 'Панамера Спорт Туризмо',   'image' => ''],
            ['brand_slug' => 'porsche', 'slug' => 'taycan',                   'nameEn' => 'Taycan',                   'nameRu' => 'Тайкан',                   'image' => ''],
            ['brand_slug' => 'porsche', 'slug' => 'taycan-cross-turismo',     'nameEn' => 'Taycan Cross Turismo',     'nameRu' => 'Тайкан Кросс Туризмо',     'image' => ''],
        ];

        $modelSeatData = [
            ['brand_slug' => 'seat', 'slug' => 'alhambra', 'nameEn' => 'Alhambra', 'nameRu' => 'Альхамбра', 'image' => ''],
            ['brand_slug' => 'seat', 'slug' => 'altea',    'nameEn' => 'Altea',    'nameRu' => 'Альтеа',    'image' => ''],
            ['brand_slug' => 'seat', 'slug' => 'ibiza',    'nameEn' => 'Ibiza',    'nameRu' => 'Ибица',    'image' => ''],
            ['brand_slug' => 'seat', 'slug' => 'leon',     'nameEn' => 'Leon',     'nameRu' => 'Леон',     'image' => ''],
            ['brand_slug' => 'seat', 'slug' => 'toledo',   'nameEn' => 'Toledo',   'nameRu' => 'Толедо',   'image' => ''],
        ];

        $allModels = array_merge(
            $modelAudiData,
            $modelVolkswagenData,
            $modelSkodaData,
            $modelBentleyData,
            $modelLamborghiniData,
            $modelPorscheData,
            $modelSeatData
        );

        $models = [];
        foreach ($allModels as $model_item) {
            $brand = $manager->getRepository(Brand::class)->findOneBy(['slug' => $model_item['brand_slug']]);
            //echo "Достаем бренд с ID: " . $brand->slug . PHP_EOL;
            $model = new Model();
            $model->setBrand($brand);
            $model->setSlug($model_item['slug']);
            $model->setNameEn($model_item['nameEn']);
            $model->setNameRu($model_item['nameRu']);
            $model->setImage($model_item['image']);
            $manager->persist($model);
            $models[] = $model;
        }



        /* SERVICES */

        $serviceData = [
            [
                'category' => ['name' => 'Техническое обслуживание', 'slug' => 'tekhnicheskoe-obsluzhivanie'],
                'services' => [
                    ['name' => 'Техническое обслуживание', 'slug' => 'zamena-pompy-zamena-vodyanogo-nasosa', 'base_price' => 1500],
                    ['name' => 'Замена помпы (замена водяного насоса)', 'slug' => 'zamena-pompy-zamena-vodyanogo-nasosa', 'base_price' => 2250],
                    ['name' => 'Замена свечей зажигания', 'slug' => 'zamena-svechey-zazhiganiya', 'base_price' => 600],
                    ['name' => 'Чистка дроссельной заслонки', 'slug' => 'chistka-drosselnoy-zaslonki', 'base_price' => 750],
                    ['name' => 'Сброс межсервисного интервала', 'slug' => 'sbros-mezhservisnogo-intervala', 'base_price' => 300],
                    ['name' => 'Экспресс-замена масла с защитой ДВС', 'slug' => 'ekspress-zamena-masla-s-zashchitoy-dvs', 'base_price' => 1200],
                    ['name' => 'Замена масла в АКПП', 'slug' => 'zamena-masla-v-akpp', 'base_price' => 3000],
                    ['name' => 'Полная замена масла в АКПП', 'slug' => 'polnaya-zamena-masla-v-akpp', 'base_price' => 3750],
                    ['name' => 'Частичная замена масла в АКПП', 'slug' => 'chastichnaya-zamena-masla-v-akpp', 'base_price' => 2250],
                    ['name' => 'Замена масла в двигателе', 'slug' => 'zamena-masla-v-dvigatele', 'base_price' => 900],
                    ['name' => 'Замена фильтров', 'slug' => 'zamena-filtrov', 'base_price' => 450],
                    ['name' => 'Замена воздушного фильтра', 'slug' => 'zamena-vozdushnogo-filtra', 'base_price' => 450],
                    ['name' => 'Замена топливного фильтра', 'slug' => 'zamena-toplivnogo-filtra', 'base_price' => 600],
                    ['name' => 'Замена салонного фильтра', 'slug' => 'zamena-salonnogo-filtra', 'base_price' => 450],
                    ['name' => 'Замена топливного фильтра дизель', 'slug' => 'zamena-toplivnogo-filtra-dizel', 'base_price' => 750],
                    ['name' => 'Замена приводных ремней', 'slug' => 'zamena-privodnykh-remney', 'base_price' => 1500],
                    ['name' => 'Замена ремня ГРМ', 'slug' => 'zamena-remnya-grm', 'base_price' => 6000],
                    ['name' => 'Замена цепи ГРМ', 'slug' => 'zamena-tsepi-grm', 'base_price' => 12000],
                ]
            ],
            [
                'category' => ['name' => 'Диагностика', 'slug' => 'diagnostika'],
                'services' => [
                    ['name' => 'Диагностика ходовой части', 'slug' => 'diagnostika-hodovoy-chasti', 'base_price' => 750],
                    ['name' => 'Диагностика систем', 'slug' => 'diagnostika-sistem', 'base_price' => 750],
                    ['name' => 'Комплексная диагностика', 'slug' => 'kompleksnaya-diagnostika', 'base_price' => 3000],
                    ['name' => 'Компьютерная диагностика авто', 'slug' => 'kompyuternaya-diagnostika-avto', 'base_price' => 750],
                ]

            ],
            [
                'category' => ['name' => 'Ремонт трансмиссии', 'slug' => 'remont-transmissii'],
                'services' => [
                    ['name' => 'Замена масла в заднем мосту', 'slug' => 'zamena-masla-v-zadnem-mostu', 'base_price' => 600],
                    ['name' => 'Замена масла в мостах', 'slug' => 'zamena-masla-v-mostakh', 'base_price' => 600],
                    ['name' => 'Замена масла в переднем мосту', 'slug' => 'zamena-masla-v-perednem-mostu', 'base_price' => 600],
                    ['name' => 'Замена масла в редукторе моста', 'slug' => 'zamena-masla-v-reduktore-mosta', 'base_price' => 600],
                    ['name' => 'Замена карданного вала (кардана)', 'slug' => 'zamena-kardannogo-vala-kardana', 'base_price' => 2250],
                    ['name' => 'Ремонт карданного вала (кардана)', 'slug' => 'remont-kardannogo-vala-kardana', 'base_price' => 6750],
                    ['name' => 'Замена масла в КПП', 'slug' => 'zamena-masla-v-kpp', 'base_price' => 600],
                    ['name' => 'Замена выжимного подшипника', 'slug' => 'zamena-vyzhimnogo-podshipnika', 'base_price' => 3000],
                    ['name' => 'Ремонт КПП', 'slug' => 'remont-kpp', 'base_price' => 10500],
                    ['name' => 'Замена масла в МКПП', 'slug' => 'zamena-masla-v-mkpp', 'base_price' => 600],
                    ['name' => 'Замена МКПП', 'slug' => 'zamena-mkpp', 'base_price' => 9000],
                    ['name' => 'Замена сцепления МКПП', 'slug' => 'zamena-stsepleniya-mkpp', 'base_price' => 7500],
                    ['name' => 'Ремонт коробки МКПП', 'slug' => 'remont-korobki-mkpp', 'base_price' => 10500],
                    ['name' => 'Замена внутреннего шруса', 'slug' => 'zamena-vnutrennego-shrusa', 'base_price' => 3000],
                    ['name' => 'Замена наружного шруса', 'slug' => 'zamena-naruzhnogo-shrusa', 'base_price' => 3000],
                    ['name' => 'Замена переднего привода', 'slug' => 'zamena-perednego-privoda', 'base_price' => 2250],
                    ['name' => 'Замена привода', 'slug' => 'zamena-privoda', 'base_price' => 2250],
                    ['name' => 'Замена пыльника шруса', 'slug' => 'zamena-pylnika-shrusa', 'base_price' => 3000],
                    ['name' => 'Замена шруса', 'slug' => 'zamena-shrusa', 'base_price' => 2250],
                    ['name' => 'Ремонт полного привода', 'slug' => 'remont-polnogo-privoda', 'base_price' => 3000],
                    ['name' => 'Ремонт приводов', 'slug' => 'remont-privodov', 'base_price' => 1500],
                    ['name' => 'Замена приводного ремня', 'slug' => 'zamena-privodnogo-remnya', 'base_price' => 1050],
                    ['name' => 'Диагностика раздатки', 'slug' => 'diagnostika-razdatki', 'base_price' => 750],
                    ['name' => 'Замена масла в раздатке', 'slug' => 'zamena-masla-v-razdatke', 'base_price' => 600],
                    ['name' => 'Замена раздатки (раздаточной коробки)', 'slug' => 'zamena-razdatki-razdatochnoy-korobki', 'base_price' => 6000],
                    ['name' => 'Ремонт раздаточной коробки (раздатки)', 'slug' => 'remont-razdatochnoy-korobki-razdatki', 'base_price' => 10500],
                    ['name' => 'Замена масла в редукторе', 'slug' => 'zamena-masla-v-reduktore', 'base_price' => 600],
                    ['name' => 'Замена редуктора', 'slug' => 'zamena-reduktora', 'base_price' => 4500],
                    ['name' => 'Ремонт редукторов', 'slug' => 'remont-reduktorov', 'base_price' => 10500],
                    ['name' => 'Замена сальника привода', 'slug' => 'zamena-salnika-privoda', 'base_price' => 2250],
                    ['name' => 'Замена сальника редуктора', 'slug' => 'zamena-salnika-reduktora', 'base_price' => 2400],
                    ['name' => 'Замена сальников', 'slug' => 'zamena-salnikov', 'base_price' => 1500],
                    ['name' => 'Замена сальников раздатки', 'slug' => 'zamena-salnikov-razdatki', 'base_price' => 2700],
                    ['name' => 'Замена сцепления', 'slug' => 'zamena-stsepleniya', 'base_price' => 7500],
                    ['name' => 'Ремонт сцепления', 'slug' => 'remont-stsepleniya', 'base_price' => 1500],
                ]

            ],
            [
                'category' => ['name' => 'Ремонт двигателя', 'slug' => 'remont-dvigatelya'],
                'services' => [
                    ['name' => 'Диагностика двигателя', 'slug' => 'diagnostika-dvigatelya', 'base_price' => 750],
                    ['name' => 'Замена гидрокомпенсаторов', 'slug' => 'zamena-gidrokonsensatorov', 'base_price' => 10500],
                    ['name' => 'Замена опоры двигателя', 'slug' => 'zamena-opory-dvigatelya', 'base_price' => 1500],
                    ['name' => 'Замена подушек двигателя', 'slug' => 'zamena-podushek-dvigatelya', 'base_price' => 2250],
                    ['name' => 'Капитальный ремонт двигателя', 'slug' => 'kapitalnyy-remont-dvigatelya', 'base_price' => 45000],
                    ['name' => 'Переборка двигателя', 'slug' => 'pereborka-dvigatelya', 'base_price' => 37500],
                    ['name' => 'Промывка двигателя', 'slug' => 'promyvka-dvigatelya', 'base_price' => 1800],
                    ['name' => 'Промывка радиатора', 'slug' => 'promyvka-radiatora', 'base_price' => 1500],
                    ['name' => 'Ремонт двигателя', 'slug' => 'remont-dvigatelya', 'base_price' => 2250],
                    ['name' => 'Тюнинг двигателя', 'slug' => 'tyuning-dvigatelya', 'base_price' => 1500],
                    ['name' => 'Техническое обслуживание двигателя', 'slug' => 'tekhnicheskoe-obsluzhivanie-dvigatelya', 'base_price' => 1500],
                    ['name' => 'Регулировка клапанов', 'slug' => 'regulirovka-klapanov', 'base_price' => 3750],
                    ['name' => 'Ремонт и замена коленчатого вала двигателя', 'slug' => 'remont-i-zamena-kolenchatogo-vala-dvigatelya', 'base_price' => 18000],
                    ['name' => 'Замена масляного насоса', 'slug' => 'zamena-maslyanogo-nasosa', 'base_price' => 7500],
                    ['name' => 'Замена топливного насоса', 'slug' => 'zamena-toplivnogo-nasosa', 'base_price' => 3000],
                    ['name' => 'Замена поршневых колец', 'slug' => 'zamena-porshnevyh-kolets', 'base_price' => 27000],
                    ['name' => 'Замена прокладки клапанной крышки', 'slug' => 'zamena-prokladki-klapannoy-kryshki', 'base_price' => 2250],
                    ['name' => 'Замена прокладки поддона', 'slug' => 'zamena-prokladki-poddona', 'base_price' => 3750],
                    ['name' => 'Промывка инжектора', 'slug' => 'promyvka-inzhektora', 'base_price' => 3000],
                    ['name' => 'Промывка систем автомобиля', 'slug' => 'promyvka-sistem-avtomobilya', 'base_price' => 1200],
                    ['name' => 'Промывка системы охлаждения', 'slug' => 'promyvka-sistemy-ohlazhdeniya', 'base_price' => 2250],
                    ['name' => 'Промывка топливной системы', 'slug' => 'promyvka-toplivnoy-sistemy', 'base_price' => 3000],
                    ['name' => 'Промывка дроссельной заслонки', 'slug' => 'promyvka-drosselnoy-zaslonki', 'base_price' => 750],
                    ['name' => 'Мойка радиатора', 'slug' => 'moyka-radiatora', 'base_price' => 600],
                    ['name' => 'Чистка радиаторов', 'slug' => 'chistka-radiatorov', 'base_price' => 2250],
                    ['name' => 'Замена распредвала', 'slug' => 'zamena-raspredvala', 'base_price' => 4500],
                    ['name' => 'Замена сальника распредвала', 'slug' => 'zamena-salnika-raspredvala', 'base_price' => 1500],
                    ['name' => 'Замена заднего сальника коленвала', 'slug' => 'zamena-zadnego-salnika-kolenvala', 'base_price' => 7500],
                    ['name' => 'Замена переднего сальника коленвала', 'slug' => 'zamena-perednego-salnika-kolenvala', 'base_price' => 1800],
                    ['name' => 'Замена сальника коленчатого вала', 'slug' => 'zamena-salnika-kolenchatogo-vala', 'base_price' => 7500],
                    ['name' => 'Диагностика системы охлаждения', 'slug' => 'diagnostika-sistemy-ohlazhdeniya', 'base_price' => 750],
                    ['name' => 'Замена охлаждающей жидкости', 'slug' => 'zamena-ohlazhdajushchey-zhidkosti', 'base_price' => 1500],
                    ['name' => 'Замена антифриза', 'slug' => 'zamena-antifriza', 'base_price' => 1500],
                    ['name' => 'Замена радиатора охлаждения', 'slug' => 'zamena-radiatora-ohlazhdeniya', 'base_price' => 1800],
                    ['name' => 'Ремонт радиаторов охлаждения', 'slug' => 'remont-radiatorov-ohlazhdeniya', 'base_price' => 1500],
                    ['name' => 'Ремонт системы охлаждения', 'slug' => 'remont-sistemy-ohlazhdeniya', 'base_price' => 4800],
                    ['name' => 'Замена бензонасоса', 'slug' => 'zamena-benzonasosa', 'base_price' => 3750],
                    ['name' => 'Ремонт инжектора', 'slug' => 'remont-inzhektora', 'base_price' => 9000],
                    ['name' => 'Ремонт топливной системы', 'slug' => 'remont-toplivnoy-sistemy', 'base_price' => 750],
                    ['name' => 'Диагностика турбины', 'slug' => 'diagnostika-turbiny', 'base_price' => 1500],
                    ['name' => 'Замена турбины', 'slug' => 'zamena-turbiny', 'base_price' => 7500],
                    ['name' => 'Ремонт турбины', 'slug' => 'remont-turbiny', 'base_price' => 18000],
                    ['name' => 'Ремонт ГБЦ двигателя', 'slug' => 'remont-gbc-dvigatelya', 'base_price' => 18000],
                    ['name' => 'Замена прокладки ГБЦ', 'slug' => 'zamena-prokladki-gbc', 'base_price' => 12000],
                    ['name' => 'Замена маслосъемных колпачков', 'slug' => 'zamena-maslosemyh-kolpachkov', 'base_price' => 12000],
                ],

            ],
            [
                'category' => ['name' => 'Ремонт дизельного двигателя', 'slug' => 'remont-dizelnogo-dvigatelya'],
                'services' => [
                    ['name' => 'Диагностика дизельных двигателей', 'slug' => 'diagnostika-dizelnykh-dvigateley', 'base_price' => 1500],
                    ['name' => 'Ремонт дизельных двигателей', 'slug' => 'remont-dizelnykh-dvigateley', 'base_price' => 3000],
                    ['name' => 'Замена свечей накаливания', 'slug' => 'zamena-svechey-nakalivaniya', 'base_price' => 3000],
                    ['name' => 'Замер компрессии', 'slug' => 'zamer-kompressii', 'base_price' => 1500],
                    ['name' => 'Замена форсунок', 'slug' => 'zamena-forsunok', 'base_price' => 3000],
                    ['name' => 'Ремонт турбин дизельных двигателей', 'slug' => 'remont-turbin-dizelnykh-dvigateley', 'base_price' => 27000],
                    ['name' => 'Ремонт дизельных турбин', 'slug' => 'remont-dizelnykh-turbin', 'base_price' => 27000],
                    ['name' => 'Ремонт форсунок', 'slug' => 'remont-forsunok', 'base_price' => 12000],
                    ['name' => 'Замена ТНВД', 'slug' => 'zamena-tnvd', 'base_price' => 7500],
                    ['name' => 'Ремонт ТНВД', 'slug' => 'remont-tnvd', 'base_price' => 33000],
                ],

            ],
            [
                'category' => ['name' => 'Электро-оборудование', 'slug' => 'elektro-oborudovanie'],
                'services' => [
                    ['name' => 'Ремонт и замена датчиков', 'slug' => 'remont-i-zamena-datchikov', 'base_price' => 750],
                    ['name' => 'Замена датчика АБС', 'slug' => 'zamena-datchika-abs', 'base_price' => 1200],
                    ['name' => 'Замена датчика давления масла', 'slug' => 'zamena-datchika-davleniya-masla', 'base_price' => 1500],
                    ['name' => 'Замена датчика детонации', 'slug' => 'zamena-datchika-detonatsii', 'base_price' => 750],
                    ['name' => 'Замена датчика коленвала', 'slug' => 'zamena-datchika-kolenvala', 'base_price' => 1350],
                    ['name' => 'Замена датчика распредвала', 'slug' => 'zamena-datchika-raspredvala', 'base_price' => 1200],
                    ['name' => 'Замена датчика скорости', 'slug' => 'zamena-datchika-skorosti', 'base_price' => 1200],
                    ['name' => 'Замена датчика температуры охлаждающей жидкости', 'slug' => 'zamena-datchika-temperatury-ohlazhdayushchey-zhidkosti', 'base_price' => 750],
                    ['name' => 'Замена датчиков', 'slug' => 'zamena-datchikov', 'base_price' => 750],
                    ['name' => 'Ремонт датчиков', 'slug' => 'remont-datchikov', 'base_price' => 1200],
                    ['name' => 'Замена ламп освещения', 'slug' => 'zamena-lamp-osveshcheniya', 'base_price' => 300],
                    ['name' => 'Замена габаритной лампы', 'slug' => 'zamena-gabaritnoy-lampy', 'base_price' => 300],
                    ['name' => 'Замена задней фары', 'slug' => 'zamena-zadney-fary', 'base_price' => 750],
                    ['name' => 'Замена ламп габаритных огней', 'slug' => 'zamena-lamp-gabaritnykh-ogney', 'base_price' => 2250],
                    ['name' => 'Замена ламп заднего хода', 'slug' => 'zamena-lamp-zadnego-khoda', 'base_price' => 300],
                    ['name' => 'Замена ламп подсветки номера', 'slug' => 'zamena-lamp-podsvetki-nomera', 'base_price' => 450],
                    ['name' => 'Замена ламп стоп сигнала', 'slug' => 'zamena-lamp-stop-signala', 'base_price' => 450],
                    ['name' => 'Замена лампы ближнего света', 'slug' => 'zamena-lampy-blizhnego-sveta', 'base_price' => 450],
                    ['name' => 'Замена лампы габаритов', 'slug' => 'zamena-lampy-gabaritov', 'base_price' => 450],
                    ['name' => 'Замена лампы салона', 'slug' => 'zamena-lampy-salona', 'base_price' => 300],
                    ['name' => 'Замена передней фары', 'slug' => 'zamena-peredney-fary', 'base_price' => 750],
                    ['name' => 'Замена противотуманной лампы', 'slug' => 'zamena-protivotumannoy-lampy', 'base_price' => 450],
                    ['name' => 'Замена ламп (фар) освещения', 'slug' => 'zamena-lamp-far-osveshcheniya', 'base_price' => 300],
                    ['name' => 'Регулировка фар', 'slug' => 'regulirovka-far', 'base_price' => 750],
                    ['name' => 'Замена предохранителей', 'slug' => 'zamena-predohraniteley', 'base_price' => 450],
                    ['name' => 'Диагностика кондиционера', 'slug' => 'diagnostika-konditsionera', 'base_price' => 900],
                    ['name' => 'Замена компрессора кондиционера', 'slug' => 'zamena-kompressora-konditsionera', 'base_price' => 3750],
                    ['name' => 'Замена компрессора', 'slug' => 'zamena-kompressora', 'base_price' => 3750],
                    ['name' => 'Ремонт компрессоров', 'slug' => 'remont-kompressorov', 'base_price' => 10500],
                    ['name' => 'Заправка автокондиционера', 'slug' => 'zapravka-avtokonditsionera', 'base_price' => 4500],
                    ['name' => 'Ремонт автокондиционера', 'slug' => 'remont-avtokonditsionera', 'base_price' => 4500],
                    ['name' => 'Ремонт радиатора охлаждения', 'slug' => 'remont-radiatora-ohlazhdeniya', 'base_price' => 5250],
                    ['name' => 'Замена ремня кондиционера', 'slug' => 'zamena-remnya-konditsionera', 'base_price' => 2250],
                    ['name' => 'Заправка кондиционера', 'slug' => 'zapravka-konditsionera', 'base_price' => 4500],
                    ['name' => 'Замена термостата', 'slug' => 'zamena-termostata', 'base_price' => 1500],
                    ['name' => 'Замена генератора', 'slug' => 'zamena-generatora', 'base_price' => 2250],
                    ['name' => 'Замена подшипника генератора', 'slug' => 'zamena-podshipnika-generatora', 'base_price' => 2700],
                    ['name' => 'Замена ремня генератора', 'slug' => 'zamena-remnya-generatora', 'base_price' => 1200],
                    ['name' => 'Замена щеток генератора', 'slug' => 'zamena-shchetok-generatora', 'base_price' => 2250],
                    ['name' => 'Ремонт генератора', 'slug' => 'remont-generatora', 'base_price' => 3000],
                    ['name' => 'Замена мотора печки', 'slug' => 'zamena-motora-pechki', 'base_price' => 3000],
                    ['name' => 'Ремонт и замена вентилятора печки', 'slug' => 'remont-i-zamena-ventilyatora-pechki', 'base_price' => 3000],
                    ['name' => 'Ремонт и замена моторчика печки', 'slug' => 'remont-i-zamena-motorchika-pechki', 'base_price' => 0],
                    ['name' => 'Ремонт печки автомобиля', 'slug' => 'remont-pechki-avtomobilya', 'base_price' => 4500],
                    ['name' => 'Снятие/установка печки', 'slug' => 'snyatie-ustanovka-pechki', 'base_price' => 10500],
                    ['name' => 'Замена радиатора печки', 'slug' => 'zamena-radiatora-pechki', 'base_price' => 10500],
                    ['name' => 'Замена стартера', 'slug' => 'zamena-startera', 'base_price' => 2250],
                    ['name' => 'Ремонт стартера', 'slug' => 'remont-startera', 'base_price' => 4500],
                    ['name' => 'Замена замка зажигания', 'slug' => 'zamena-zamka-zazhiganiya', 'base_price' => 3000],
                    ['name' => 'Замена катушки зажигания', 'slug' => 'zamena-katushki-zazhiganiya', 'base_price' => 750],
                    ['name' => 'Ремонт системы зажигания', 'slug' => 'remont-sistemy-zazhiganiya', 'base_price' => 1500],
                    ['name' => 'Ремонт трамблера', 'slug' => 'remont-tramblera', 'base_price' => 0],
                    ['name' => 'Ремонт электрооборудования', 'slug' => 'remont-elektrooborudovaniya', 'base_price' => 1500],
                    ['name' => 'Ремонт электрики', 'slug' => 'remont-elektriki', 'base_price' => 750],
                    ['name' => 'Ремонт электропроводки', 'slug' => 'remont-elektroprovodki', 'base_price' => 750],
                    ['name' => 'Замена и ремонт трапеции дворников', 'slug' => 'zamena-i-remont-trapetsii-dvornikov', 'base_price' => 2250],
                    ['name' => 'Замена стеклоочистителя (дворника)', 'slug' => 'zamena-stekloochistitelya-dvornika', 'base_price' => 1500],
                    ['name' => 'Зарядка АКБ', 'slug' => 'zaryadka-akb', 'base_price' => 600],
                    ['name' => 'Проверка аккумулятора', 'slug' => 'proverka-akkumulyatora', 'base_price' => 450],
                    ['name' => 'Ремонт стеклоподъемника', 'slug' => 'remont-steklopodemnika', 'base_price' => 1500],
                    ['name' => 'Замена стеклоподъемника', 'slug' => 'zamena-steklopodemnika', 'base_price' => 1500],
                ],

            ],
            [
                'category' => ['name' => 'Ремонт глушителя', 'slug' => 'remont-glushitelya'],
                'services' => [
                    ['name' => 'Ремонт глушителя', 'slug' => 'remont-glushitelya', 'base_price' => 1500],
                    ['name' => 'Замена гофры', 'slug' => 'zamena-gofry', 'base_price' => 2250],
                    ['name' => 'Сварка глушителей', 'slug' => 'svarka-glushiteley', 'base_price' => 750],
                    ['name' => 'Замена катализатора на пламегаситель', 'slug' => 'zamena-katalizatora-na-plamegasitel', 'base_price' => 2250],
                    ['name' => 'Ремонт катализатора', 'slug' => 'remont-katalizatora', 'base_price' => 2250],
                    ['name' => 'Замена катализатора', 'slug' => 'zamena-katalizatora', 'base_price' => 1500],
                    ['name' => 'Удаление катализатора', 'slug' => 'udalenie-katalizatora', 'base_price' => 3000],
                    ['name' => 'Замена впускного коллектора', 'slug' => 'zamena-vpusknogo-kollektora', 'base_price' => 1500],
                    ['name' => 'Ремонт карбюратора', 'slug' => 'remont-karbyuratora', 'base_price' => 0],
                ],

            ],
            [
                'category' => ['name' => 'Ремонт ходовой', 'slug' => 'remont-khodovoy'],
                'services' => [
                    ['name' => 'Замена задней подвески', 'slug' => 'zamena-zadney-podveski', 'base_price' => 4500],
                    ['name' => 'Ремонт задней подвески', 'slug' => 'remont-zadney-podveski', 'base_price' => 1500],
                    ['name' => 'Замена амортизаторов', 'slug' => 'zamena-amortizatorov', 'base_price' => 3000],
                    ['name' => 'Замена задних амортизаторов', 'slug' => 'zamena-zadnih-amortizatorov', 'base_price' => 3000],
                    ['name' => 'Замена передних амортизаторов', 'slug' => 'zamena-perednih-amortizatorov', 'base_price' => 3300],
                    ['name' => 'Замена стоек амортизаторов', 'slug' => 'zamena-stoek-amortizatorov', 'base_price' => 3000],
                    ['name' => 'Замена втулок переднего стабилизатора', 'slug' => 'zamena-vtulok-perednego-stabilizatora', 'base_price' => 750],
                    ['name' => 'Замена втулок стабилизатора', 'slug' => 'zamena-vtulok-stabilizatora', 'base_price' => 750],
                    ['name' => 'Замена заднего стабилизатора', 'slug' => 'zamena-zadnego-stabilizatora', 'base_price' => 2700],
                    ['name' => 'Замена переднего стабилизатора', 'slug' => 'zamena-perednego-stabilizatora', 'base_price' => 2250],
                    ['name' => 'Замена стабилизаторов', 'slug' => 'zamena-stabilizatorov', 'base_price' => 2700],
                    ['name' => 'Замена стоек стабилизатора', 'slug' => 'zamena-stoek-stabilizatora', 'base_price' => 750],
                    ['name' => 'Замена передней подвески', 'slug' => 'zamena-peredney-podveski', 'base_price' => 6000],
                    ['name' => 'Замена рычага передней подвески', 'slug' => 'zamena-rychaga-peredney-podveski', 'base_price' => 1800],
                    ['name' => 'Ремонт передней подвески', 'slug' => 'remont-peredney-podveski', 'base_price' => 1500],
                    ['name' => 'Диагностика пневмоподвески', 'slug' => 'diagnostika-pnevmpodveski', 'base_price' => 1500],
                    ['name' => 'Ремонт пневмоподвески', 'slug' => 'remont-pnevmpodveski', 'base_price' => 6000],
                    ['name' => 'Диагностика подвески', 'slug' => 'diagnostika-podveski', 'base_price' => 750],
                    ['name' => 'Диагностика ходовой части', 'slug' => 'diagnostika-hodovoy-chasti', 'base_price' => 750],
                    ['name' => 'Замена подвески', 'slug' => 'zamena-podveski', 'base_price' => 4500],
                    ['name' => 'Замена ступицы', 'slug' => 'zamena-stupicy', 'base_price' => 3000],
                    ['name' => 'Замена подшипника передней ступицы', 'slug' => 'zamena-podshipnika-peredney-stupicy', 'base_price' => 2250],
                    ['name' => 'Замена подшипника ступицы', 'slug' => 'zamena-podshipnika-stupicy', 'base_price' => 2250],
                    ['name' => 'Замена опорного подшипника', 'slug' => 'zamena-opornogo-podshipnika', 'base_price' => 2250],
                    ['name' => 'Замена рычага подвески', 'slug' => 'zamena-rychaga-podveski', 'base_price' => 1800],
                    ['name' => 'Замена шаровой опоры', 'slug' => 'zamena-sharovoy-opory', 'base_price' => 750],
                    ['name' => 'Ремонт подвески', 'slug' => 'remont-podveski', 'base_price' => 3000],
                    ['name' => 'Ремонт ходовой части', 'slug' => 'remont-hodovoy-chasti', 'base_price' => 3000],
                    ['name' => 'Замена сайлентблоков подвески', 'slug' => 'zamena-silentblokov-podveski', 'base_price' => 1200],
                    ['name' => 'Замена сайлентблоков задней балки', 'slug' => 'zamena-silentblokov-zadney-balki', 'base_price' => 2250],
                ],
        ],
            [
                'category' => ['name' => 'Ремонт рулевого управления', 'slug' => 'remont-rulevogo-upravleniya'],
                'services' => [
                    ['name' => 'Диагностика рулевой рейки', 'slug' => 'diagnostika-rulevoy-reyki', 'base_price' => 750],
                    ['name' => 'Замена рулевой рейки', 'slug' => 'zamena-rulevoy-reyki', 'base_price' => 6000],
                    ['name' => 'Замена рулевой тяги', 'slug' => 'zamena-rulevoy-tyagi', 'base_price' => 750],
                    ['name' => 'Ремонт рулевой рейки', 'slug' => 'remont-rulevoy-reyki', 'base_price' => 22500],
                    ['name' => 'Замена насоса ГУР', 'slug' => 'zamena-nasosa-gur', 'base_price' => 3000],
                    ['name' => 'Ремонт насоса ГУР', 'slug' => 'remont-nasosa-gur', 'base_price' => 18000],
                    ['name' => 'Замена жидкости ГУР', 'slug' => 'zamena-zhidkosti-gur', 'base_price' => 1200],
                    ['name' => 'Замена гидроусилителя', 'slug' => 'zamena-gidrousilitelya', 'base_price' => 3750],
                    ['name' => 'Замена рулевых наконечников', 'slug' => 'zamena-rulevyh-nakonechnikov', 'base_price' => 750],
                    ['name' => 'Ремонт гидроусилителя руля', 'slug' => 'remont-gidrousilitelya-rulya', 'base_price' => 18000],
                    ['name' => 'Ремонт рулевого управления', 'slug' => 'remont-rulevogo-upravleniya', 'base_price' => 15000],
                ],

        ],
            [
                'category' => ['name' => 'Ремонт тормозной системы', 'slug' => 'remont-tormoznoy-sistemy'],
                'services' => [
                    ['name' => 'Замена задних тормозных дисков', 'slug' => 'zamena-zadnih-tormoznyh-diskov', 'base_price' => 1200],
                    ['name' => 'Замена передних тормозных дисков', 'slug' => 'zamena-perednih-tormoznyh-diskov', 'base_price' => 1500],
                    ['name' => 'Замена тормозных дисков', 'slug' => 'zamena-tormoznyh-diskov', 'base_price' => 1500],
                    ['name' => 'Замена задних тормозных колодок', 'slug' => 'zamena-zadnih-tormoznyh-kolodok', 'base_price' => 1200],
                    ['name' => 'Замена передних тормозных колодок', 'slug' => 'zamena-perednih-tormoznyh-kolodok', 'base_price' => 1200],
                    ['name' => 'Ремонт и обслуживание тормозного суппорта', 'slug' => 'remont-i-obsluzhivanie-tormoznogo-supporta', 'base_price' => 1200],
                    ['name' => 'Диагностика тормозной системы', 'slug' => 'diagnostika-tormoznoy-sistemy', 'base_price' => 750],
                    ['name' => 'Замена тормозной жидкости', 'slug' => 'zamena-tormoznoy-zhidkosti', 'base_price' => 1200],
                    ['name' => 'Замена тормозных трубок', 'slug' => 'zamena-tormoznyh-trubok', 'base_price' => 1800],
                    ['name' => 'Прокачка тормозов', 'slug' => 'prokachka-tormozov', 'base_price' => 1050],
                    ['name' => 'Ремонт и обслуживание тормозной системы', 'slug' => 'remont-i-obsluzhivanie-tormoznoy-sistemy', 'base_price' => 1500],
                    ['name' => 'Ремонт тормозных суппортов', 'slug' => 'remont-tormoznyh-supportov', 'base_price' => 6000],
                    ['name' => 'Ремонт ручного тормоза (ручник)', 'slug' => 'remont-ruchnogo-tormoza-ruchnik', 'base_price' => 1200],
                    ['name' => 'Замена тормозного цилиндра', 'slug' => 'zamena-tormoznogo-czilindra', 'base_price' => 1200],
                ],

        ],
            [
                'category' => ['name' => 'покраска кузова', 'slug' => 'pokraska-kuzova'],
                'services' => [
                    ['name' => 'Покраска бампера', 'slug' => 'pokraska-bampera', 'base_price' => 15000],
                    ['name' => 'Покраска двери автомобиля', 'slug' => 'pokraska-dveri-avtomobilya', 'base_price' => 15000],
                    ['name' => 'Покраска суппортов', 'slug' => 'pokraska-supportov', 'base_price' => 6000],
                    ['name' => 'Покраска элементов кузова', 'slug' => 'pokraska-elementov-kuzova', 'base_price' => 7500],
                    ['name' => 'Покраска деталей', 'slug' => 'pokraska-detaley', 'base_price' => 7500],
                    ['name' => 'Покраска капота', 'slug' => 'pokraska-kapota', 'base_price' => 18000],
                    ['name' => 'Покраска порогов', 'slug' => 'pokraska-porogov', 'base_price' => 6000],
                    ['name' => 'Покраска крыла', 'slug' => 'pokraska-kryla', 'base_price' => 12000],
                    ['name' => 'Покраска кузова', 'slug' => 'pokraska-kuzova', 'base_price' => 120000],
                    ['name' => 'Покраска автомобиля', 'slug' => 'pokraska-avtomobilya', 'base_price' => 120000],
                    ['name' => 'Локальная покраска автомобиля', 'slug' => 'lokalnaya-pokraska-avtomobilya', 'base_price' => 15000],
                    ['name' => 'Подбор краски', 'slug' => 'podbor-kraski', 'base_price' => 0],
                    ['name' => 'Покраска вмятины автомобиля', 'slug' => 'pokraska-vmyatiny-avtomobilya', 'base_price' => 0],
                    ['name' => 'Покраска сколов автомобиля', 'slug' => 'pokraska-skolov-avtomobilya', 'base_price' => 1500],
                    ['name' => 'Покраска царапин автомобиля', 'slug' => 'pokraska-tsarapin-avtomobilya', 'base_price' => 1500],
                ],

        ],
            [
                'category' => ['name' => 'кузовной ремонт', 'slug' => 'kuzovnoy-remont'],
                'services' => [
                    ['name' => 'Ремонт крышки багажника', 'slug' => 'remont-kryshki-bagazhnika', 'base_price' => 1500],
                    ['name' => 'Кузовной ремонт', 'slug' => 'kuzovnoy-remont', 'base_price' => 4500],
                    ['name' => 'Кузовные работы автомобиля', 'slug' => 'kuzovnye-raboty-avtomobilya', 'base_price' => 4500],
                    ['name' => 'Ремонт вмятин без покраски', 'slug' => 'remont-vmyatin-bez-pokraski', 'base_price' => 1500],
                    ['name' => 'Ремонт вмятин', 'slug' => 'remont-vmyatin', 'base_price' => 1500],
                    ['name' => 'Ремонт царапин', 'slug' => 'remont-tsarapin', 'base_price' => 1500],
                    ['name' => 'Ремонт сколов', 'slug' => 'remont-skolov', 'base_price' => 1500],
                    ['name' => 'Удаление вмятин без покраски', 'slug' => 'udalenie-vmyatin-bez-pokraski', 'base_price' => 3000],
                    ['name' => 'Ремонт боковых зеркал', 'slug' => 'remont-bokovyh-zerkal', 'base_price' => 2250],
                    ['name' => 'Ремонт бампера', 'slug' => 'remont-bampera', 'base_price' => 2250],
                    ['name' => 'Замена бампера', 'slug' => 'zamena-bampera', 'base_price' => 3000],
                    ['name' => 'Ремонт двери автомобиля', 'slug' => 'remont-dveri-avtomobilya', 'base_price' => 3000],
                    ['name' => 'Замена задней двери', 'slug' => 'zamena-zadney-dveri', 'base_price' => 3750],
                    ['name' => 'Замена передней двери', 'slug' => 'zamena-peredney-dveri', 'base_price' => 3750],
                    ['name' => 'Ремонт задней двери', 'slug' => 'remont-zadney-dveri', 'base_price' => 1500],
                    ['name' => 'Замена двери автомобиля', 'slug' => 'zamena-dveri-avtomobilya', 'base_price' => 3750],
                    ['name' => 'Ремонт передней двери', 'slug' => 'remont-peredney-dveri', 'base_price' => 1500],
                    ['name' => 'Ремонт крыла', 'slug' => 'remont-kryla', 'base_price' => 1500],
                    ['name' => 'Замена крыла', 'slug' => 'zamena-kryla', 'base_price' => 3000],
                    ['name' => 'Замена капота', 'slug' => 'zamena-kapota', 'base_price' => 3000],
                    ['name' => 'Ремонт капота', 'slug' => 'remont-kapota', 'base_price' => 2250],
                    ['name' => 'Ремонт крыши автомобиля', 'slug' => 'remont-kryshi-avtomobilya', 'base_price' => 6000],
                    ['name' => 'Ремонт порогов автомобиля', 'slug' => 'remont-porogov-avtomobilya', 'base_price' => 6000],
                ],
            ],
            [
                'category' => ['name' => 'замена автостекол', 'slug' => 'zamena-avtostekol'],
                'services' => [
                    ['name' => 'Замена заднего стекла', 'slug' => 'zamena-zadnego-stekla', 'base_price' => 6000],
                    ['name' => 'Ремонт заднего стекла', 'slug' => 'remont-zadnego-stekla', 'base_price' => 0],
                    ['name' => 'Ремонт лобового стекла', 'slug' => 'remont-lobovogo-stekla', 'base_price' => 0],
                    ['name' => 'Ремонт сколов на лобовом стекле', 'slug' => 'remont-skolov-na-lobovom-stekle', 'base_price' => 0],
                    ['name' => 'Ремонт трещин на лобовом стекле', 'slug' => 'remont-treschin-na-lobovom-stekle', 'base_price' => 0],
                    ['name' => 'Установка лобового стекла', 'slug' => 'ustanovka-lobovogo-stekla', 'base_price' => 7500],
                    ['name' => 'Вклейка стекол', 'slug' => 'vkleyka-stekol', 'base_price' => 7500],
                    ['name' => 'Замена лобового стекла', 'slug' => 'zamena-lobovogo-stekla', 'base_price' => 7500],
                    ['name' => 'Замена стекол', 'slug' => 'zamena-stekol', 'base_price' => 2250],
                    ['name' => 'Ремонт автостекол', 'slug' => 'remont-avtostekol', 'base_price' => 0],
                    ['name' => 'Ремонт сколов на стекле', 'slug' => 'remont-skolov-na-stekle', 'base_price' => 0],
                    ['name' => 'Ремонт сколов стекла', 'slug' => 'remont-skolov-stekla', 'base_price' => 0],
                    ['name' => 'Устранение царапин', 'slug' => 'ustranenie-tsarapin', 'base_price' => 3000],
                    ['name' => 'Ремонт трещин на стекле', 'slug' => 'remont-treschin-na-stekle', 'base_price' => 0],
                    ['name' => 'Ремонт трещины стекла', 'slug' => 'remont-treschiny-stekla', 'base_price' => 0],
                    ['name' => 'Ремонт стекол', 'slug' => 'remont-stekol', 'base_price' => 0],
                    ['name' => 'Установка стекол', 'slug' => 'ustanovka-stekol', 'base_price' => 2250],
                    ['name' => 'Замена автостекол', 'slug' => 'zamena-avtostekol', 'base_price' => 2250],
                    ['name' => 'Замена стекла двери', 'slug' => 'zamena-stekla-dveri', 'base_price' => 3000],
                    ['name' => 'Замена бокового стекла', 'slug' => 'zamena-bokovogo-stekla', 'base_price' => 3000],
                ],

        ],
            [
                'category' => ['name' => 'сварка автомобиля', 'slug' => 'svarka-avtomobilya'],
                'services' => [
                    ['name' => 'Сварка автомобиля', 'slug' => 'svarka-avtomobilya', 'base_price' => 1500],
                    ['name' => 'Сварка аргоном алюминия', 'slug' => 'svarka-argonom-alyuminia', 'base_price' => 1500],
                    ['name' => 'Ремонт алюминиевых топливных баков', 'slug' => 'remont-alyuminievyh-toplivnyh-bakov', 'base_price' => 3750],
                    ['name' => 'Ремонт трубок кондиционера', 'slug' => 'remont-trubok-kondicionera', 'base_price' => 2250],
                    ['name' => 'Сварка порогов', 'slug' => 'svarka-porogov', 'base_price' => 6000],
                    ['name' => 'Сварка деталей', 'slug' => 'svarka-detaley', 'base_price' => 1500],
                ],

        ],
            [
                'category' => ['name' => 'тюнинг авто', 'slug' => 'tyuning-avto'],
                'services' => [
                    ['name' => 'Тюнинг автомобиля', 'slug' => 'tyuning-avtomobilya', 'base_price' => 1500],
                    ['name' => 'Установка автозвука', 'slug' => 'ustanovka-avtozvuka', 'base_price' => 0],
                    ['name' => 'Установка автосигнализации', 'slug' => 'ustanovka-avtosignalizatsii', 'base_price' => 6000],
                    ['name' => 'Установка камеры заднего вида на автомобиль', 'slug' => 'ustanovka-kamery-zadnego-vida-na-avtomobil', 'base_price' => 6000],
                    ['name' => 'Установка ксенона в автомобиль', 'slug' => 'ustanovka-ksenona-v-avtomobil', 'base_price' => 6000],
                    ['name' => 'Установка сигнализации с автозапуском', 'slug' => 'ustanovka-signalizatsii-s-avtozapuskom', 'base_price' => 9000],
                    ['name' => 'Установка камеры заднего вида', 'slug' => 'ustanovka-kamery-zadnego-vida', 'base_price' => 3000],
                    ['name' => 'Установка сабвуфера', 'slug' => 'ustanovka-sabvufera', 'base_price' => 1500],
                    ['name' => 'Установка магнитолы', 'slug' => 'ustanovka-magnitoly', 'base_price' => 1500],
                    ['name' => 'Установка усилителя фаркопа', 'slug' => 'ustanovka-usilitelya-farkopa', 'base_price' => 7500],
                    ['name' => 'Установка парктроников', 'slug' => 'ustanovka-parktronikov', 'base_price' => 7500],
                ],

        ],
            [
                'category' => ['name' => 'ремонт автоматической коробки передач', 'slug' => 'remont-avtomaticheskoy-korobki-peredach'],
                'services' => [
                    ['name' => 'Адаптация АКПП', 'slug' => 'adaptatsiya-akpp', 'base_price' => 750],
                    ['name' => 'Диагностика АКПП', 'slug' => 'diagnostika-akpp', 'base_price' => 1500],
                    ['name' => 'Замена АКПП', 'slug' => 'zamena-akpp', 'base_price' => 9000],
                    ['name' => 'Замена привода АКПП', 'slug' => 'zamena-privoda-akpp', 'base_price' => 4500],
                    ['name' => 'Замена сальников АКПП', 'slug' => 'zamena-salnikov-akpp', 'base_price' => 2250],
                    ['name' => 'Капитальный ремонт АКПП', 'slug' => 'kapitalnyy-remont-akpp', 'base_price' => 15000],
                    ['name' => 'Ремонт АКПП', 'slug' => 'remont-akpp', 'base_price' => 7500],
                    ['name' => 'Ремонт и замена гидроблока АКПП', 'slug' => 'remont-i-zamena-gidrobloka-akpp', 'base_price' => 9000],
                    ['name' => 'Ремонт гидроблока', 'slug' => 'remont-gidrobloka', 'base_price' => 12000],
                    ['name' => 'Замена гидроблока', 'slug' => 'zamena-gidrobloka', 'base_price' => 9000],
                    ['name' => 'Ремонт дифференциала', 'slug' => 'remont-differentsiala', 'base_price' => 9000],
                    ['name' => 'Регулировка дифференциала', 'slug' => 'regulirovka-differentsiala', 'base_price' => 9000],
                    ['name' => 'Замена масла в дифференциале', 'slug' => 'zamena-masla-v-differentsiale', 'base_price' => 1500],
                    ['name' => 'Ремонт гидротрансформатора', 'slug' => 'remont-gidrottransformatora', 'base_price' => 4500],
                    ['name' => 'Ремонт и замена гидротрансформатора АКПП', 'slug' => 'remont-i-zamena-gidrottransformatora-akpp', 'base_price' => 9000],
                    ['name' => 'Замена гидротрансформатора', 'slug' => 'zamena-gidrottransformatora', 'base_price' => 9000],
                    ['name' => 'Ремонт и замена селектора АКПП', 'slug' => 'remont-i-zamena-selektora-akpp', 'base_price' => 1500],
                    ['name' => 'Ремонт и замена соленоидов АКПП', 'slug' => 'remont-i-zamena-solenoidov-akpp', 'base_price' => 3000],
                    ['name' => 'Ремонт коробки автомат', 'slug' => 'remont-korobki-avtomat', 'base_price' => 15000],
                    ['name' => 'Ремонт и замена электронного блока управления', 'slug' => 'remont-i-zamena-elektronnogo-bloka-upravleniya', 'base_price' => 10500],
                    ['name' => 'Замена фильтра АКПП', 'slug' => 'zamena-filtra-akpp', 'base_price' => 3000],
                    ['name' => 'Ремонт PowerShift', 'slug' => 'remont-powershift', 'base_price' => 7500],
                    ['name' => 'Ремонт ZF', 'slug' => 'remont-zf', 'base_price' => 7500],
                    ['name' => 'Ремонт вариатора', 'slug' => 'remont-variatora', 'base_price' => 7500],
                    ['name' => 'Ремонт CVT', 'slug' => 'remont-cvt', 'base_price' => 7500],
                    ['name' => 'Замена масла в вариаторе', 'slug' => 'zamena-masla-v-variatore', 'base_price' => 3000],
                ],

        ],
            [
                'category' => ['name' => 'ремонт коробки dsg', 'slug' => 'remont-korobki-dsg'],
                'services' => [
                    ['name' => 'Ремонт коробки DSG 6', 'slug' => 'remont-korobki-dsg-6', 'base_price' => 9300],
                    ['name' => 'Ремонт коробки DSG 7', 'slug' => 'remont-korobki-dsg-7', 'base_price' => 14100],
                    ['name' => 'Диагностика DSG', 'slug' => 'diagnostika-dsg', 'base_price' => 1500],
                    ['name' => 'Замена сцепления DSG', 'slug' => 'zamena-stsepleniya-dsg', 'base_price' => 7500],
                    ['name' => 'Диагностика сцепления DSG', 'slug' => 'diagnostika-stsepleniya-dsg', 'base_price' => 1500],
                    ['name' => 'Диагностика мехатроника', 'slug' => 'diagnostika-mekhatronika', 'base_price' => 1500],
                    ['name' => 'Ремонт мехатроника DSG', 'slug' => 'remont-mekhatronika-dsg', 'base_price' => 28200],
                    ['name' => 'Ремонт мехатроника DSG 6', 'slug' => 'remont-mekhatronika-dsg-6', 'base_price' => 28200],
                    ['name' => 'Ремонт мехатроника DSG 7', 'slug' => 'remont-mekhatronika-dsg-7', 'base_price' => 42150],
                ],
        ],
            [
                'category' => ['name' => 'сход-развал', 'slug' => 'skhod-razval'],
                'services' => [
                    ['name' => 'Сход-развал', 'slug' => 'skhod-razval', 'base_price' => 1500],
                ],
        ],
            [
                'category' => ['name' => 'шиномонтаж', 'slug' => 'shinomonatzh'],
                'services' => [
                    ['name' => 'Шиномонтаж', 'slug' => 'shinomontazh', 'base_price' => 1500],
                    ['name' => 'Шиномонтаж R-13 радиус', 'slug' => 'shinomontazh-r-13-radius', 'base_price' => 1050],
                    ['name' => 'Шиномонтаж R-14 радиус', 'slug' => 'shinomontazh-r-14-radius', 'base_price' => 1200],
                    ['name' => 'Шиномонтаж R-15 радиус', 'slug' => 'shinomontazh-r-15-radius', 'base_price' => 1350],
                    ['name' => 'Шиномонтаж R-16 радиус', 'slug' => 'shinomontazh-r-16-radius', 'base_price' => 1500],
                    ['name' => 'Шиномонтаж R-17 радиус', 'slug' => 'shinomontazh-r-17-radius', 'base_price' => 1800],
                    ['name' => 'Шиномонтаж R-18 радиус', 'slug' => 'shinomontazh-r-18-radius', 'base_price' => 2100],
                    ['name' => 'Шиномонтаж R-19 радиус', 'slug' => 'shinomontazh-r-19-radius', 'base_price' => 2400],
                    ['name' => 'Шиномонтаж R-20 радиус', 'slug' => 'shinomontazh-r-20-radius', 'base_price' => 3000],
                    ['name' => 'Шиномонтаж R-21 радиус', 'slug' => 'shinomontazh-r-21-radius', 'base_price' => 3000],
                    ['name' => 'Шиномонтаж R-22 радиус', 'slug' => 'shinomontazh-r-22-radius', 'base_price' => 3600],
                ],
        ],
        ];

        foreach ($serviceData as $categoryData) {
            $category = new ServiceCategory();
            $category->setName($categoryData['category']['name']);
            $category->setSlug($categoryData['category']['slug']);
            $manager->persist($category);

            foreach ($categoryData['services'] as $serviceInfo) {
                $service = new Service();
                $service->setCategory($category);
                $service->setName($serviceInfo['name']);
                $service->setSlug($serviceInfo['slug']);
                $service->setBasePrice(round($serviceInfo['base_price'] * 0.95));
                $manager->persist($service);
            }
        }



        /* ModelServicePrice */
        /*$price = new ModelServicePrice();
        $price->setModel($models[0]); // C-Class
        $price->setService($service);
        $price->setPrice(4500);
        $manager->persist($price);*/

        /* Promotions */
        $promoData = [
            [
                'title' => 'скидка 25% по воскресеньям',
                'description' => 'На весь ремонт и обслуживание #BRAND_RU# #MODEL_RU#',
                'active' => true,
            ],
            [
                'title' => 'бесплатная диагностика подвески при первом посещении',
                'description' => ' диагностика ходовой части #BRAND_EN# #MODEL_EN# в подарок',
                'active' => true,
            ],
            [
                'title' => 'чистка двигателя грецких орехом',
                'description' => 'Все автомобили #BRAND_EN# c дизельными двигателями системы
Common Rail + промывка и ремонт форсунок
',
                'active' => true,
            ],
            [
                'title' => 'бесплатное хранение шин',
                'description' => 'При проведении у нас шиномонтажа, хранение шин
                          бесплатно',
                'active' => true,
            ],
            [
                'title' => 'Скидка 20% при первом обращении и 25% скидка на
                                        повторный ремонт и обслуживание',
                'description' => '',
                'active' => true,
            ],
            [
                'title' => 'Бесплатная замена масла и фильтров',
                'description' => 'При покупке масла и масляного фильтра в нашем сервисе, замена масла и фильтра бесплатно',
                'active' => true,
            ],
        ];

        foreach ($promoData as $promoItem) {
            $promo = new Promotion();
            $promo->setTitle($promoItem['title']);
            $promo->setDescription($promoItem['description']);
            $promo->setActive($promoItem['active']);
            $manager->persist($promo);
        }

        $manager->flush();
    }
}
