<?php

namespace App\Models;

use CodeIgniter\Model;

class menupasien extends Model
{
    protected $table    = 'pasien';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_pasien', 'umur','nama_kamar','jenis_kelamin' ,'jenis_kamar' ,'alamat'];
    public function main_menu(){
        return $this->findAll();
    }
}