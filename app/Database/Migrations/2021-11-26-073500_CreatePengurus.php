<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengurus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'int',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'contact' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'text',
            ],
            'jabatan_id' => [
                'type'       => 'int',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('jabatan_id', 'jabatan', 'id');
        $this->forge->createTable('pengurus', true);
    }

    public function down()
    {
        $this->forge->dropTable('pengurus', true);
    }
}
