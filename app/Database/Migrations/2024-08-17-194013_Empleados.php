<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Empleados extends Migration
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
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'apellido' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'correo' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'unique' => true
            ],
            'cargo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'fecha_nacimiento' => [
                'type' => 'DATE'
            ],
            'id_rol' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'id_sede' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'id_departamento' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'create_at' => [
                'type' => 'DATE'
            ],
            'update_at' => [
                'type' => 'DATE'
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_rol', 'roles', 'id');
        $this->forge->addForeignKey('id_sede', 'sedes', 'id');
        $this->forge->addForeignKey('id_departamento', 'departamentos', 'id');
        $this->forge->createTable('empleados');
    }

    public function down()
    {
        $this->forge->dropTable('empleados');
    }
}
