<?php

namespace App\Models;

use CodeIgniter\Model;

class SedesModel extends Model
{
    protected $table            = 'sedes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];


    // Dates
    protected $useTimestamps = false;

}
