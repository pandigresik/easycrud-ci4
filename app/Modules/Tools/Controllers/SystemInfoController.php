<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Modules\Tools\Controllers;

use App\Controllers\AdminController;
use CodeIgniter\CodeIgniter;

class SystemInfoController extends AdminController
{

    protected $viewPrefix = 'App\Modules\Tools\Views\\';

    /**
     * Displays basic information about the site.
     *
     * @return string
     */
    public function index()
    {
        global $app;
        $db = db_connect();

        helper('filesystem');
        helper('number');

        return $this->render($this->viewPrefix . 'index', [
            'ciVersion'  => CodeIgniter::CI_VERSION,
            'dbDriver'   => $db->DBDriver,
            'dbVersion'  => $db->getVersion(),
            'serverLoad' => current(sys_getloadavg()),
        ]);
    }

    /**
     * Displays Detailed PHP Info
     */
    public function phpInfo()
    {
        echo phpinfo();
    }
}
