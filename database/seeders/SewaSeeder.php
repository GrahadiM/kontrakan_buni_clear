<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Sewa::create([
            'user_id'  => 2,
            'room_id'  => 2,
            'total_family'  => 5,
            'nik'  => 12345,
            'rental_date'  => '2021-01-05 12:00:00',
        ]);
        // \App\Models\Sewa::create([
        //     'user_id'  => 3,
        //     'room_id'  => 1,
        //     'total_family'  => 2,
        //     'rental_date'  => '2021-01-15 12:00:00',
        // ]);
    }
}
