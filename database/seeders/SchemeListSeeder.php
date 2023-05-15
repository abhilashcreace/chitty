<?php

namespace Database\Seeders;

use App\Models\Scheme;
use App\Models\SchemeList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SchemeListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchemeList::create([
            'id' => 1,
            'uuid' => Str::uuid(),
            'scheme_id' => 1,
            'month' => 1,
            'subs' => 5000,
            'cum' => 5000,
            'status' => 1
        ]);

        SchemeList::create([
            'id' => 2,
            'uuid' => Str::uuid(),
            'scheme_id' => 1,
            'month' => 2,
            'subs' => 4000,
            'cum' => 9000,
            'status' => 1
        ]);

        SchemeList::create([
            'id' => 3,
            'uuid' => Str::uuid(),
            'scheme_id' => 1,
            'month' => 3,
            'subs' => 4000,
            'cum' => 13000,
            'status' => 1
        ]);

        SchemeList::create([
            'id' => 4,
            'uuid' => Str::uuid(),
            'scheme_id' => 1,
            'month' => 4,
            'subs' => 4000,
            'cum' => 17000,
            'status' => 1
        ]);
    }
}
