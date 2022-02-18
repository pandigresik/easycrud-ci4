<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Modules\Api\Traits;

use App\Modules\Api\Entities\User;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * Provides common, more readable, methods to provide
 * consistent HTTP responses under a variety of common
 * situations when working as an API.
 *
 * @property IncomingRequest $request
 * @property Response        $response
 */
use CodeIgniter\HTTP\Response;
use Sparks\Shield\Entities\AccessToken;

trait HasTokenTrait
{
    protected function getTokenSecret(User $user): string
    {
        helper('text');
        $identities = model(UserIdentityModel::class);
        $token      = $identities
            ->where('type', 'access_token')
            ->where('user_id', $user->id)
            // ->where('secret', hash('sha256', $credentials['token']))
            ->asObject(AccessToken::class)
            ->first();

        if ($token) {
            return $token->secret2;
        }
        $tokenStr = random_string('sha1');
        $newToken = hash('sha256', $tokenStr);
        model(UserIdentityModel::class)->insert([
            'user_id' => $user->id,
            'type'    => 'access_token',
            'secret'  => $newToken,
            'secret2' => $tokenStr,
        ]);

        return $tokenStr;
    }
}
