<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'uuid' => Str::uuid(),
            'name' => 'Developer',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => Hash::make('asd123'),
            'role_id' => 1,
            'profile_img' => "uploads/default/user-default.png",
            'status' => 1
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'name' => 'Super Admin',
            'email' => 'superadmin@kalakaumudi.com',
            'username' => 'superadmin',
            'password' => Hash::make('asd123'),
            'role_id' => 1,
            'profile_img' => "uploads/default/user-default.png",
            'status' => 1
        ]);
    }
}