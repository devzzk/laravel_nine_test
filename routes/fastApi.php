<?php

use App\Http\Controllers\Api\V1\ElasticSearchController;
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


Route::group(['prefix' => 'v1'], function () {
   Route::get('products', function () {
       return response()->json([
           'result' => 'failed',
           'code' => 422,
       ]);
   });

   Route::get('elasticsearch',[ElasticSearchController::class, 'search']);
});
