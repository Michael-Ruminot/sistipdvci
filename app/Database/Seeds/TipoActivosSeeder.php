<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TipoActivosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tipo' => 'Celular',
            ],
            [
                'tipo' => 'DHCP Server',
            ],
            [
                'tipo' => 'Escaner',
            ],
            [
                'tipo' => 'Impresora',
            ],
            [
                'tipo' => 'Mini PC NUC',
            ],
            [
                'tipo' => 'PC Escritorio',
            ],
            [
                'tipo' => 'Proyector',
            ],
            [
                'tipo' => 'Router',
            ],
            [
                'tipo' => 'Servidor',
            ],
            [
                'tipo' => 'Switch',
            ],
            [
                'tipo' => 'Tablet',
            ],
            [
                'tipo' => 'Teclado',
            ],
            [
                'tipo' => 'Mouse',
            ],
            [
                'tipo' => 'Escaner Avision',
            ],
            [
                'tipo' => 'WebCam',
            ],
            [
                'tipo' => 'Microfono',
            ],
            [
                'tipo' => 'Auricular',
            ],
            [
                'tipo' => 'Notebook',
            ],
        ];

        $this->db->table('tipoactivos')->insertBatch($data);
    }
}
