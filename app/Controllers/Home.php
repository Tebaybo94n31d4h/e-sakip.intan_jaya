<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('home/home');
    }
    
    public function rpjmd()
    {
        return view('home/rpjmd');
    }
}
