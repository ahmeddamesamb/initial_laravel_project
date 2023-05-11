<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//declaration routes
Route::post("/login", [AuthController::class, "login"]);


Route::middleware('auth:sanctum')->group(function(){
    Route::apiResources([
        'produit' => ProduitController::class
    ]);


}) ;

 