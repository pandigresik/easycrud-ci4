<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Controllers;

/**
 * Class Dashboard
 *
 * The primary entry-point to the Bonfire admin area.
 */
class Dashboard extends AdminController
{
    /**
     * Displays the site's initial page.
     */
    public function index()
    {
        echo $this->render('App\Modules\Assets\Views\dashboard', []);
    }
}
