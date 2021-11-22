<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{
    SaleController,
    SellerController
};
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

Route::apiResource('/sale', SaleController::class);
Route::apiResource('/seller', SellerController::class);

Route::get('/', function () {
    return response()->json(['message' => 'API success']);
});