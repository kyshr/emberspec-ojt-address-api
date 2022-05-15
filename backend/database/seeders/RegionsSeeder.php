<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Regions;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Regions::truncate();
  
      $csvFile = fopen(base_path("database/seeders/data/regions_extracted.csv"), "r");

      $firstline = true;
      while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
          if (!$firstline) {
              Regions::create([
                  "region_id" => $data['1'],
                  "name" => $data['2']
              ]);    
          }
          $firstline = false;
      }
 
      fclose($csvFile);
    }
}
