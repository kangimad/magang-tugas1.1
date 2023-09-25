<?php

namespace Database\Seeders;

use App\Models\Regency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Regency::factory(9)->create();
    }
}
