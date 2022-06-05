<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Criterias extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'			=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'kriteria'		=> ['type' => 'varchar', 'constraint' => 100],
			'bobot'			=> ['type' => 'int', 'constraint' => 2],
			'keterangan'	=> ['type' => 'int', 'constraint' => 1],
			'created_at'	=> ['type' => 'datetime'],
			'updated_at'	=> ['type' => 'datetime']
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('criterias');
    }

    public function down()
    {
        $this->forge->dropTable('criterias', true);
    }
}
