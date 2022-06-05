<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Seminars extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title'         => ['type' => 'varchar', 'constraint' => 255],
            'presenter'     => ['type' => 'varchar', 'constraint' => 255],
            'field_id'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'seminar_date'  => ['type' => 'date'],
            'created_at'    => ['type' => 'datetime'],
            'updated_at'    => ['type' => 'datetime']
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('field_id', 'field_seminars', 'id', '', 'CASCADE');
		$this->forge->createTable('seminars');
    }

    public function down()
    {
        $this->forge->dropForeignKey('seminars', 'seminars_field_id_foreign');
		$this->forge->dropTable('seminars', true);
    }
}
