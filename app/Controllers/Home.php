<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        return view('home');
    }

    public function aboutus()
    {
        return view('aboutus');
    }

    public function shops()
    {
        return view('shops');
    }
}
