<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\MunicipalitiesController;
use App\Http\Controllers\BarangaysController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//GET request by IDs
Route::get('v1/regions', [RegionsController::class, 'getRegions']);
Route::get('v1/provinces-by-region/{region_id}', [ProvincesController::class, 'getProvincesByRegion']);
Route::get('v1/municipalities-by-province/{province_id}', [MunicipalitiesController::class, 'getMunicipalitiesByProvince']);
Route::get('v1/barangays-by-municipality/{municipality_id}', [BarangaysController::class, 'getBarangaysByMunicipality']);

//Add new region, province, municipality and barangay routes
Route::post('v1/regions/add', [RegionsController::class, 'addRegion']);
