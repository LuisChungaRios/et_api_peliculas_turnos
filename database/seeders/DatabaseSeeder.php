<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(FilmSeeder::class);
        $this->call(HourSeeder::class);
        User::factory()->create([
            'role' => 'ADMIN',
            'email' => 'admin@admin.com'
        ]);
    }
}
