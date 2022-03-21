<?php

namespace Database\Seeders;

use App\Models\Graine;
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
        Graine::factory(20)->create();
    }
}
