<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ProductionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'production',
            'email' => 'production@production.com',
            'password' => bcrypt('production12345'),
            'role' => 'production',
            'language' => 'en'
        ]);
    }
}
