<?php

namespace App\Models;

use CodeIgniter\Model;

class menu1 extends Model
{
    protected $table    = 'menus';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['menu_id', 'menu_level','title' ,'icon' ,'link' ,'parent_id' , 'is_active'];
    public function main_menu(){
        return $this->where('menu_level',0)->findAll();
    }
    public function sub_menu($parent_id){
        return $this->where('menu_level', 1)
        ->where('parent_id', $parent_id)->findAll();
    }
}