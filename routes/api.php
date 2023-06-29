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
    Route::get("list/{id?}", [DeviceController::class, 'list']);
    Route::post("add", [DeviceController::class, 'add']);
    Route::put("update/{id}", [DeviceController::class, 'update']);
    Route::delete("delete/{id}", [DeviceController::class, 'delete']);
    Route::get("search/{name}", [DeviceController::class, 'search']);

    Route::apiResource("member", MemberController::class);
});
Route::post("login", [UserController::class, 'index']);

Route::post("file", [FileController::class, 'upload']);
