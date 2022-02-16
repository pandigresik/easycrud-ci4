<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Bonfire\Modules\Widgets\Config;

use CodeIgniter\Config\BaseConfig;

class Stats extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Show the Link "View Detail"
     * --------------------------------------------------------------------------
     */
    public bool $stats_showLink = true;
}
