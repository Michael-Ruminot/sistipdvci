<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DepartamentosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre' => 'Alianza PDV',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Contraloria',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Direccion General',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Fiscalia',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Gerencia Comercial',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Gerencia de Adm. y Servicios',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Gerencia de desarrollo de personas',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Gerencia de finanzas',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Gerencia de TI',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Preu General Santiago',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Preuniversitario Alianza PDV',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Sede Virtual',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Recursos Humanos',
                'descripcion' => ''
            ],
        ];

        $this->db->table('departamentos')->insertBatch($data);
    }
}
