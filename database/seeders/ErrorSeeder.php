<?php

namespace Database\Seeders;

use App\Models\Error;
use Illuminate\Database\Seeder;

class ErrorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Error::factory()
            ->count(20)
            ->create();
    }
}
