<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $useTimesStamps = true;
    protected $allowedFields = ['nama', 'slug', 'nrp', 'alamat', 'sampul'];


    public function getPegawai($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
