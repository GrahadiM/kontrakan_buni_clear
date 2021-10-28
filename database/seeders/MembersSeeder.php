<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];
        $faker = Factory::create();
        for($i=0;$i<5;$i++){
        $data[$i] = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'username' => $faker->unique()->userName,
                'role' => 'member',
                'avatar' => 'member.png',
                'gender' => '-',
                'phone' => $faker->phoneNumber,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ];
        }
        DB::table('users')->insert($data);
    }
}
