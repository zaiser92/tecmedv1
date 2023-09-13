<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function acceso()
    {
        echo view('menu');
        echo view('panel_control');
        echo view('footer');
    }
}
