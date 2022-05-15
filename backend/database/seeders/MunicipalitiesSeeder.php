<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Municipalities;

class MunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Municipalities::truncate();
  
        $csvFile = fopen(base_path("database/seeders/data/municipalities_extracted.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Municipalities::create([
                    "region_id" => $data['1'],
                    "province_id" => $data['2'],
                    "municipality_id" => $data['3'],
                    "name" => $data['4']
                ]);    
            }
            $firstline = false;
        }
    
        fclose($csvFile);
    }
}
