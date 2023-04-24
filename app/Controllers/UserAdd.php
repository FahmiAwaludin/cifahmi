<?php

namespace App\Controllers;
use App\Models\MenuList;

class UserAdd extends BaseController
{
    protected $menuModel;
    
    public function __construct()
    {
        $this->menuModel = new menulist();
    }
    public function index()
    {
        return view('user/list/FormPegawai');
    }
}