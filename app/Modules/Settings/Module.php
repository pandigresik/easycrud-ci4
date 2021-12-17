<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Modules\Settings;

use App\Config\BaseModule;
use App\Libraries\Menus\MenuItem;

/**
 * Email Module setup
 */
class Module extends BaseModule
{
    /**
     * Setup our admin area needs.
     */
    public function initAdmin()
    {
        // Settings menu for sidebar
        $sidebar = service('menus');
        $item    = new MenuItem([
            'title'           => 'General',
            'namedRoute'      => 'general-settings',
            'fontAwesomeIcon' => 'fas fa-cog',
        ]);
        $sidebar->menu('sidebar')->collection('settings')->addItem($item);
    }
}
