<?php

use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\RequestController;
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



Route::post('/connect', [RequestController::class, 'store']);
Route::post('/get-requests', [RequestController::class, 'index']);
Route::post('/cancel-requet/{id}', [RequestController::class, 'destroy']);
Route::post('/accept-requet/{id}', [RequestController::class, 'acceptRequest']);

Route::get('/get-connections', [ConnectionController::class, 'getConnections']);
Route::post('/remove-connect/{id}', [ConnectionController::class, 'deleteConnection']);
