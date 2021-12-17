<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Modules\Users\Libraries;

/**
 * Provides view cells for Users
 */
class UserCells
{
    protected $viewPrefix = 'App\Modules\Users\Views\\';

    /**
     * Displays the form fields for user meta fields.
     */
    public function metaFormFields()
    {
        return view($this->viewPrefix . 'meta/list', [
            'fieldGroups' => setting('Users.metaFields'),
        ]);
    }
}
