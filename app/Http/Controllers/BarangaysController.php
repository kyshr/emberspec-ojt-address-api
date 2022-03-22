<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangays;

class BarangaysController extends Controller
{
    public function getBarangaysByMunicipality(Request $request){
        $municipality_id = $request->route('municipality_id');
        $barangays = Barangays::where('municipality_id', $municipality_id)->get();
        
        return response()->json([
            'data' => $barangays,
        ]);
    }
}
