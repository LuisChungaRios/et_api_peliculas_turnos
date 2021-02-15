<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Hour;
use Illuminate\Database\Seeder;

class HourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hour::factory()->count(10)->has(Film::factory()->count(2),'')->create();
    }
}
