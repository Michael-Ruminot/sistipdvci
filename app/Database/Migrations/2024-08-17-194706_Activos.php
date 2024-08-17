<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Activos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'serie' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true
            ],
            'modelo' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'fabricante' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true
            ],
            'descripcion' => [
                'type' => 'TINYTEXT', // 255 caracteres
                'null' => true,
            ],
            'id_tipo' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_sede' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_empleado' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_tipo', 'tipoactivos', 'id');
        $this->forge->addForeignKey('id_sede', 'sedes', 'id');
        $this->forge->addForeignKey('id_empleado', 'empleados', 'id');
        $this->forge->createTable('activos');

    }

    public function down()
    {
        $this->forge->createTable('activos');
    }
}
