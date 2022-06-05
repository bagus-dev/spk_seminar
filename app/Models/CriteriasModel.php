<?php

namespace App\Models;

use CodeIgniter\Model;

class CriteriasModel extends Model
{
    protected $table = 'criterias';
    protected $usetimestamps = true;
    protected $allowedFields = ['kriteria', 'bobot', 'keterangan', 'created_at', 'updated_at'];
}