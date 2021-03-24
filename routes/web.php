<?php

use Illuminate\Support\Facades\Route;

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
$router->options(
    '/{any:.*}',
    [
        'middleware' => ['cors'],
        function () {
            return response(['status' => 'success']);
        },
    ]
);
Route::group(['middleware' => ['cors']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'category-event'], function () {
        Route::get('/', 'UserEventController@index');
        Route::post('/', 'UserEventController@store');
        Route::get('/{event}', 'UserEventController@show');
        Route::get('/{event}/edit', 'UserEventController@edit');
        Route::patch('/{event}', 'UserEventController@update');
        Route::delete('/{event}', 'UserEventController@destroy');
    });

    Route::group(['prefix' => 'category-event'], function () {
        Route::get('/', 'UserEventController@index');
        Route::post('/', 'UserEventController@store');
        Route::get('/{user-event}', 'UserEventController@show');
        Route::get('/{user-event}/edit', 'UserEventController@edit');
        Route::patch('/{user-event}', 'UserEventController@update');
        Route::delete('/{user-event}', 'UserEventController@destroy');
    });
});