<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $password = password_hash('password123', PASSWORD_DEFAULT);

        $this->db
            ->table('users')
            ->where('password IS NULL', null, false)
            ->update([
                'password' => $password
            ]);
    }
}