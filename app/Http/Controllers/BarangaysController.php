<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangays;
use App\Http\Resources\BarangaysResource;
use Illuminate\Support\Facades\DB;

class BarangaysController extends Controller
{
    public function getBarangays(Request $request){
        // return new BarangaysResource(Barangays::paginate(1000));
        return response()->json(DB::table('regions')
        ->join('provinces', 'provinces.region_id', '=', 'regions.region_id')
        ->join('municipalities', 'municipalities.province_id', '=', 'provinces.province_id')
        ->join('barangays', 'barangays.municipality_id', '=', 'municipalities.municipality_id')
        ->select('barangays.*', 'regions.name AS region_name', 'provinces.name AS province_name', 'municipalities.name AS municipality_name')
        ->paginate(500));
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

    public function updateBarangay(Request $request){
        $barangay_id = $request->route('barangay_id');

        if(!empty($request->input('data'))){
            $data = $request->input('data');
            $updated_barangay = Barangays::where('barangay_id', $barangay_id)
            ->update([
                'region_id' => $data['region_id'],
                'province_id' => $data['province_id'],
                'municipality_id' => $data['municipality_id'],
                'barangay_id' => $barangay_id,
                'name' => $data['name'],
            ]);

            return $updated_barangay;
        }

        return response(['message' => 'No data provided.'], 204);
    }
}
