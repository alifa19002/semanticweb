<?php

use App\Http\Controllers\JobsDataController;
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


Route::get('/', [JobsDataController::class, 'index']);
Route::post('/search', [JobsDataController::class, 'search']);
Route::post('/searchGroup', [JobsDataController::class, 'getPlacePosition']);
