<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Modules\Tools\Config;

$routes->get(ADMIN_AREA . '/tools/system-info', '\App\Modules\Tools\Controllers\SystemInfoController::index', ['as' => 'sys-info']);
$routes->get(ADMIN_AREA . '/tools/php-info', '\App\Modules\Tools\Controllers\SystemInfoController::phpInfo');
$routes->match(['get', 'post'], ADMIN_AREA . '/tools/logs', '\App\Modules\Tools\Controllers\LogsController::index', ['as' => 'sys-logs']);
$routes->get(ADMIN_AREA . '/tools/view-log/(:segment)', '\App\Modules\Tools\Controllers\LogsController::view/$1', ['as' => 'view-log']);
$routes->post(ADMIN_AREA . '/tools/delete-log', '\App\Modules\Tools\Controllers\LogsController::delete', ['as' => 'log-delete']);
