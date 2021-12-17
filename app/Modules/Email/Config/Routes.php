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

$routes->group(ADMIN_AREA, ['namespace' => '\App\Modules\Email\Controllers'], static function ($routes) {
    $routes->get('settings/email', 'EmailSettingsController::index', ['as' => 'email-settings']);
    $routes->post('settings/email', 'EmailSettingsController::save');
});
