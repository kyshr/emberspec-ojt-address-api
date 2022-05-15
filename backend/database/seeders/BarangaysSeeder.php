<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barangays;

class BarangaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barangays::truncate();
  
        $csvFile = fopen(base_path("database/seeders/data/barangays_extracted.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Barangays::create([
                    "region_id" => $data['1'],
                    "province_id" => $data['2'],
                    "municipality_id" => $data['3'],
                    "barangay_id" => $data['4'],
                    "name" => $data['5']
                ]);    
            }
            $firstline = false;
        }
    
        fclose($csvFile);
    }
}
