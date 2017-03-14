<?php

return [
    'adapters' => [
        'mongo' => [
            // The database connection in config/database.php
            'connection' => 'mongo',

            // The Mongo collection
            'collection' => 'logs',
        ],
    ],

    'enabled_adapter' => \SmoothPhp\RequestLogger\Request\Adapter\MongoAdapter::class,
];