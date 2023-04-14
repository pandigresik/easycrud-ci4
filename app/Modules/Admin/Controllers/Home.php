<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\AdminCrudController;

class Home extends AdminCrudController
{
    protected $viewPrefix = 'App\Modules\Admin\Views\\';
    public function index()
    {
        return $this->render($this->viewPrefix . 'dashboard');
    }
}
