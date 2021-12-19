<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\APIController;

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
Route::post('app_login', [APIController::class, 'app_login']);


Route::post('app_get_asset_details', [APIController::class, 'app_get_asset_details']);


Route::post('app_update_quantity', [APIController::class, 'app_update_quantity']);

Route::post('app_user_update_quantity_history', [APIController::class, 'app_user_update_quantity_history']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
