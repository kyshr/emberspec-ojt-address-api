<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinces;
use App\Http\Resources\ProvincesResource;
use Illuminate\Support\Facades\DB;

class ProvincesController extends Controller
{
    public function getProvinces(Request $request){
        // return new ProvincesResource(Provinces::all());
        return response()->json(['data' => DB::table('regions')
        ->join('provinces', 'provinces.region_id', '=', 'regions.region_id')
        ->select('provinces.*', 'regions.name AS region_name')
        ->get()]);
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

    public function updateProvince(Request $request){
        $province_id = $request->route('province_id');

        if(!empty($request->input('data'))){
            $data = $request->input('data');
            $updated_province = Provinces::where('province_id', $province_id)
            ->update([
                'region_id' => $data['region_id'],
                'province_id' => $province_id,
                'name' => $data['name'],
            ]);

            return $updated_province;
        }

        return response(['message' => 'No data provided.'], 204);
    }
}
