<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
	public function run() {
		$data = [
              [
                'role_id' => '1',
                'perm_mod' => 'USR',
                'perm_id' => '1',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'role_id' => '1',
                'perm_mod' => 'USR',
                'perm_id' => '2',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'role_id' => '1',
                'perm_mod' => 'USR',
                'perm_id' => '3',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'role_id' => '1',
                'perm_mod' => 'USR',
                'perm_id' => '4',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'role_id' => '1',
                'perm_mod' => 'ROLE',
                'perm_id' => '5',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'role_id' => '1',
                'perm_mod' => 'ROLE',
                'perm_id' => '6',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'role_id' => '1',
                'perm_mod' => 'ROLE',
                'perm_id' => '7',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'role_id' => '1',
                'perm_mod' => 'ROLE',
                'perm_id' => '8',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'perm_mod' => 'PERM',
                'role_id' => '1',
                'perm_id' => '9',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'perm_mod' => 'PERM',
                'role_id' => '1',
                'perm_id' => '10',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'perm_mod' => 'ANN',
                'role_id' => '1',
                'perm_id' => '11',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'perm_mod' => 'ANN',
                'role_id' => '1',
                'perm_id' => '12',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'perm_mod' => 'ANN',
                'role_id' => '1',
                'perm_id' => '13',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'perm_mod' => 'ANN',
                'role_id' => '1',
                'perm_id' => '14',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'perm_mod' => 'SLID',
                'role_id' => '1',
                'perm_id' => '15',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'perm_mod' => 'SLID',
				'role_id' => '1',
				'perm_id' => '16',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'perm_mod' => 'SLID',
				'role_id' => '1',
				'perm_id' => '17',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'perm_mod' => 'SLID',
                'role_id' => '1',
                'perm_id' => '18',
                'created_at' => date('Y-m-d H:i:s')
              ],
              [
                'perm_mod' => 'ELEC',
                'role_id' => '1',
                'perm_id' => '19',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'ELEC',
				'role_id' => '1',
				'perm_id' => '20',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'ELEC',
				'role_id' => '1',
				'perm_id' => '21',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'ELEC',
				'role_id' => '1',
				'perm_id' => '22',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'POS',
				'role_id' => '1',
				'perm_id' => '23',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'POS',
				'role_id' => '1',
				'perm_id' => '24',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'POS',
				'role_id' => '1',
				'perm_id' => '25',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'POS',
				'role_id' => '1',
				'perm_id' => '26',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'CAN',
				'role_id' => '1',
				'perm_id' => '27',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'CAN',
				'role_id' => '1',
				'perm_id' => '28',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'CAN',
				'role_id' => '1',
				'perm_id' => '29',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'CAN',
				'role_id' => '1',
				'perm_id' => '30',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'FILES',
				'role_id' => '1',
				'perm_id' => '31',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'FILES',
				'role_id' => '1',
				'perm_id' => '32',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'FICAT',
				'role_id' => '1',
				'perm_id' => '33',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'FICAT',
				'role_id' => '1',
				'perm_id' => '34',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'DISC',
				'role_id' => '1',
				'perm_id' => '35',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'COMM',
				'role_id' => '1',
				'perm_id' => '36',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'REPO',
				'role_id' => '1',
				'perm_id' => '37',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'PAY',
				'role_id' => '1',
				'perm_id' => '39',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'perm_mod' => 'TRANS',
				'role_id' => '1',
				'perm_id' => '40',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];
		$this->db->table('role_permissions')->truncate();
		$this->db->table('role_permissions')->insertBatch($data);
	}
}
