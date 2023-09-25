<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Village::factory(9)->create();
    }
}
