<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regions;

class RegionsController extends Controller
{
    public function getRegions(Request $request){
        return response()->json([
            'data' => Regions::all(),
        ]);
    }

    public function addRegion(Request $request){
        $data = $request->input('data');
        // echo $data['greetings'];
        $new_region = Regions::create([
            'region_id' => $data['region_id'],
            'name' => $data['name'],
        ]);

        return $new_region;
    }
}
