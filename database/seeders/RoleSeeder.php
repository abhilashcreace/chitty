<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id' => 1,
            'uuid' => Str::uuid(),
            'name' => 'Super Admin',
            'status' => 1
        ]);

        Role::create([
            'id' => 2,
            'uuid' => Str::uuid(),
            'name' => 'System Admin',
            'status' => 1
        ]);

        Role::create([
            'id' => 3,
            'uuid' => Str::uuid(),
            'name' => 'Managing Editor',
            'status' => 1
        ]);
    }
}