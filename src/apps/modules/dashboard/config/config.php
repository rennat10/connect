<?php

use Phalcon\Config;

return new Config(
    [
        'database' => [
            'adapter' => getenv('DB_ADAPTER'),
            'host' => getenv('DB_HOST'),
            'dbname' => getenv('DB_NAME'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
        ],
    ]
);