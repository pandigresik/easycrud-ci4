<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Modules\Admin;

use Bonfire\Core\BaseModule;
use Bonfire\Menus\MenuItem;

/**
 * Email Module setup
 */
class Module extends BaseModule
{
    public $inAdmin = true;
    /**
     * Setup our admin area needs.
     */
    public function initAdmin()
    {
        // $menus = service('menus');
        // // Settings menu for sidebar
        // $sidebar = service('menus');
        // $menus->menu('sidebar')
        //     ->createCollection('bot', 'Bot')
        //     ->setFontAwesomeIcon('fas fa-cog')
        //     ->setCollapsible();
        // $itemContacts = new MenuItem([
        //     'title'           => 'Contacts',
        //     'url'             => url_to('\App\Modules\Admin\Controllers\Contacts::index'),
        //     'fontAwesomeIcon' => 'fas fa-phone',
        //     'permission'      => 'admin.settings',
        // ]);

        // $itemProjects = new MenuItem([
        //     'title'           => 'Projects',
        //     'url'             => url_to('\App\Modules\Admin\Controllers\Projects::index'),
        //     'fontAwesomeIcon' => 'fas fa-books',
        //     'permission'      => 'logs.view',
        // ]);

        // $itemResponses = new MenuItem([
        //     'title'           => 'Auto Response',
        //     'url'             => url_to('\App\Modules\Admin\Controllers\AutoResponses::index'),
        //     'fontAwesomeIcon' => 'fas fa-recycle',
        //     'permission'      => 'logs.view',
        // ]);
        // $sidebar->menu('sidebar')->collection('bot')->addItem($itemContacts);
        // $sidebar->menu('sidebar')->collection('bot')->addItem($itemProjects);
        // $sidebar->menu('sidebar')->collection('bot')->addItem($itemResponses);
    }
}
