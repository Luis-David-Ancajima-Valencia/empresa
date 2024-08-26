<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Articulos extends Migration
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
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'precio' => [
                'type' => 'DOUBLE',
                'constraint' => "10,2"
            ],
            'stock' => [
                'type' => 'INT'
            ],
            'id_categoria' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_categoria', 'categorias', 'id');
        $this->forge->createTable('articulos');
    }

    public function down()
    {
        $this->forge->dropTable('articulos');
    }
}
