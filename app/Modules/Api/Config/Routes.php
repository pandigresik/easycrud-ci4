<?php

namespace Config;

$routes->group('/api', ['namespace' => 'App\Modules\Api\Controllers'], static function ($routes) {
    $routes->resource('autoResponses');
    $routes->resource('contacts');
    $routes->resource('projects');
});
