<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users[0] = [
            'name'           => 'Super Admin',
            'email'          => 'superadmin@admin.com',
            'username'       => 'superadmin@admin.com',
            'password'       => bcrypt('Password'),
            'remember_token' => null,
            'email_verified_at' => date('Y-m-d H:i:s'),
            'created_by'     => 1,
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ];
        $users[1] = [
            'name'           => 'Administrator',
            'email'          => 'admin@admin.com',
            'username'       => 'admin',
            'password'       => bcrypt('12345678'),
            'remember_token' => null,
            'email_verified_at' => date('Y-m-d H:i:s'),
            'created_by'     => 1,
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ];

        $users[2] = [
            'name'           => 'Rohan',
            'email'          => 'rohan@gmail.com',
            'username'       => 'rohan@gmail.com',
            'password'       => bcrypt('12345678'),
            'remember_token' => null,
            'email_verified_at' => date('Y-m-d H:i:s'),
            'created_by'     => 1,
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ];

        foreach($users as $key=>$user){
            $createdUser =  User::create($user);
        }
    }
}
