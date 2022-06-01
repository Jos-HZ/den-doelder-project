<?php

namespace Database\Seeders;

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
        $this->call(ProductionLineSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(DriverTableSeeder::class);
        $this->call(ProductionTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(QualityControlSeeder::class);
        $this->call(BacklogSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
