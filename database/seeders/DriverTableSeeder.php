<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'driver',
            'email' => 'driver@driver.com',
            'password' => bcrypt('driver12345'),
            'roles' => 'driver'
        ]);
    }
}
