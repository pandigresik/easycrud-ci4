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

use Sparks\Shield\Models\UserIdentityModel;

class UserRules
{
    /**
     * Checks a user has a unique email within all of the email_password identities.
     */
    public function unique_email(string $value, string $fields, array $data): bool
    {

        $row = model(UserIdentityModel::class)                
                ->where('type', 'email_password')
                ->where('secret', $value);
        if($fields !== '{id}'){
            $row->where('user_id !=', $fields);
        }
        return $row->countAllResults() === 0;        
    }
}
