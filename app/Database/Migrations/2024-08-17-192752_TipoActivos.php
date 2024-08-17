<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TipoActivos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tipo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tipoactivos');
    }

    public function down()
    {
        $this->forge->dropTable('tipoactivos');
    }
}
