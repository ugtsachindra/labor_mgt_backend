<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
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
Route::post("user-register",[UserController::class, "register"]);
Route::post("login",[UserController::class, "login"]);



Route::group(["middleware" => ["auth:api"]], function(){

    Route::get("profile", [UserController::class,"profile"]);
    Route::post("logout", [UserController::class,"logout"]);

    Route::resource("contract","ContractController");
    Route::put("contract/save/{id}",[ContractController::class,"update"]);
    Route::post("contract/save",[ContractController::class,"save"]);
    Route::get("contract_active",[ContractController::class,"active"]);

    Route::get("project",[ProjectController::class,"index"]);
    Route::get("project/{id}",[ProjectController::class,"show"]);
    Route::post("project",[ProjectController::class,"store"]);
    Route::put("project/{id}",[ProjectController::class,"update"]);
    Route::delete("project/{project}",[ProjectController::class,"destroy"]);
    Route::get("project_active",[ProjectController::class,"active"]);


    Route::resource("section","SectionController");
    Route::get("section_active",[SectionController::class, "active"]);



    Route::resource("location","LocationController");
    Route::get("location_active",[LocationController::class, "active"]);

    Route::resource("supplier","SupplierController");

});

    

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


