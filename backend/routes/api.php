<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\MunicipalitiesController;
use App\Http\Controllers\BarangaysController;
use App\Http\Controllers\AuthController;

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

//GET request by IDs
Route::get('v1/provinces-by-region/{region_id}', [ProvincesController::class, 'getProvincesByRegion']);
Route::get('v1/municipalities-by-province/{province_id}', [MunicipalitiesController::class, 'getMunicipalitiesByProvince']);
Route::get('v1/barangays-by-municipality/{municipality_id}', [BarangaysController::class, 'getBarangaysByMunicipality']);

//Add new geographic level
Route::post('v1/regions', [RegionsController::class, 'addRegion'])->middleware(['auth:sanctum']);
Route::post('v1/provinces', [ProvincesController::class, 'addProvince'])->middleware(['auth:sanctum']);
Route::post('v1/municipalities', [MunicipalitiesController::class, 'addMunicipality'])->middleware(['auth:sanctum']);
Route::post('v1/barangays', [BarangaysController::class, 'addBarangay'])->middleware(['auth:sanctum']);

//Update geographic levels
Route::put('v1/regions/{region_id}', [RegionsController::class, 'updateRegion'])->middleware(['auth:sanctum']);
Route::put('v1/provinces/{province_id}', [ProvincesController::class, 'updateProvince'])->middleware(['auth:sanctum']);
Route::put('v1/municipalities/{municipality_id}', [MunicipalitiesController::class, 'updateMunicipality'])->middleware(['auth:sanctum']);
Route::put('v1/barangays/{barangay_id}', [BarangaysController::class, 'updateBarangay']);

//Authentication Routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);
