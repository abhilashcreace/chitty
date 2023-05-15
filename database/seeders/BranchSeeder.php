<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'id' => 1,
            'uuid' => Str::uuid(),
            'name' => 'Trivandrum Central',
            'branch_code' => 'TVM145',
            'address' => 'Trivandrum Central',
            'status' => 1
        ]);

        Branch::create([
            'id' => 2,
            'uuid' => Str::uuid(),
            'name' => 'Kazhakoottam',
            'branch_code' => 'TVM841',
            'address' => 'Address kazhakoottam',
            'status' => 1
        ]);

        Branch::create([
            'id' => 3,
            'uuid' => Str::uuid(),
            'name' => 'Kochi',
            'branch_code' => 'EKM101',
            'address' => 'Address Kochi',
            'status' => 1
        ]);
    }
}
