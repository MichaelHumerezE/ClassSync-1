<?php

use App\Http\Controllers\DiagramaController;
use App\Http\Controllers\DiagramaReactController;
use App\Http\Controllers\EquipoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Models\Equipo;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'show']);

Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::group(['middleware'=>['auth']], function(){
    route::resource('/users', UserController::class);
    route::resource('/perfil', PerfilController::class);
    route::resource('/password', PasswordController::class);
    route::resource('/roles', RolController::class);
    route::resource('/diagramas', DiagramaController::class);
    route::resource('/equipos', EquipoController::class);
});
