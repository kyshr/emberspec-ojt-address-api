<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regions;
use App\Http\Resources\RegionsResource;

class RegionsController extends Controller
{
    public function getRegions(Request $request){
        return new RegionsResource(Regions::all());
    }

    public function addRegion(Request $request){
        if(!empty($request->input('data'))){
            $data = $request->input('data');
            $new_region = Regions::create([
                'region_id' => $data['region_id'],
                'name' => $data['name'],
            ]);

            return $new_region;
        }
        
        return response(['message' => 'No data provided.'], 204); 
    }

    public function updateRegion(Request $request){
        $region_id = $request->route('region_id');

        if(!empty($request->input('data'))){
            $data = $request->input('data');
            $updated_region = Regions::where('region_id', $region_id)
            ->update([
                'region_id' => $region_id,
                'name' => $data['name'],
            ]);

            return $updated_region;
        }

        return response(['message' => 'No data provided.'], 204);
    }
}
