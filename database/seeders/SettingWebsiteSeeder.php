<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingWebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SettingWebsite::create([
            'app_name'  => 'KONTRAKAN BUNI',
            'logo' => 'logo_default.png',
            'favicon'  => 'favicon_default.ico',
            'footer_right'  => 'Ver 1.0',
            'footer_left'  => 'Starter Web Laravel 8 & SBadmin 2',
        ]);
    }
}
