<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\ProductController;
use App\Http\Resources\UserResource;
use App\Models\User;
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


Route::resource('/debts' , DebtController::class);


Route::post('/login', [AuthController::class, 'login']);


Route::group(["middleware"=>['auth:sanctum' , 'user']] , function(){

    Route::get('/dede' , function(){ return "dede";});

    Route::resource('/debts' , DebtController::class);

    Route::post('/logout', [AuthController::class, 'logout']);

});


Route::group(["middleware"=>['auth:sanctum' , 'admin']] , function(){
    
    // Route::resource('/debts' , DebtController::class);
    
    // Route::post('/logout', [AuthController::class, 'logout']);

});

Route::resource('/products' , ProductController::class);