<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Modules\Search\Config;

$routes->group(ADMIN_AREA, ['namespace' => '\App\Modules\Search\Controllers'], static function ($routes) {
    $routes->post('search', 'SearchController::overview', ['as' => 'search']);
});
