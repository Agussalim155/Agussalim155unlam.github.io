<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluarModel extends Model
{
    protected $table = 'keluar';
    protected $useTimesStamps = true;
    protected $allowedFields = ['nomor', 'tanggal', 'uraian', 'pengeluaran', 'saldo'];


    public function getKeluar($nomor = false)
    {
        if ($nomor == false) {
            return $this->findAll();
        }

        return $this->where(['nomor' => $nomor])->first();
    }
}