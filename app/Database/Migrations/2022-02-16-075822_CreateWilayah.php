<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWilayah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode' => [
                'type'       => 'varchar',
                'constraint' => 15,
            ],
            'nama' => [
                'type'       => 'varchar',
                'constraint' => 70,
            ],
            'level' => [
                'type'       => 'enum',
                'constraint' => ['Provinsi', 'Kota/Kabupaten', 'Kecamatan', 'Desa'],
                'default'    => 'Desa',
            ],
        ]);
        $this->forge->addPrimaryKey('kode');
        $this->forge->createTable('wilayah', true);
    }

    public function down()
    {
        $this->forge->dropTable('wilayah', true);
    }
}
