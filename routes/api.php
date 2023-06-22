<?php

use App\Http\Controllers\Api\DiagramaController;
use App\Models\Diagrama;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(DiagramaController::class)->group(function(){
    Route::get('/diagramas', 'index');
    Route::post('/diagramas', 'store');
    Route::get('/diagramas/{id}', 'show');
    Route::put('/diagramas/{id}', 'update');
    Route::delete('/diagramas/{id}', 'destroy');
});
