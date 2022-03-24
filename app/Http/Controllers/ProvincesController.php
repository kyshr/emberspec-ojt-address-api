<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinces;
use App\Http\Resources\ProvincesResource;

class ProvincesController extends Controller
{
    public function getProvinces(Request $request){
        return new ProvincesResource(Provinces::all());
    }

    public function getProvincesByRegion(Request $request){
        $region_id = $request->route('region_id');
        $provinces = Provinces::where('region_id', $region_id)->get();
        
        return new ProvincesResource($provinces);
    }

    public function addProvince(Request $request){
        if(!empty($request->input('data'))){
            $data = $request->input('data');
            $new_province = Provinces::create([
                'region_id' => $data['region_id'],
                'province_id' => $data['province_id'],
                'name' => $data['name'],
            ]);

            return $new_province;
        }
        
        return response(['message' => 'No data provided.'], 204);
    }
}
