<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Cms Routes
|--------------------------------------------------------------------------
|
|
|
*/
Route::namespace('App\Http\Controllers\Cms')->group(function () {

    Route::get('login', [
        'as' => 'cms.login.page',
        'uses' => 'AuthController@login'
    ]);
    Route::post('login', [
        'as' => 'cms.login.store',
        'uses' => 'AuthController@store'
    ]);
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [
            'as' => 'cms.index',
            'uses' => 'HomeController@index'
        ]);
        Route::get('/test', function () {
            return response()->json([
                'result'=> 'success',
                'code' => 1
            ]);
        });
    });
});

