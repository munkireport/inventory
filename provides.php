<?php

return [
    'client_tabs' => [
        'inventory-items' => [
            'view' => 'inventory_items_tab',
            'i18n' => 'inventory.inventory_items',
            'badge' => 'inventory-cnt'
        ],
    ],
    'listings' => [
        'inventory' => ['view' => 'inventory_listing', 'i18n' => 'inventory.listing',],
    ],
    'widgets' => [
        'app' => ['view' => 'app_widget'],
    ],
    'reports' => [
        'appVersions' => ['view' => 'appVersions', 'i18n' => 'inventory.appversions_report',],
    ]
];
