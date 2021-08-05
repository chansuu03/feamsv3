<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionSeeder extends Seeder
{
	public function run() {
		$data = [
            [
                'perm_mod' => 'USR',
                'desc' => 'View Users'
            ],
            [
                'perm_mod' => 'USR',
                'desc' => 'Delete Users'
            ],
            [
                'perm_mod' => 'USR',
                'desc' => 'Change User Status'
            ],
            [
                'perm_mod' => 'USR',
                'desc' => 'Change User Role'
            ],
            [
                'perm_mod' => 'ROLE',
                'desc' => 'Add role'
            ],
            [
                'perm_mod' => 'ROLE',
                'desc' => 'Edit role'
            ],
            [
                'perm_mod' => 'ROLE',
                'desc' => 'Delete role'
            ],
            [
                'perm_mod' => 'ROLE',
                'desc' => 'View roles'
            ],
            [
                'perm_mod' => 'PERM',
                'desc' => 'View permissions'
            ],
            [
                'perm_mod' => 'PERM',
                'desc' => 'Edit permissions'
            ],
            [
                'perm_mod' => 'ANN',
                'desc' => 'View announcements'
            ],
            [
                'perm_mod' => 'ANN',
                'desc' => 'Add announcements'
            ],
            [
                'perm_mod' => 'ANN',
                'desc' => 'Edit announcements'
            ],
            [
                'perm_mod' => 'ANN',
                'desc' => 'Delete announcements'
            ],
            [
                'perm_mod' => 'SLID',
                'desc' => 'View sliders'
            ],
            [
                'perm_mod' => 'SLID',
                'desc' => 'Add sliders'
            ],
            [
                'perm_mod' => 'SLID',
                'desc' => 'Edit sliders'
            ],
            [
                'perm_mod' => 'SLID',
                'desc' => 'Delete sliders'
            ],
            [
                'perm_mod' => 'ELEC',
                'desc' => 'View elections'
            ],
            [
                'perm_mod' => 'ELEC',
                'desc' => 'Add elections'
            ],
            [
                'perm_mod' => 'ELEC',
                'desc' => 'Edit elections'
            ],
            [
                'perm_mod' => 'ELEC',
                'desc' => 'Delete elections'
            ],
            [
                'perm_mod' => 'POS',
                'desc' => 'View positions'
            ],
            [
                'perm_mod' => 'POS',
                'desc' => 'Add position'
            ],
            [
                'perm_mod' => 'POS',
                'desc' => 'Edit position'
            ],
            [
                'perm_mod' => 'POS',
                'desc' => 'Delete position'
            ],
            [
                'perm_mod' => 'CAN',
                'desc' => 'View candidate'
            ],
            [
                'perm_mod' => 'CAN',
                'desc' => 'Add candidate'
            ],
            [
                'perm_mod' => 'CAN',
                'desc' => 'Edit candidate'
            ],
            [
                'perm_mod' => 'CAN',
                'desc' => 'Delete candidate'
            ],
            [
                'perm_mod' => 'FILES',
                'desc' => 'View files'
            ],
            [
                'perm_mod' => 'FILES',
                'desc' => 'Manage files'
            ],
            [
                'perm_mod' => 'FICAT',
                'desc' => 'View file categories'
            ],
            [
                'perm_mod' => 'FICAT',
                'desc' => 'Manage file categories'
            ],
            [
                'perm_mod' => 'DISC',
                'desc' => 'Manage discussions'
            ],
            [
                'perm_mod' => 'COMM',
                'desc' => 'Manage comments'
            ],
            [
                'perm_mod' => 'REPO',
                'desc' => 'View reports'
            ],
            [
                'perm_mod' => 'USR',
                'desc' => 'Edit Users'
            ],
            [
                'perm_mod' => 'PAY',
                'desc' => 'Manage Payments'
            ],
        ];
		$this->db->table('permissions')->truncate();
		$this->db->table('permissions')->insertBatch($data);
	}
}
