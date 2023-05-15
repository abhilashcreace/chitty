<?php

namespace Database\Seeders;

use App\Models\Scheme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Scheme::create([
            'id' => 1,
            'uuid' => Str::uuid(),
            'name' => 'Scheme 1',
            'scheme_code' => 'SCH/1',
            'amount' => 100000,
            'months' => 20,
            'status' => 1
        ]);

        Scheme::create([
            'id' => 2,
            'uuid' => Str::uuid(),
            'name' => 'Scheme 2',
            'scheme_code' => 'SCH/2',
            'amount' => 10000,
            'months' => 5,
            'status' => 1
        ]);
    }
}