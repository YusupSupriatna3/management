<?php

return [
    'oracle' => [
        'driver'         => 'oracle',
        'tns'            => env('DB_TNS', '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.60.185.140)(PORT=1521))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=desdbn)))'),
        'host'           => env('DB_HOST', '10.60.185.140'),
        'port'           => env('DB_PORT', '1521'),
        'database'       => env('DB_DATABASE', ''),
        'username'       => env('DB_USERNAME', 'DES_USR'),
        'password'       => env('DB_PASSWORD', 'desusr#123'),
        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
    ],
];
