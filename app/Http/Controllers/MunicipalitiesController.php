<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipalities;
use App\Http\Resources\MunicipalitiesResource;

class MunicipalitiesController extends Controller
{
    public function getMunicipalitiesByProvince(Request $request){
        $province_id = $request->route('province_id');
        $municipalities = Municipalities::where('province_id', $province_id)->get();
        
        return new MunicipalitiesResource($municipalities);
    }
}
