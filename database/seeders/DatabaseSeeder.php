<?php

namespace Database\Seeders;

use App\Models\QualityControl;
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
        $this->call(OrderSeeder::class);
        $this->call(ProductionSeeder::class);
        $this->call(ErrorSeeder::class);
        $this->call(DriverTableSeeder::class);
        $this->call(ProductionTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(QualityControlSeeder::class);
    }
}
