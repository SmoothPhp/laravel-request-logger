<?php

return [
    'adapters' => [
        'mongo' => [
            // The database connection in config/database.php
            'connection' => 'mongo',

            // The Mongo collection
            'collection' => 'logs',
        ],

        'filesystem' => [
            // The disk to use defined in config/filesystems.php
            'disk' => 'local',

            // The format to supply to DateTime::format() to create the filename
            'file_name_format' => 'Y-m-d H:i:s.u',
        ],
    ],

    'enabled_adapter' => \SmoothPhp\RequestLogger\Request\Adapter\MongoAdapter::class,
];