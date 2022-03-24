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
}
