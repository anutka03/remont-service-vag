<?php

namespace App\Service;

class MetaTemplates
{
    public const PAGE_TYPES = [
        'home' => [
            'title' => ' Ремонт автомобилей Vag в Москве - «ВАГ Сервис»',
            'description' => 'Ремонт автомобилей Vag цена в Москве. 🚩 Специализированный автосервис Ваг. ✔ Скидка 20% при первом обращении. ✔ Гарантия на ремонт до 900 дней.',
        ],
        'brand' => [
            'title' => 'Ремонт #BRAND_RU# цена в Москве - Автосервис #BRAND_EN# Ваг Сервис',
            'description' => 'Ремонт #BRAND_EN# цена в Москве. 🚩 Специализированный автосервис #BRAND_RU#. ✔️ Скидка 20% при первом обращении. ✔️ Гарантия на ремонт #BRAND_RU# до 900 дней.',
        ],
        'model' => [
            'title' => 'Ремонт #BRAND_RU# (#BRAND_EN# #MODEL_EN#) цена в Москве - Автосервис #BRAND_EN# Ваг Сервис',
            'description' => 'Ремонт #BRAND_EN# #MODEL_EN# цена в Москве. 🚩 Специализированный автосервис #BRAND_RU#. ✔️ Скидка 20% при первом обращении. ✔️ Гарантия на ремонт #BRAND_RU# #MODEL_RU# до 900 дней.',
        ],
        'service_model' => [
            'title' => '#SERVICE_NAME# #BRAND_RU# (#BRAND_EN# #MODEL_EN#) цена в Москве - Автосервис #BRAND_EN# Ваг Сервис',
            'description' => '#SERVICE_NAME# #BRAND_EN# #MODEL_EN# цена в Москве. 🚩 Специализированный автосервис #BRAND_RU#. ✔️ Скидка 20% при первом обращении. ✔️.Запчасти в наличии.',
        ],
        'service' => [
            'title' => '#SERVICE_NAME# #BRAND_RU# цена в Москве - Автосервис #BRAND_EN# Ваг Сервис',
            'description' => '#SERVICE_NAME# #BRAND_EN# цена в Москве. 🚩 Специализированный автосервис #BRAND_RU#. ✔️ Скидка 20% при первом обращении. ✔️.Запчасти в наличии.',
        ],
    ];

    public function getTemplate(string $pageType): array
    {
        return self::PAGE_TYPES[$pageType] ?? [];
    }
}

