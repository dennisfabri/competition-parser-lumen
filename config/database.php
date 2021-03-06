<?php

use Illuminate\Support\Str;

$connections = [];

$connections['local'] = [
    'driver' => 'pgsql',
    'host' => env('DB_HOST_LOCAL'),
    'port' => env('DB_PORT_LOCAL'),
    'database' => env('DB_DATABASE_LOCAL'),
    'username' => env('DB_USERNAME_LOCAL'),
    'password' => env('DB_PASSWORD_LOCAL'),
];

$connections['sqlite'] = [
    'driver' => 'sqlite',
    'url' => env('DATABASE_URL'),
    'database' => env('DB_DATABASE', database_path('database.sqlite')),
    'prefix' => '',
    'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
];

if (ENV('DB_LSR_HOST_LOCAL')) {
    $connections['lsr_local'] = [
        'driver' => 'pgsql',
        'host' => env('DB_LSR_HOST_LOCAL'),
        'port' => env('DB_LSR_PORT_LOCAL'),
        'database' => env('DB_LSR_DATABASE_LOCAL'),
        'username' => env('DB_LSR_USERNAME_LOCAL'),
        'password' => env('DB_LSR_PASSWORD_LOCAL'),
    ];
}

if (ENV('DB_LSR_HOST_STAGING')) {
    $connections['lsr_staging'] = [
        'driver' => 'pgsql',
        'host' => env('DB_LSR_HOST_STAGING'),
        'port' => env('DB_LSR_PORT_STAGING'),
        'database' => env('DB_LSR_DATABASE_STAGING'),
        'username' => env('DB_LSR_USERNAME_STAGING'),
        'password' => env('DB_LSR_PASSWORD_STAGING'),
    ];
}

if (ENV('DB_LSR_HOST_PRODUCTION')) {
    $connections['lsr_production'] = [
        'driver' => 'pgsql',
        'host' => env('DB_LSR_HOST_PRODUCTION'),
        'port' => env('DB_LSR_PORT_PRODUCTION'),
        'database' => env('DB_LSR_DATABASE_PRODUCTION'),
        'username' => env('DB_LSR_USERNAME_PRODUCTION'),
        'password' => env('DB_LSR_PASSWORD_PRODUCTION'),
    ];
}

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => $connections,

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
