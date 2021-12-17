<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Modules\Config;

$routes->group(ADMIN_AREA, ['namespace' => '\App\Modules\Guides\Controllers'], static function ($routes) {
    $routes->get('guides', 'GuidesController::viewCollections', ['as' => 'guides']);
    $routes->get('guides/(:segment)', 'GuidesController::viewCollection/$1', ['as' => 'view-guide-collection']);
    $routes->get('guides/(:segment)/(:any)', 'GuidesController::viewSingle/$1/$2', ['as' => 'view-guide']);
});
