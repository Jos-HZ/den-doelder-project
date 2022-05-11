<?php

namespace Database\Seeders;

use App\Models\Backlog;
use Illuminate\Database\Seeder;

class BacklogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Backlog::factory()
            ->count(20)
            ->create();
    }
}
