<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = [
            [
                'id' => '1',
                'name' => 'Admin',
                'role' => 'admin',
                'gender' => '-',
                'phone' => '-',
                'avatar' => 'admin.png',
                'username' => 'admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'email_verified_at' => '2021-07-09 20:19:13',
            ],
            [
                'id' => '2',
                'name' => 'Penyewa 1',
                'role' => 'penyewa',
                'status' => 'active',
                'gender' => 'Pria',
                'phone' => '085767113554',
                'avatar' => 'penyewa.png',
                'username' => 'penyewa',
                'email' => 'penyewa@test.com',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'email_verified_at' => '2021-07-09 20:19:13',
            ],
            [
                'id' => '3',
                'name' => 'Penyewa 2',
                'role' => 'penyewa',
                'status' => 'non-active',
                'gender' => 'Wanita',
                'phone' => '085767113554',
                'avatar' => 'penyewa.png',
                'username' => 'penyewa2',
                'email' => 'penyewa2@test.com',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'email_verified_at' => '2021-07-09 20:19:13',
            ],
        ];
        
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
