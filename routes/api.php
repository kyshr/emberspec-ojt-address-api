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

//Get all collections
Route::get('v1/regions', [RegionsController::class, 'getRegions']);
Route::get('v1/provinces', [ProvincesController::class, 'getProvinces']);
Route::get('v1/municipalities', [MunicipalitiesController::class, 'getMunicipalities']);
Route::get('v1/barangays', [BarangaysController::class, 'getBarangays']);

//Add new region, province, municipality and barangay
Route::post('v1/regions', [RegionsController::class, 'addRegion']);
Route::post('v1/provinces', [ProvincesController::class, 'addProvince']);
Route::post('v1/municipalities', [MunicipalitiesController::class, 'addMunicipality']);
Route::post('v1/barangays', [BarangaysController::class, 'addBarangay']);

//GET request by IDs
Route::get('v1/provinces-by-region/{region_id}', [ProvincesController::class, 'getProvincesByRegion']);
Route::get('v1/municipalities-by-province/{province_id}', [MunicipalitiesController::class, 'getMunicipalitiesByProvince']);
Route::get('v1/barangays-by-municipality/{municipality_id}', [BarangaysController::class, 'getBarangaysByMunicipality']);

//Update geographic levels
Route::put('v1/regions/{region_id}', [RegionsController::class, 'updateRegion']);
Route::put('v1/provinces/{province_id}', [ProvincesController::class, 'updateProvince']);
Route::put('v1/municipalities/{municipality_id}', [MunicipalitiesController::class, 'updateMunicipality']);
Route::put('v1/barangays/{barangay_id}', [BarangaysController::class, 'updateBarangay']);
