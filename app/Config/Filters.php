<?php

namespace Config;

use App\Filters\ApiAuth;
use CodeIgniter\Filters\CSRF;
use App\Filters\OnlineCheck;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Config\BaseConfig;
use Sparks\Shield\Filters\ChainAuth;
use Sparks\Shield\Filters\TokenAuth;
use CodeIgniter\Filters\DebugToolbar;
use Sparks\Shield\Filters\SessionAuth;
use App\Modules\Consent\Filters\ConsentFilter;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'session'  => SessionAuth::class,
        'tokens'   => TokenAuth::class,
        'chain'    => ChainAuth::class,
        'online'  => OnlineCheck::class,
        'consent' => ConsentFilter::class,
        'api'      => ApiAuth::class, 
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'online' => ['except' => 'site-offline'],
        ],
        'after'  => [
            'toolbar',
            'consent' => ['except' => ADMIN_AREA.'*'],
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        'session' => [
            'before' => [ADMIN_AREA.'*']
        ],
    ];
}
