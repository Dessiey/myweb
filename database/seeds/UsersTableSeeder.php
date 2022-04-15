<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Key;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            // [
                // 'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'abushay123@gmail.com',
                'lable'         =>'Jimma Institute of Technology',
                'position'       =>'System Admin',
                'password'       => '$2y$10$Y.jEitizf.DW3V7gxCnMr.SdWN2i1w4gobo28vTLGaFajqcjUl8Oy',
                'remember_token' => null,
                'status'         => 'active',
                'usertype'       => 'Admin',
                'created_at'     => '2019-09-19 12:08:28',
                'updated_at'     => '2019-09-19 12:08:28',
            // ],
        ];

        User::insert($users);
        event(new Registered($users));

       // Auth::login($user);

        $private = \phpseclib3\Crypt\RSA::createKey();
        $public = $private->getPublicKey();

        Key::create([
            'public_key' => $public->toString('PKCS8'),
            'private_key' => $private->toString('PKCS8'),
            'user_id' => 1
        ]);
    }
}
