<?php

namespace App\Database\Seeds;

use App\Entities\User;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserAdmin extends Seeder
{
    public function run()
    {
        $users     = model(UserModel::class);
        $firstName = 'super';
        $lastName  = 'admin';
        $username  = 'superadmin';
        $email     = 'admin@admin.com';
        $password  = 'admin@admin.com';
        $user      = new User([
            'first_name' => $firstName,
            'last_name'  => $lastName,
            'username'   => $username,
        ]);
        $users->save($user);

        $user = $users->where('username', $username)->first();
        $user->createEmailIdentity([
            'email'    => $email,
            'password' => $password,
        ]);

        $user->addGroup('superadmin');
    }
}
