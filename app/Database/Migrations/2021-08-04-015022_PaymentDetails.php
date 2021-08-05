<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentDetails extends Migration
{
	private $table = 'payment_details';
	public function up() {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
            'user_id' => [
                'type'           => 'VARCHAR',
				'constraint'     => 120,
            ],
            'payment_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
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
		$this->forge->dropTable('payment_details');
	}
}
