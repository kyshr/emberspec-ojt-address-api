<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipalities;

class MunicipalitiesController extends Controller
{
    public function getMunicipalitiesByProvince(Request $request){
        $province_id = $request->route('province_id');
        $municipalities = Municipalities::where('province_id', $province_id)->get();
        
        return response()->json([
            'data' => $municipalities,
        ]);
    }
}
