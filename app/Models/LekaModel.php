<?php

namespace App\Models;

use CodeIgniter\Model;

class LekaModel extends Model
{
    protected $table = 'leka';
    protected $useTimesStamps = true;
    protected $allowedFields = ['nama', 'slug', 'leka', 'jumlah', 'sampul'];


    public function getLeka($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
