<?php

use App\Http\Controllers\Home\ChirpController;
use App\Services\RabbitMQ\RabbitMQProducer;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::group(['prefix' => 'chirps', 'middleware' => ['auth', 'verified'], 'as' => 'chirps.', 'namespace' => 'App\\Http\\Controllers'], function () {
//    Route::get('/', ['as' => 'list', 'uses' => 'ChirpController@index']);
//    Route::post('/', ['as' => 'store', 'uses' => 'ChirpController@store']);
//    Route::put('/{chirps}', ['as' => 'update', 'uses' => 'ChirpController@update']);
//    Route::delete('/{chirps}', ['as' => 'delete', 'uses' => 'ChirpController@destroy']);
//});
Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';

Route::get('producer', function () {
    $producer = new RabbitMQProducer();
    $message = sprintf('Hello, RabbitMQ! My name is %s, i want to try i can put how long string here: %s',
        fake()->name,
        fake()->sentences(100, true)
    );
    $producer->publish($message, 'default');

    return $message;
});
