<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SetAdminPassword extends Seeder
{
    public function run()
    {
        $this->db
            ->table('users')
            ->where('username', 'admin01')
            ->update([
                'password' => password_hash('password123', PASSWORD_DEFAULT)
            ]);
    }
}