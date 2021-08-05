<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTable extends Migration {
    private $table = 'users';
    
    public function up() {
        $this->forge->addField([
            'id'          => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'auto_increment' => true,
            ],
            'member_id'          => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 11,
                    'auto_increment' => true,
            ],
            'first_name'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '50',
            ],
            'middle_name'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '50',
            ],
            'last_name'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '50',
            ],
            'username'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '50',
            ],
            'password'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '60',
            ],
            'email'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '50',
            ],
            'gender'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '6',
            ],
            'profile_pic'     => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '100',
            ],
            'birthdate'       => [
                    'type'           => 'DATE'
            ],
            'contact_number'       => [
                    'type'           => 'DECIMAL',
                    'constraint'     => '11'
            ],
            'email_code'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '10'
            ],
            'role'       => [
                    'type'           => 'BIGINT',
                    'default'        => 2
            ],
            'status' => [
                    'type'           => 'CHAR',
                    'constraint'     => '1',
                    'default'        => 'v'
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

    public function down()
    {
        $this->forge->dropTable('users');
    }
}