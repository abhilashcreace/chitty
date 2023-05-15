<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::create([
            'uuid' => Str::uuid(),
            'default_password' => 'asd123',
            'email' => 'kalakaumudihrd@gmail.com ',
            'phone1' => '04712443531',
            'phone2' => '2447870',
            'mobile' => '7356222990',
            'address' => 'Kalakaumudi Kalakaumudi Gardens Kumarapuram Thiruvananthapuram - 695011',
            'copyright_content' => '© copyright 2020 kalakaumudi.com',
            'default_image' => 'uploads/default/no-image.png',
            'logo' => 'uploads/default/no-image.png',
            'status' => 1
        ]);
    }
}