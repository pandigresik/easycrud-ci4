<?php

namespace App\Controllers;

use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Config\Database;

class AdminController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Pagination should use Bonfire's pagination views
        $config            = config('Pager');
        $config->templates = [
            'default_full'   => 'Bonfire\Views\_pager_full',
            'default_simple' => 'Bonfire\Views\_pager_simple',
            'default_head'   => 'Bonfire\Views\_pager_head',
        ];
        Factories::injectMock('config', 'Pager', $config);

        parent::initController($request, $response, $logger);
    }

    protected function writeLog()
    {
        if (ENVIRONMENT !== 'production') {
            $query = $this->db->getLastQuery();
            log_message('critical', (string) $query);
        }
    }
}
