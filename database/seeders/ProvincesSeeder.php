<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provinces;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provinces::truncate();
  
        $csvFile = fopen(base_path("database/seeders/data/provinces_extracted.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Provinces::create([
                    "region_id" => $data['1'],
                    "province_id" => $data['2'],
                    "name" => $data['3']
                ]);    
            }
            $firstline = false;
        }
    
        fclose($csvFile);
    }
}
