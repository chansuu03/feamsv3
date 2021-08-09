<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
{
	private $table = 'transactions';
	public function up() {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
            'user_id' => [
                'type'           => 'INT',
				'constraint'     => 11,
            ],
            'photo' => [
                'type'           => 'VARCHAR',
                'constraint'     => 150,
            ],
            'payment_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'amount' => [
                'type'           => 'DOUBLE',
            ],
            'added_by' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'comment'        => 'User that added the transaction',
            ],
			'created_at' => [
				'type'           => 'DATETIME',
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
				'default'        => null,
			],
			'deleted_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
				'default'        => null,
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable($this->table);
	}

	public function down() {
		$this->forge->dropTable('transactions');
	}
}
