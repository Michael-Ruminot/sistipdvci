<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivosModel extends Model
{
    protected $table            = 'activos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['serie','modelo','fabricante','descripcion','mantencion','id_tipo','id_sede','id_empleado'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
