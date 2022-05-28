<?php
return [
    [
        'icon' => 'fa-solid fa-house',
        'label' => 'admin.nav.dashboard',
        'route' => 'admin.index',
    ],
    [
        'icon' => 'fa-solid fa-newspaper',
        'label' => 'admin.nav.article',
        'submenu' => [
            [
                'icon' => 'far fa-circle nav-icon',
                'label' => 'admin.nav.article-category',
                'route' => 'admin.article-category.index',
            ],
            [
                'icon' => 'far fa-circle nav-icon',
                'label' => 'admin.nav.article',
                'route' => 'admin.article.index',
            ],
        ],
    ],
    [
        'icon' => 'fa-solid fa-gear',
        'label' => 'admin.nav.features',
        'submenu' => [
            [
                'icon' => 'far fa-circle nav-icon',
                'label' => 'admin.nav.constant',
                'route' => 'admin.constant.index',
            ],
            [
                'icon' => 'far fa-circle nav-icon',
                'label' => 'admin.nav.seo',
                'route' => 'admin.seo.index',
            ],
        ],
    ],
];
