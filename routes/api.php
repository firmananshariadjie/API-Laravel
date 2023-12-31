<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get("device/{id?}", [DeviceController::class, 'index']);
    Route::post("device", [DeviceController::class, 'store']);
    Route::put("device/update/{id}", [DeviceController::class, 'update']);
    Route::delete("device/{id}", [DeviceController::class, 'destroy']);
    Route::get("/device/search/{name}", [DeviceController::class, 'search']);

    Route::apiResource("member", MemberController::class);
});
Route::post("login", [UserController::class, 'index']);

Route::post("file", [FileController::class, 'upload']);
