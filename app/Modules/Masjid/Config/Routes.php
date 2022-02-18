<?php

namespace App\Modules\Config;

$routes->group(ADMIN_AREA, ['namespace' => '\App\Modules\Masjid\Controllers'], static function ($routes) {
    $routes->resource('masjid/pengurus', ['controller' => 'PengurusController']);
    $routes->resource('masjid/jabatan', ['controller' => 'JabatanController']);
    $routes->resource('masjid/wilayah', ['controller' => 'WilayahController']);
    $routes->resource('masjid/member', ['controller' => 'MemberController']);
});
