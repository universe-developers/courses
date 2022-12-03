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

Route::redirect('/', 'login');

Route::group(['middleware' => ['web', 'guest'], 'namespace' => 'App\Http\Controllers'], function(){
    Route::get('login', [\App\Http\Controllers\AuthController::class,'login'])->name('login');
    Route::get('connect', 'AuthController@connect')->name('connect');
});

Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'prefix' => 'app', 'namespace' => 'App\Http\Controllers'], function(){
    Route::get('/', 'HomeController@welcome')->name('app');
    Route::get('logout', 'AuthController@logout')->name('logout');
});
