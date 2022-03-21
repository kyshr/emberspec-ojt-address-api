<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([RegionsSeeder::class]);
        $this->call([ProvincesSeeder::class]);
        $this->call([MunicipalitiesSeeder::class]);
        $this->call([BarangaysSeeder::class]);
        // \App\Models\User::factory(10)->create();
    }
}
