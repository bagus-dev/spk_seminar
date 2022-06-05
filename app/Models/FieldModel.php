<?php

namespace App\Models;

use CodeIgniter\Model;

class FieldModel extends Model
{
    protected $table = 'field_seminars';
    protected $usetimestamps = true;
    protected $allowedFields = ['name', 'created_at', 'updated_at'];
}