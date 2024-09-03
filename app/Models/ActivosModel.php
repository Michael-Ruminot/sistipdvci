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
    protected $allowedFields    = ['serie','modelo','fabricante','descripcion','mantencion', 'image', 'id_tipo','id_sede','id_empleado'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    //Funcion para mostrar datos de distintas tablas (INNER JOIN)
    public function activosJoin(){
        return $this->select('activos.*, tipoactivos.tipo AS tipo, 
                                            sedes.sede AS sede,
                                            empleados.nombre AS empleado,
                                            empleados.apellido AS empleadoApellido')
        ->join('tipoactivos', 'activos.id_tipo = tipoactivos.id')
        ->join('sedes', 'activos.id_sede = sedes.id')
        ->join('empleados', 'activos.id_empleado = empleados.id','left')
        ->findAll();
    }

}
