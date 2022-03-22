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
}
