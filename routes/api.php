<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(App\Http\Controllers\Api\IndoregionController::class)->group(function () {
    Route::get('/getProvincies', 'provinsi')->name('api.getProvincies');
    Route::post('/getRegencies/{id}', 'kabupaten')->name('api.getRegencies');
    Route::post('/getDistrict/{id}', 'kecamatan')->name('api.getDistrict');
});
