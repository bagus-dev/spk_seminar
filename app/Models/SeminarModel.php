<?php

namespace App\Models;

use CodeIgniter\Model;

class SeminarModel extends Model
{
    protected $table = 'seminars';
    protected $usetimestamps = true;
    protected $allowedFields = ['title', 'presenter', 'field_id', 'seminar_date', 'start', 'end', 'created_at', 'updated_at'];
}