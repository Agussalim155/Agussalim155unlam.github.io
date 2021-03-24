<?php

namespace App\Models;

use CodeIgniter\Model;

class MasukModel extends Model
{
    protected $table = 'masuk';
    protected $useTimesStamps = true;
    protected $allowedFields = ['angka', 'tanggal', 'uraian', 'pemasukan', 'saldo'];


    public function getMasuk($angka = false)
    {
        if ($angka== false) {
            return $this->findAll();
        }

        return $this->where(['angka' => $angka])->first();
    }
}