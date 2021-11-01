<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


Route::post('products', [ProductController::class , 'addProducts']);

Route::get('list', [ProductController::class , 'listProduct']);

Route::delete('delete/{id}', [ProductController::class , 'delete']);

Route::get('getProduct/{id}', [ProductController::class , 'getSingleProduct']);

Route::put('updateProduct/{product}', [ProductController::class , 'updateProduct']);

Route::get('search/{key}', [ProductController::class , 'search']);


// passport registration/login API
Route::prefix('user')->group(function () {

    

    // passport auth api
    Route::middleware(['auth:api'])->group(function () {
        
    });

});