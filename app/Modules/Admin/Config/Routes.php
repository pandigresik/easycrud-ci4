<?php

namespace Config;

$routes->group('/admin', ['namespace' => 'App\Modules\Admin\Controllers'], static function ($routes) {
    $routes->get('/', 'Home::index');
    // $routes->resource('autoResponses');
    // $routes->post('autoResponses/list', 'AutoResponses::list');    
});
