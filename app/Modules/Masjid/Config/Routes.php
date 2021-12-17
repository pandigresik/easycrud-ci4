<?php

namespace App\Modules\Config;

$routes->group(ADMIN_AREA, ['namespace' => '\App\Modules\Masjid\Controllers'], function ($routes) {    
    $routes->resource('masjid/pengurus',['controller' => 'PengurusController']);
    $routes->resource('masjid/jabatan',['controller' => 'JabatanController']);
});
