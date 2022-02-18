<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMembers extends Migration
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
                'null'       => false,
            ],
            'wilayah_id' => [
                'type'       => 'varchar',
                'constraint' => 15,
                'null'       => false,
            ],
            'code' => [
                'type'       => 'varchar',
                'constraint' => 18,
                'null'       => false,
            ],
            'address' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'null'       => false,
            ],
            'path_logo' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'null'       => true,
            ],
            'path_image' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'null'       => true,
            ],
            'state' => [
                'type'       => 'enum',
                'constraint' => ['Draft', 'Submit', 'Approve', 'Reject', 'Void'],
                'default'    => 'Approve',
                'null'       => true,
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
        $this->forge->addUniqueKey('code');
        $this->forge->createTable('member', true);
    }

    public function down()
    {
        $this->forge->dropTable('member');
    }
}
