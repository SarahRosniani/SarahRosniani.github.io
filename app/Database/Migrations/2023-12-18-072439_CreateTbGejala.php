<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbGejala extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            // Tambahkan kolom G001 sampai G050
            'G001' => ['type' => 'TINYINT', 'constraint' => 1],
            'G002' => ['type' => 'TINYINT', 'constraint' => 1],
            'G003' => ['type' => 'TINYINT', 'constraint' => 1],
            'G004' => ['type' => 'TINYINT', 'constraint' => 1],
            'G005' => ['type' => 'TINYINT', 'constraint' => 1],
            'G006' => ['type' => 'TINYINT', 'constraint' => 1],
            'G007' => ['type' => 'TINYINT', 'constraint' => 1],
            'G008' => ['type' => 'TINYINT', 'constraint' => 1],
            'G009' => ['type' => 'TINYINT', 'constraint' => 1],
            'G010' => ['type' => 'TINYINT', 'constraint' => 1],
            'G011' => ['type' => 'TINYINT', 'constraint' => 1],
            'G012' => ['type' => 'TINYINT', 'constraint' => 1],
            'G013' => ['type' => 'TINYINT', 'constraint' => 1],
            'G014' => ['type' => 'TINYINT', 'constraint' => 1],          
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_gejala');
    }

    public function down()
    {
        $this->forge->dropTable('tb_gejala');
    }
}