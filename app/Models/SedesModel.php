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
    protected $allowedFields    = ['sede','direccion'];


    // Dates
    protected $useTimestamps = false;


     //Funcion para mostrar datos de distintas tablas (INNER JOIN)
     public function sedesQuery(){
        return $this->select('sedes.*')->findAll();
    }

}
