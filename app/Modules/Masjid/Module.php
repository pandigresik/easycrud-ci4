<?php

namespace App\Modules\Masjid;

use App\Config\BaseModule;
use App\Libraries\Menus\MenuItem;

/**
 * Pengurus Module setup.
 */
class Module extends BaseModule
{
    /**
     * Setup our admin area needs.
     */
    public function initAdmin()
    {
        helper('url');
        // Settings menu for sidebar
        $sidebar = service('menus');

        // Content Menu for sidebar
        $pengurusItem = new MenuItem([
            'title' => 'Pengurus',
            'url' => url_to('App\Modules\Masjid\Controllers\PengurusController::index'),
            'fontAwesomeIcon' => 'fas fa-users',
        ]);
        $jabatanItem = new MenuItem([
            'title' => 'Jabatan',
            'url' => url_to('App\Modules\Masjid\Controllers\JabatanController::index'),
            'fontAwesomeIcon' => 'fas fa-users',
        ]);
        $sidebar->menu('sidebar')->collection('masjid')->addItem($jabatanItem);
        $sidebar->menu('sidebar')->collection('masjid')->addItem($pengurusItem);        
    }
}
