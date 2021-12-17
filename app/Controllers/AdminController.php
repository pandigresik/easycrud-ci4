<?php

namespace App\Controllers;

use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class AdminController extends BaseController
{
    /**
     * The theme to use.
     *
     * @var string
     */
    protected $theme = 'Admin';
    
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Pagination should use Bonfire's pagination views
        $config = config('Pager');
        $config->templates = [
            'default_full' => 'App\Views\_pager_full',
            'default_simple' => 'App\Views\_pager_simple',
            'default_head' => 'App\Views\_pager_head',
        ];
        Factories::injectMock('config', 'Pager', $config);

        parent::initController($request, $response, $logger);
    }
}
