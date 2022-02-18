<?php

namespace App\Controllers;

class Swagger extends BaseController
{
    public function index()
    {
        return view('swagger/index');
    }
}
