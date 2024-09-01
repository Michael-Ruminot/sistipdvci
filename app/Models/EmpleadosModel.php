<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpleadosModel extends Model
{
    protected $table            = 'empleados';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre', 'apellido', 'username', 'password', 'repassword', 'correo', 'cargo', 'fecha_nacimiento', 'id_rol', 'id_sede', 'id_departamento'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    //Funcion para mostrar datos de distintas tablas (INNER JOIN)
    public function empleadosJoin()
    {
        return $this->select('empleados.*, departamentos.nombre AS departamento, 
                                            roles.rol AS rol,
                                            sedes.sede AS sede')
            ->join('departamentos', 'empleados.id_departamento = departamentos.id')
            ->join('roles', 'empleados.id_rol = roles.id')
            ->join('sedes', 'empleados.id_sede = sedes.id')
            ->findAll();
    }

    // Método para actualizar la contraseña de un usuario
    public function updatePassword($userId, $hashedPassword)
    {
        return $this->update($userId, ['password' => $hashedPassword]);
    }
}
