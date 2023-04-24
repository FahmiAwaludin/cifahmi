<?php

namespace App\Models;

use CodeIgniter\Model;

class menupegawai extends Model
{
    protected $table    = 'pegawai';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_pegawai', 'email','no_hp' ,'shift' ,'kondisi' ,'tanggal'];
    public function main_menu(){
        return $this->findAll();
    }
}