<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SedesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'sede' => 'Alameda',
                'direccion' => 'Alameda 155, Santiago.'
            ],
            [
                'sede' => 'Apoquindo',
                'direccion' => 'Avda. Apoquindo 5142, Santiago.'
            ],
            [
                'sede' => 'Agustinas',
                'direccion' => 'Agustinas 1136, Santiago.'
            ],
            [
                'sede' => 'Brasil',
                'direccion' => 'Av. Brasil 185, Santiago.'
            ],

            [
                'sede' => 'Chicureo',
                'direccion' => 'Av. Chicureo 7100, Colina.'
            ],

            [
                'sede' => 'La Florida',
                'direccion' => 'Vicuña Mackenna Poniente 6015, La Florida.'
            ],

            [
                'sede' => 'La Dehesa',
                'direccion' => 'José Alcalde Délano 10581, Lo Barnechea.'
            ],

            [
                'sede' => 'Maipú',
                'direccion' => 'Av. Los Pajaritos 2441, Maipú.'
            ],

            [
                'sede' => 'Plaza Egaña',
                'direccion' => 'Av. Larraín 5862, Piso 2 (Mall Plaza Egaña), La Reina.'
            ],

            [
                'sede' => 'Peñalolen',
                'direccion' => 'Av. consistorial 3349, Peñalolen.'
            ],

            [
                'sede' => 'Providencia',
                'direccion' => 'Av. Pedro de Valdivia 1874, Providencia.'
            ],

            [
                'sede' => 'Puente Alto',
                'direccion' => 'Av. Concha y Toro 1149, Puente Alto.'
            ],
            [
                'sede' => 'San Bernardo',
                'direccion' => 'Victoria 335, San Bernardo.'
            ],
            [
                'sede' => 'San Carlos de Apoquindo',
                'direccion' => 'Av. La Plaza 1250, Las Condes.'
            ],
            [
                'sede' => 'San Miguel',
                'direccion' => 'Gran Av. José Miguel Carrera 5783, San Miguel.'
            ],
            [
                'sede' => 'Vitacura',
                'direccion' => 'Manquehue Norte 1880, Santiago.'
            ],
            [
                'sede' => 'Arica',
                'direccion' => 'Diego Portales 157, local 201, Arica.'
            ],
            [
                'sede' => 'Antofagasta',
                'direccion' => 'Av.Republica de Croacia 152, Antofagasta.'
            ],
            [
                'sede' => 'Calama',
                'direccion' => 'Av. Libertador Bernardo Ohiggins 1197, Calama.'
            ],
            [
                'sede' => 'Iquique',
                'direccion' => 'Av. Teresa Wilms Montt 2263, Iquique.'
            ],
            [
                'sede' => 'La Serena',
                'direccion' => 'Las Higueras 80, Cerro Grande, La Serena.'
            ],
            [
                'sede' => 'Melipilla',
                'direccion' => 'San Agustín 390, Melipilla.'
            ],
            [
                'sede' => 'Quilpué',
                'direccion' => 'Los Carrera 392, Quilpué.'
            ],
            [
                'sede' => 'Quillota',
                'direccion' => 'Avda. OHiggins 322, Quillota'
            ],
            [
                'sede' => 'Reñaca',
                'direccion' => 'Av. Borgoño 13955, Viña del Mar'
            ],
            [
                'sede' => 'Valparaiso',
                'direccion' => 'Av. Borgoño 13955, Viña del Mar'
            ],
            [
                'sede' => 'Viña del mar',
                'direccion' => 'Paseo Juana Ross 45, Piso 4, Valparaíso.'
            ],
            [
                'sede' => 'Chillan',
                'direccion' => 'Paseo Juana Ross 45, Piso 4, Valparaíso.'
            ],
            [
                'sede' => 'Concepción',
                'direccion' => 'Barros Arana 1634, Concepción.'
            ],
            [
                'sede' => 'Curicó',
                'direccion' => 'Membrillar 812, Curicó.'
            ],
            [
                'sede' => 'Los Ángeles',
                'direccion' => 'Juan Antonio Coloma 0311, Los Ángeles.'
            ],
            [
                'sede' => 'Osorno',
                'direccion' => 'Manuel Rodríguez 853, Osorno.'
            ],
            [
                'sede' => 'Puerto Montt',
                'direccion' => 'Urmeneta 822, Puerto Montt, Región de Los Lagos'
            ],
            [
                'sede' => 'Rancagua',
                'direccion' => 'C. Cuevas 271, Rancagua'
            ],
            [
                'sede' => 'San Pedro de la paz',
                'direccion' => 'Michimalonco 1377, San Pedro de La Paz.'
            ],
            [
                'sede' => 'Talca',
                'direccion' => '3 Oriente 1161, Talca'
            ],
            [
                'sede' => 'Temuco',
                'direccion' => 'Avda. Alemania 038, Temuco'
            ],
            [
                'sede' => 'Valdivia',
                'direccion' => 'García Reyes 434, Valdivia'
            ],




        ];

        $this->db->table('sedes')->insertBatch($data);
    }
}
