<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sedes extends Migration
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
            'sede' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'direccion' => [
                'type' => 'TINYTEXT', // 255 caracteres
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('sedes');
    }

    public function down()
    {
        $this->forge->dropTable('sedes');
    }
}
