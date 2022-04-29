<?php

namespace Database\Seeders;

use App\Models\QualityControl;
use Illuminate\Database\Seeder;

class QualityControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QualityControl::factory()
            ->count(15)
            ->create();
    }
}
