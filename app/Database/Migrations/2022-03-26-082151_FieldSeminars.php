<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FieldSeminars extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'  => ['type' => 'varchar', 'constraint' => 255],
            'created_at' => ['type' => 'datetime'],
            'updated_at' => ['type' => 'datetime']
        ]);

        $this->forge->addKey('id', true);
		$this->forge->createTable('field_seminars');
    }

    public function down()
    {
        $this->forge->dropTable('field_seminars', true);
    }
}
