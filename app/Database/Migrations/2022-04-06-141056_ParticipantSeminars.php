<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ParticipantSeminars extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'auto_increment' => true],
            'seminar_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'user_id'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'criteria_1'    => ['type' => 'int', 'constraint' => 1],
            'criteria_2'    => ['type' => 'int', 'constraint' => 1],
            'criteria_3'    => ['type' => 'int', 'constraint' => 1],
            'criteria_4'    => ['type' => 'int', 'constraint' => 1],
            'criteria_5'    => ['type' => 'int', 'constraint' => 1],
            'percentage'    => ['type' => 'double'],
            'impression'    => ['type' => 'text'],
            'suggestion'    => ['type' => 'text'],
            'created_at'    => ['type' => 'datetime'],
            'updated_at'    => ['type' => 'datetime'],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('seminar_id', 'seminars', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('participant_seminars');
    }

    public function down()
    {
        $this->forge->dropForeignKey('participant_seminars', 'participant_seminars_seminar_id_foreign');
        $this->forge->dropForeignKey('participant_seminars', 'participant_seminars_user_id_foreign');
        $this->forge->dropTable('participant_seminars', true);
    }
}
