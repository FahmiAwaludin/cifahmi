<?php

namespace App\Controllers;
use App\Models\Menu;

class Home extends BaseController
{
    protected $menuModel;
    
    public function __construct()
    {
        $this->menuModel = new menu();
    }
    public function index()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    
}