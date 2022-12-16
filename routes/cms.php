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
    Route::get('/', [
        'as' => 'cms.index',
        'uses' => 'HomeController@index'
    ]);
});
