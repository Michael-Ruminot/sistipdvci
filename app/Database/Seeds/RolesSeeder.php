<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'rol' => 'Administrador',
            ],
            [
                'rol' => 'Usuario',
            ],
        ];

        $this->db->table('roles')->insertBatch($data);
    }
}
