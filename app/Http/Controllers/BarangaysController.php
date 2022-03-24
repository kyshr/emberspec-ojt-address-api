<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangays;
use App\Http\Resources\BarangaysResource;

class BarangaysController extends Controller
{
    public function getBarangays(Request $request){
        return new BarangaysResource(Barangays::all());
    }

    public function getBarangaysByMunicipality(Request $request){
        $municipality_id = $request->route('municipality_id');
        $barangays = Barangays::where('municipality_id', $municipality_id)->get();
        
        return new BarangaysResource($barangays);
    }

    public function addBarangay(Request $request){
        if(!empty($request->input('data'))){
            $data = $request->input('data');
            $new_barangay = Barangays::create([
                'region_id' => $data['region_id'],
                'province_id' => $data['province_id'],
                'municipality_id' => $data['municipality_id'],
                'barangay_id' => $data['barangay_id'],
                'name' => $data['name'],
            ]);

            return $new_barangay;
        }
        
        return response(['message' => 'No data provided.'], 204);
    }
}
