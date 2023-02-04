<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class CreateAdminAccount extends Seeder
{
    public function run()
    {
        $users = new UserModel();
        $admin = new User([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'kalibawang123',
        ]);
        $users->save($admin);
        $admin = $users->findById($users->getInsertID());
        $admin->addGroup('superadmin');

        $db = \Config\Database::connect();
        $db->table('pw')->insert(['id_user' => $users->getInsertID(), 'pw' => 'kalibawang123']);
    }
}
