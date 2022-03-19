<?php
return [
    [
        'icon' => 'fa-solid fa-house',
        'label' => 'admin.nav.dashboard',
        'route' => 'admin.index',
        //'submenu' => [
        //    [
        //        //'icon' => 'fas fa-tachometer-alt',
        //        'label' => 'Submenu 1',
        //        'route' => 'test',
        //    ],
        //    [
        //        //'icon' => 'fas fa-tachometer-alt',
        //        'label' => 'Submenu 2',
        //        'route' => 'test',
        //    ],
        //],
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
        ],
        //'route' => 'test',
    ],
    //[
    //    'icon' => 'far fa-circle ',
    //    'label' => 'Inactive Page',
    //    'route' => 'test',
    //],
    //[
    //    'icon' => 'fas fa-th',
    //    'label' => 'Simple Link',
    //    'route' => 'test',
    //],
];
