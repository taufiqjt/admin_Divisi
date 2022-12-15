<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;

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

// Route::get('/', function () {
    
// });

Route::get('/', ['middleware' => 'guest', function()
{
    return view('auth.login');
}]);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/search', [HomeController::class, 'search']);  
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/search', [PelangganController::class, 'search']);
Route::post('/pelanggan/insertpelanggan', [PelangganController::class, 'insert']);
Route::post('/pelanggan/editpelanggan', [PelangganController::class, 'edit']);
Route::get('/pelanggan/delete/{id}', [PelangganController::class, 'delete']);
