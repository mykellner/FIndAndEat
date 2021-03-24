<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/counties', CountyController::class);
Route::resource('/counties/{county}/cities', CityController::class);
Route::resource('/counties/{county}/cities/{city}/restaurants', RestaurantController::class);
Route::resource('/counties/{county}/cities/{city}/restuarants/categories', CategoryController::class);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
