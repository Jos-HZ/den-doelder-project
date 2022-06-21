<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            'dry-rooms',
            'location-q',
            'warehouse-c',
            'outside-terrain',
            'warehouse-2+3',
            'c-pallets',
            'warehouse-d',
            'location-a'
        ];

        foreach ($locations as $location) {
            DB::table('locations')->insert([
                'name' => $location,
                'img_name' => '/img/placement/locations/' . $location . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
