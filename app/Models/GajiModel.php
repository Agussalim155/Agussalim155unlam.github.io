<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiModel extends Model
{
    protected $table = 'gaji';
    protected $useTimesStamps = true;
    protected $allowedFields = ['nama', 'slug', 'jenis', 'jumlah', 'sampul'];


    public function getGaji($jenis = false)
    {
        if ($jenis == false) {
            return $this->findAll();
        }

        return $this->where(['jenis' => $jenis])->first();
    }
}