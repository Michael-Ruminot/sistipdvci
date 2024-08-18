<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoactivosModel extends Model
{
    protected $table            = 'tipoactivos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tipo'];

    // Dates
    protected $useTimestamps = false;

}
